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
	},
	loading_img:loading_img,
	setTimeoutId:{},     //setTimeout的ID
	locale:'ZH',         //语言
	fileServerHttp:'',   //静态文件地址前缀
	locales:{},           //语言包
	enableConsole:true   //是否是使用打印
};


function initInventory(option) {
	document.documentElement.scrollTop = 0;
	defaults.conf = InventoryConf;
	if(option.typecode !== ""){
		proUtil.filter.pf110 = option.typecode;
		defaults.defFilter.pf110 = option
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
	NoDataReq:false,    //是否正在获取产品信息
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

		var list = new Array();
		var lastKey = Object.keys(filter)[Object.keys(filter).length-1];
		var lastVal = Object.values(filter)[Object.values(filter).length-1];
		$.each(data, function(index2, pro) {
			if(pro[lastKey] && pro[lastKey]===lastVal){
				list.push(pro);
			}
		});

		return list;
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
		//console.log("--NoDataReq值为：",proUtil.NoDataReq)
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
		// console.log("更新后的产品数据获取筛选为：",proUtil.filter)
		data = proUtil.getAfterFilterData(data,proUtil.filter);
		this.data = data;
		// console.log("更新后的产品数据为：",data)
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
		/*根据筛选重新获取产品列表*/
		this.updateData();
		this.index = 0;

		if($('#pro-list-num').length === 1){
			$('#pro-list-num').html('(' + this.data.length + ')');
		}
		/*将新获取的产品数据插入到列表*/
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
			'							<img alt="无图片" src="'.concat(pro['index_img'],'"  data-src="',pro['index_img'] ,'" onerror="this.src=\''+ default_img +'\'">'));
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
		if(fields.length === 0 && proUtil.filter.pf110){
			fields.push({key:'pf110',value:defaults.defFilter.pf110.typecode,name:defaults.defFilter.pf110.typename});
		}
		console.log("获取到的筛选数据为：",fields);
		/*开始生成面包屑*/
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
		/*生成面包屑结束*/
		if (fields.length > 1){
			//console.log("展示小类数据为：",fields);
			this.initProducts();
		}

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
			//var id = items.id;
			//console.log("产品点击结果：",$.isEmptyObject(items))
			if ($.isEmptyObject(items) === true){
				//从列表页筛选分类
				$('#'+InventoryProLvl.DEFAULTS.containerId).find('.selected').removeClass('selected');
				var cid = $(this).data('id');
				var $root = $('#'+InventoryProLvl.DEFAULTS.containerId+cid).parent();
				$root.addClass('selected');
				var filter = $root.data('filter');
				var filter2 = {};
				$.each(filter || [],function(index,item){
					filter2[item.key] = item.value;
				});
				proUtil.filter = filter2;
				proListModule.refresh(1);
			}else{
				//跳转产品详情
				window.open(items.url);
			}
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

