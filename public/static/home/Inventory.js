var defaults = {
	conf:{},
	userInfo:{
		userName:'test',
		userType:-1
	},
	currency:'',         //显示币种
	brand:'',            //品牌
	defFilter:{          //默认筛选
		pf110:null,          //数据筛选条件
		sellOrHome:''        //仅商用家用    1.家用  2.商用 3.混合
	},
	loading_img:loading_img,
	setTimeoutId:{},     //setTimeout的ID
	locale:'ZH',         //语言
	fileServerHttp:'',   //静态文件地址前缀
	locales:{},           //语言包
	enableConsole:true   //是否是使用打印
};


function initInventory() {
	document.documentElement.scrollTop = 0;
	defaults.conf = InventoryConf;

	if(defaults.defFilter.pf110){
		proUtil.filter.pf110 = defaults.defFilter.pf110;
	}

	//读取产品信息
	proUtil.init();

	//Banner初始化
	new InventoryBanner('#slider',{
		locale:defaults.locale,
		fileServerHttp:defaults.fileServerHttp,
	});

	//初始化左侧分类栏
	leftModule.init();

	//进入页面展示所有系列
	proListModule.init();
}

var proUtil = {
	NoDataReq:true,    //是否正在获取产品信息
	proData:[],        //产品信息
	filter:{},
	init:function(){
		this.getProductData();
	},

	/**获取所有产品信息*/
	getProductData:function(){
		var that = this;
		//that.proData = $.parseJSON(InventoryConf.jsonTextProduct);
		// console.log('所有产品',that.proData);
		// that.NoDataReq = false;

		that.NoDataReq = true;

		$.when(ajaxUtil.proData()).then(function(data){
			that.proData = data || [];
			//方便查看问题
			if(defaults.userInfo.userName == 'test'){
				console.log('所有产品',that.proData);
			}
			that.NoDataReq = false;
		});
	},
	/**筛选产品*/
	getAfterFilterData:function(data,filter){
		if(!Array.isArray(data)){
			return [];
		}
		if(filter == null || JSON.stringify(filter) == "{}") {
			return data;
		}

		var that = this;
		var list = new Array();
		$.each(data, function(index2, pro) {
			if(that.matchRuleProduct(pro,{},filter)){
				list.push(pro);
				return false;
			}
		});

		return list;
	},

	/**
	 * 筛选
	 * @param pro        合并信息
	 * @param product    单条BOM信息
	 * @param filter     筛选条件
	 * @returns {boolean}
	 */
	matchRuleProduct:function(pro,product,filter){
		var match = true;
		if(isObject(filter)){
			var that = this;
			$.each(filter, function(key, value) {
				if (!that.matchRule(pro,product,key,value)) {
					match = false;
					return false;
				}
			});
		}
		return match;
	},

	/**
	 * 筛选
	 * @param pro        合并信息
	 * @param product    单条BOM信息
	 * @param field      筛选字段
	 * @param filterValue     筛选值
	 * @returns {boolean}
	 */
	matchRule:function(pro,product,field,filterValue){

		if(field == 'pf58' && pro.type != 0){
			return true;
		}
		var rules = defaults.conf.matchRules;
		if(!(rules.cp.pf110.indexOf(product['pf110']) > -1 && (pro.type == 0 || pro.type == 2)) && rules.cp.unFilterFields.indexOf(field) > -1){
			// return true;
		}
		//获取产品值
		var value;
		if((pro.type == 0 && rules.mainFields.indexOf(field) > -1) || (pro.type != 0 && rules.mainFields2.indexOf(field) > -1)){
			value = pro[field];
		}else{
			value = product[field];
		}
		if(field == 'search'){
			value = (pro[field] || '') + '|' + (product[field] || '');
		}

		//产品值为空时，跳过筛选返回通过
		if(rules.emptySkip.indexOf(field) > -1 && isEmpty(value)){
			return true;
		}

		if(isObject(filterValue) && filterValue.type === 'moreFilter'){
			return moreFilterModle.matchRule(value,filterValue,pro,product);
		}

		//模糊匹配
		if(rules.fuzzyFields.indexOf(field) > -1){
			if(Array.isArray(filterValue)){
				for(var i in filterValue){
					if(value && value.toUpperCase().indexOf((filterValue[i] || '').toString().toUpperCase()) > -1){
						return true;
					}
				}
				return false;
			}else{
				return value && value.toUpperCase().indexOf((filterValue || '').toString().toUpperCase()) > -1;
			}
		}

		if(Array.isArray(filterValue)){
			return value && filterValue.indexOf(value) > -1;
		}else{
			return value && value == filterValue;
		}
	},

	/**排序*/
	OrderProductfileDataCompare : function (prop, order) {
		var sorts;
		if(Array.isArray(prop)){
			sorts = prop;
		}else{
			sorts = [{prop:prop,order:order}]
		}
		var that = this;
		return function (obj1, obj2) {
			for(var i in sorts){
				prop = sorts[i].prop;
				if(isNotEmpty(prop)){
					var orderNum = order == 'desc' ? -1 : 1;
					var val1 = obj1,val2 = obj2;
					var props = prop.split('.');
					for(var j in props){
						val1 = val1[props[j]];
						val2 = val2[props[j]];
					}
					if (val1 < val2) {
						return -1*orderNum;
					} else if (val1 > val2) {
						return orderNum;
					}
				}
			}
			return 0;
		}
	},
	/**替换文本*/
	getShowText:function(field,value){
		try{
			var ReplaceData = this.replaceData || {};
			var values = ReplaceData[field] || {};
			if(value in values && 'typename' in values[value]){
				return values[value].typename || value;
			}
		}catch (e) {
		}

		return value;
	},
};



/**左侧栏模块*/
var leftModule = {
	proLvl:{},         //产品分类对象
	data:{},           //热销新品推荐对应数据
	init:function(){
		//初始化分类
		this.initProLvl();
		//绑定其他事件
		this.bindOtherEvent();
	},
	/**初始化分类*/
	initProLvl(){
		this.proLvl = new InventoryProLvl({
			locale:defaults.locale,
			locales:defaults.locales,
			fileServerHttp:defaults.fileServerHttp,
			onClickLvl:function(filter){
				var filter2 = {};
				$.each(filter || [],function(index,item){
					filter2[item.key] = item.value;
				});
				proUtil.filter = filter2;
				proListModule.refresh(1);
			}
		});
		this.filterProLvl();
	},
	/**展示分类数据*/
	filterProLvl:function(){
		var that = this;
		console.log("--NoDataReq值为：",proUtil.NoDataReq)
		if(proUtil.NoDataReq){
			clearTimeout(defaults.setTimeoutId.filterProLvl);
			defaults.setTimeoutId.filterProLvl = setTimeout(function() {
				that.filterProLvl();
			}, 500);
			return false;
		}
		console.log('--proUtil.proData值：',proUtil.proData);
		this.proLvl.filterProductLvl(proUtil.proData);
		$('#pro-lvl-group').removeClass('hide');
	},

	/**绑定其他事件*/
	bindOtherEvent:function(){
		//小屏悬浮按钮
		$('.pro-left .pro-left-fixed-btn').click(function(e) {
			$(this).parent().toggleClass('expansion');
			$('body,html').animate({scrollTop: 0},500);
		});
		//绑定目录申请弹窗事件
		$('.pro-left .pro-left-catalog li,.pro-left .pro-left-catalog .pro-left-catalog-btn').click(function(e) {
			$('#InventoryCatalogModal').modal({show: true});
		});
	}
};

/**产品列表展示模块*/
var proListModule = {
	index:0,       //虚拟页数
	row:30,        //每页个数
	mapMode:true,  //是否是图片模式，否则为列表模式
	data:{},       //当前显示的数据
	delay:true,     //显示更多按钮触发延时
	dataType:'',   //热销新品推荐类型
	init:function(){
		this.bindProListEvent();  //绑定产品列表模块事件
		this.refresh(0);      //初始化右侧产品列表
	},

	/**
	 * 刷新展示内容
	 * @param type       来源
	 *                      0.初次进入页面
	 *                      1.左侧分类点击事件
	 *                      5.点击中间系列
	 *                      6.变更排序
	 * @param option     参数配置
	 */
	refresh:function(type,option){
		if(type == 1){
			this.renderFilters();
		}else if(type == 5){
			proUtil.filter.pf01 = option;
			this.renderFilters();
		}else if(type == 6){
			this.initProducts();
		}else{
			this.renderFilters();
		}
	},

	/**更新展示产品数据*/
	updateData(){
		var data = [];
		if(isNotEmpty(this.dataType)){
			data = leftModule.getSellWellData(this.dataType);
		}else{
			data = proUtil.proData;
		}
		data = proUtil.getAfterFilterData(data,proUtil.filter);
		var sort = $('.pro-right .pro-right-btn .sort.selected').data('sort');
		sort = isEmpty(sort) ? 'pf01' : sort;
		data.sort(proUtil.OrderProductfileDataCompare(sort,$('.pro-right .pro-right-btn .sort.selected').hasClass('desc') ? 'desc' : 'asc'));
		this.data = data;
	},

	/**初始化右侧产品列表*/
	initProducts:function(){
		var that = this;
		if(proUtil.NoDataReq){
			clearTimeout(defaults.setTimeoutId.proListInit);
			defaults.setTimeoutId.proListInit = setTimeout(function() {
				that.initProducts();
			}, 500);
			return false;
		}
		//隐藏更多按钮、删除原本展示的产品、显示加载中
		this.ShowMoreProductsBtn(false);
		$('.pro-right .pro-right-list>li').remove();
		$('.pro-right .pro-right-list').append('<li class="loading"><img src="'+ defaults.loading_img +'" style="width:20px;height:20px;"/>' + defaults.locales['loading'] + '</li>');

		this.updateData();
		this.index = 0;

		if($('#pro-list-num').length == 1){
			$('#pro-list-num').html('(' + this.data.length + ')');
		}
		this.insertProducts();
	},

	/**插入产品*/
	insertProducts:function(){
		//首页返回顶部
		if(this.index <= 0){
			this.scrollToTop();
		}

		//判断并删除加载中样式
		if($('.pro-right .pro-right-list li.loading').length > 0) {
			$('.pro-right .pro-right-list li.loading').remove();
		}
		//如果是首页删除所有产品
		if(this.index == 0 && $('.pro-right .pro-right-list>li').length > 0){
			$('.pro-right .pro-right-list>li').remove();
		}

		//显示全部,不虚拟分页
		var row = this.row;
		if(row == 0){
			row = this.data.length;
			if(this.index > 0){
				this.index = 0;
				$('.pro-right .pro-right-list>li').remove();
			}
		}
		//判断是否还有产品要展示
		if(this.index * row > this.data.length) {
			return;
		}
		//隐藏更多产品按钮
		this.ShowMoreProductsBtn(false);

		//开始/结束下标
		var start = this.index * this.row;
		var end = (this.index + 1) * this.row;
		end = end > this.data.length  ? this.data.length : end;

		//获取用于插入元素,所有产品都将插入到该元素前面。该元素并且用于消除悬浮
		var $insert = $('.pro-right .pro-right-list>.clearfix');
		if($insert.length == 0){
			$('.pro-right .pro-right-list').append('<div class="clearfix"></div>');
			$insert = $('.pro-right .pro-right-list>.clearfix');
		}
		for (var i = start; i < end; i++) {
			var html = this.getProItemHtml(this.data[i]);
			$(html).insertBefore($insert).data('attr',this.data[i]);
		}

		//判断是否加载所有产品,如果没有则显示加载更多按钮
		if (end < this.data.length) {
			this.ShowMoreProductsBtn(true);
		}
	},
	/**获取产品展示html*/
	getProItemHtml:function(pro){
		pro = pro || {};
		var html = [];
		html.push('<li class="pro-items col-md-2 col-sm-4 col-xs-6">',
			'	<div class="pro-items-nei">',
			'		<div class="map">');
		html.push(this.getProItemImgHtml(pro));
		html.push('		</div>',
			'	</div>',
			'</li>');
		return html.join('\n');
	},
	/**获取产品图片html*/
	getProItemImgHtml:function(pro){
		var html = [];
		html.push('			<div class="img rectangle rectangle-1-1">',
			'				<div>',
			'					<div>',
			'						<div>',
			'							<div></div>',
			'							<img alt="无图片" src="'.concat(pro['url'],'"  data-src="',pro['url'] ,'" onerror="this.src=\''+ default_img +'\'">'));
		if(this.mapMode){
			html.push('							<span class="pro-icons">');
			html.push('								<div class="clearfix"></div>',
				'							</span >');
		}
		html.push('						</div>',
			'					</div>',
			'				</div>',
			'			</div/>');
		html.push('			<div class="info" style="position:relative;">');
		var title = pro['title'];
		html.push('			<div class="text text-ellipsis" title="'.concat(title,'">',title,"</div>"));
		html.push('			</div>');
		return html.join('\n');
	},

	/**显示隐藏显示更多按钮*/
	ShowMoreProductsBtn:function(show){
		if(show){
			$('.pro-right .show-more-pro-btn').removeClass('hide');
		}else{
			$('.pro-right .show-more-pro-btn').addClass('hide');
		}
	},
	/**渲染筛选*/
	renderFilters:function(){
		var that = this;
		if(proUtil.NoDataReq){
			clearTimeout(defaults.setTimeoutId.renderFilters);
			defaults.setTimeoutId.renderFilters = setTimeout(function() {
				that.renderFilters();
			}, 500);
			return false;
		}
		var filters = $.extend(true,{},proUtil.filter);
		var fields = leftModule.proLvl.getSelectedFields();
		console.log("获取到的筛选数据为：",fields);
		if(fields.length === 0 && proUtil.filter.pf110){
			fields.push({key:'pf110',value:proUtil.filter.pf110});
		}
		var html = [];
		html.push('					<ul class="breadcrumb">');
		$.each(fields || [],function(index,item){
			if(item.key in filters){
				html.push('						<li>'.concat(proUtil.getShowText(item.key,item.name),'</li>'));
			}
		});
		if('search' in filters){
			html.push('						<li>'.concat(filters.search.toUpperCase(),'</li>'));
		}

		html.push('					</ul>');
		$('#pro-list-filter').html(html.join('\n'));
		this.initProducts();
	},

	/**返回顶部*/
	scrollToTop:function(){
		var h = $('.pro-right').offset().top - document.documentElement.scrollTop;
		if(h < defaults.conf.offsetTop){
			document.documentElement.scrollTop = $('.pro-right').offset().top - defaults.conf.offsetTop;
		}
	},
	/**绑定产品列表模块事件*/
	bindProListEvent:function (){
		var that = this;
		//产品点击事件
		$('.pro-right .pro-right-list').off('click','>li').on('click','>li',function(){
			var items = $(this).data('attr') || {};
			var id = items.id;
			window.open(items.url);
		});

		//显示更多产品
		$('.pro-right .pro-right-list-container').off('click','.show-more-pro-btn').on('click','.show-more-pro-btn',function(e){
			that.index++;
			that.insertProducts();
		});

		//滚动触发自动展示更多产品事件
		$(window).scroll(function() {
			if(!$('.pro-right .show-more-pro-btn').hasClass('hide')){
				var top = document.getElementsByClassName('show-more-pro-btn')[0].getBoundingClientRect().top + $('.pro-right .show-more-pro-btn').height(); //元素顶端到可见区域顶端的距离
				var se = document.documentElement.clientHeight; //浏览器可见区域高度。
				if(top <= se ) {
					if(that.delay){
						$('.pro-right .pro-right-list-container .show-more-pro-btn').trigger('click');
						that.delay = false;
						setTimeout("proListModule.delay = true;",500);
					}
				}
			}
		});

	},
};

var ajaxUtil = {
	proData:function(){
		return $.ajax({
			url : 'listFontItems',
			data:{
				sl:defaults.locale,
				type:'all'
			},
			type:'GET',
			dataType:'json'
		});
	},
	moreFilters:function(){
		return [];
	}
}

