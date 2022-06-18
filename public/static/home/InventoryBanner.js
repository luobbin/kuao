

var InventoryBanner = function(el, option){
    this.option = $.extend({},InventoryBanner.DEFAULTS,option);
    this.$el = $(el);
	this.banner =  function(){
		return [];
	}/*function(){
		return $.ajax({
			url:'FLUAHomeController.do?getFLUAHomeData',
			data:{type:6,sl:this.option.locale},
			async:true,
			type:'POST',
			dataType:'json'
		});
    };*/
	this.init();
};


InventoryBanner.prototype = {
	init:function(){
	    if(this.$el.length == 0){
	        return false;
        }
	    this.initContainer();
	},
    initContainer:function(){
        var html = [];
        html.push('<div class="ban">',
            '   <ul class="slider"></ul>',
            '   <div class="clearfix"></div>',
            '</div>',
            '<div class="xxx">',
            '   <a class="banner_left"><img src="./static/home//left.png"></a>',
            '   <a class="banner_right"><img src="./static/home//right.png"></a>',
            '</div>',
            '<div class="point"></div>',
            '<div class="clearfix"></div>');
        this.$el.html(html.join('\n'));

		var that = this;
		$.when(this.banner()).then(function(data){
			that.appendHtml(data);
		});
    },
	appendHtml:function(data){
		data = data || [];
		var html = [];
		var that = this;
		$.each(data,function(index,item){
			html.push('<li class="css3">',
				'	<img src="'.concat(that.option.fileServerHttp , item['hi10'] , '" width="100%" onerror="this.src=\'puri-plug/Images/Flua500x146.png\'">'),
				'	<div class="ban-con">',
				'		<h2 title="'.concat(item['hi02'] , '">' , item['hi02'] , '</h2>'),
				'		<p title="'.concat(item['hi03'] , '">' , item['hi03'] , '</p>'));
			if(isNotEmpty(item['hi08'])){
				html.push('		<a href="'.concat(item['hi08'] , '" title="' , that.option.locales['LearnMore'] , '">' , that.option.locales['LearnMore'] , '</a>'));
			}
			html.push('	</div>',
				'	<div class="clearfix"></div>',
				'</li>');
		});
		this.$el.find('ul.slider').append(html.join(''));
		this.bindSlider();
	},
	/**绑定轮播*/
	bindSlider:function(){
	    var that = this;
		var heiii,weighh ,winwei,ifat = true,sindex = 0,loaded = false;
		var lenThumb = this.$el.find('ul.slider li').length;
		for(var i=1;i<=lenThumb;i++){
			this.$el.find('.point').append('<span>'+i+'</span>');
		}

		var len = this.$el.find('.point span').length;
		var index = 1;

		this.$el.find('.point span').click(function(){
			index = that.$el.find('.point span').index(this);
			picShow(index);
		});
		this.$el.find('ul.slider').imagesLoaded( function() {
			loaded = true;
		});
		var playPic = setInterval(function(){
			if(!loaded){
				return false;
			}
			picShow(index);
			index++;
			if(index==len){index=0;}
		},this.option.sliderTime);


		function picShow(i){
			var $li = that.$el.find('ul.slider li');
			$li.eq(i).stop(true,true).fadeIn().siblings().fadeOut();

			$li.siblings().find('.ban-con h2').removeClass('anit');
			$li.siblings().find('.ban-con p').removeClass('anit');
			$li.siblings().find('.ban-con a').removeClass('anit');

			$li.eq(i).find('.ban-con h2').addClass('anit');
			$li.eq(i).find('.ban-con p').addClass('anit');
			$li.eq(i).find('.ban-con a').addClass('anit');

			that.$el.find('.point > span').eq(i).addClass('on').siblings().removeClass('on');
			sindex = i;
			bannerHeight();
		}

		this.$el.find('.banner_left').click(function(){
			picShow(index);
			index--;
			if(index==len){index=0;}
			clearInterval(playPic);
			playPic = setInterval(function(){
				if(!loaded){
					return false;
				}
				picShow(index);
				index++;
				if(index==len){index=0;}
			},that.option.sliderTime);
		});
		this.$el.find('.banner_right').click(function(){
			picShow(index);
			index++;
			if(index==len){index=0;}
			clearInterval(playPic);
			playPic = setInterval(function(){
				picShow(index);
				index++;
				if(index==len){index=0;}
			},that.option.sliderTime);
		});
		$(window).resize(function(){
			bannerHeight();
		});

		function bannerHeight(){
			var _li = $('.block-1 li').eq(sindex);
			heiii = parseInt(_li.find('img').height()),weighh = parseInt(_li.find('img').width());
			winwei = parseInt($(document.body).width());
			$('.block-1,.block-1 li').css({'height':heiii*winwei/weighh});
		}
		setTimeout(function(){
			picShow(0);
		},100);
	},
    constructor:InventoryBanner
};

InventoryBanner.DEFAULTS = {
    sliderTime:600000,
    locale:'EN',
    fileServerHttp:''
};