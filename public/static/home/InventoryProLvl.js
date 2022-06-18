/**
 * 左侧产品分类展示
 * @param option
 * @constructor
 */
var InventoryProLvl = function(option){
    this.option = $.extend({},InventoryProLvl.DEFAULTS,option);
    this.rendered = false;
    this.canClick = false;
	this.productLvl =  function(){
		//return $.parseJSON(InventoryConf.jsonTextProLvl);
		return $.ajax({
			url:'listFontCate',
			data:{type:'all'},
			async:true,
			type:'GET',
			dataType:'json'
		});
	};
	this.init();
};


InventoryProLvl.prototype = {
    init:function(){
    	$('#'+this.option.containerId).addClass('panel-group pro-lvl-group pro-lvl-group-1');
    	this.initProductLvl();       //初始化筛选
		this.bindEvent();        //捆绑顶部分类事件
    },
	//初始化左侧灯具分类数据
	initProductLvl:function(){
		var that = this;
		this.rendered = false;
		$.when(this.productLvl()).then(function(data){
			console.log("获取到的分类数据为：",data);
			that.appendProductLvl(data);
		});
	},
	/**渲染分类html*/
	appendProductLvl:function(data){
		$('#pro-lvl-group').html('');
		this.getProductLvlHtml(data,0,this.option.containerId,[]);
        this.rendered = true;
	},
	/**获取分类html*/
	getProductLvlHtml(list,lvl,parentId,filters){
		var that = this;
		$.each(list,function(index,item){
			var list2 = item.list;
			var child = list2 != null && Array.isArray(list2) && list2.length > 0;
			if(!child && lvl == 0){
				return true;
			}
			var type = 2;
			var panelClass = 'lvl-leaf lvl-sub';
			if(lvl == 0){
				type = 0;
				panelClass = 'lvl-root';
			}else if(child){
				type = 1;
				panelClass = 'lvl-general lvl-sub';
			}
			var id = parentId + '_' + lvl + '_' + item.id;
			var id2 = id;
			var i = 0;
			while($('#'+id).length > 0){
				i++;
				id = id2 + '_' + i;
			}
			var indentHtml = [];
			for(var j = 0;j<lvl;j++){
				indentHtml.push('<span class="lvl-indent"></span>');
			}
			var imgHtml = [];
			if(lvl > 0){
				var iconPath = item.iconpath
				imgHtml.push('<span class="lvl-icon">');
				if(isNotEmpty(iconPath)){
					iconPath = that.option.fileServerHttp + iconPath
					if(iconPath.endsWith('.svg')){
						imgHtml.push(SvgUtil.getHtml(iconPath));
					}else{
						imgHtml.push('<img src="'.concat(iconPath,'">'));
					}
				}
				imgHtml.push('</span>');
			}

			var filters2 = [];
			filters2.push.apply(filters2,filters);
			filters2.push({key:item.field,value:item.typecode,name:item.typename});
			var html=[];
			html.push('<div class="panel lvl-node '.concat(panelClass,'" data-field="',item.field,'" data-value="',item.typecode,'">'),
				'	<div class="panel-heading">',
				'		<span class="lvl-title">'.concat(indentHtml.join(''),imgHtml.join(''),'<span>',item.typename,'</span></span>'));
			if(type != 2){
				html.push('		<span class="lvl-arrow collapsed lvl-arrow'.concat(type==0 ? '1' : '2', '" data-toggle="collapse" data-parent="#',parentId,'" href="#',id,'"></span>'));
			}
			html.push('	</div>',
				'	<div id="'.concat(id,'" class="collapse panel-collapse">'));
			html.push('	</div>',
				'</div>');
			$(html.join('\n')).appendTo($('#'+parentId)).data('filter',filters2);

			if(type != 2) {
				that.getProductLvlHtml(list2, lvl + 1, id,filters2);
			}
		});
	},
	/**捆绑顶部分类事件*/
    bindEvent:function(){
		var that = this;
		//展开/收起时添加删除样式
		$('#' + this.option.containerId).on('show.bs.collapse', '.collapse', function () {
			$(this).parent().addClass('expansion');
		});
		$('#' + this.option.containerId).on('hide.bs.collapse', '.collapse', function () {
			$(this).parent().removeClass('expansion');
		});
		//点击母菜单
		$('#' + this.option.containerId).off('click','.lvl-node .panel-heading').on('click','.lvl-node .panel-heading',function(e){
			if(!$(this).parent().hasClass('lvl-leaf')){
				$(this).parent().find('>.panel-collapse').collapse('toggle')
			}
		});

		//分类点击事件
		$('#' + this.option.containerId).off('click','.lvl-leaf .lvl-title').on('click','.lvl-leaf .lvl-title',function(e){
			console.log('canClick',that.canClick);
			if(that.canClick){
				$('#'+that.option.containerId).find('.selected').removeClass('selected');
				var $root = $(this).parent().parent();
				$root.addClass('selected');
				console.log("过滤的分类数据为：",$root.data('filter'))
				that.option.onClickLvl($root.data('filter') || []);
			}
			e.stopPropagation();
		});

    },
	/**获取筛选字段*/
	getSelectedFields:function(){
		var $selected = $('#' + this.option.containerId).find('.lvl-node.selected');
		if($selected.length == 1){
			return $selected.data('filter') || [];
		}
		return [];
	},
	/**获取筛选字段*/
	getSelectedKey:function(){
		var $selected = $('#' + this.option.containerId).find('.lvl-node.selected');
		if($selected.length == 1){
			var fields = $selected.data('filter') || [];
			var fields2 = [];
			$.each(fields,function(index,item){
				fields2.push(item.value);
			});
			return fields2.join('-');
		}
		return '';
	},

	/**筛选隐藏没产品的分类*/
	filterProductLvl:function(data){
		$('#' + this.option.containerId).find('.lvl-node').each(function(){
			var _this = $(this);
		});
		this.canClick = true;
	},
	cleanSelected:function(){
		// $('#'+this.option.containerId).find('.expansion').removeClass('expansion');
		$('#'+this.option.containerId).find('>div>.panel-collapse').each(function(){
			$(this).collapse('hide');
		});

		$('#'+this.option.containerId).find('.selected').removeClass('selected');
	},

    constructor:InventoryProLvl
};

InventoryProLvl.DEFAULTS = {
	locale:'EN',         //语言
	locales:{},           //语言包
	containerId:'pro-lvl-group',
	hideBottom:false,    //是否显示底部"热销新品推荐"和"目录申请"
	onClickLvl:function onClickLvl(filter){
		return true;
	},
    fileServerHttp:'',
};
