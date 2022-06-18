var headerDefaults = {
		lang:'zh',
		CountryCode:'',
		CurrentPageUrl:''
};

function initHeaderPage(){

	try{
		var userAgent = navigator.userAgent;
		if (userAgent.indexOf("Opera") < 0 && userAgent.indexOf("Firefox") < 0 && userAgent.indexOf("Chrome") < 0 && userAgent.indexOf("Safari") > -1) {
			var rootFontFamily = (document.documentElement.currentStyle ? document.documentElement.currentStyle : window.getComputedStyle(document.documentElement)).fontFamily;
			$('body').css('font-family',rootFontFamily);
		}
	}catch(e){
	}
	
	initHeaderPageEvent();
	initFooterPageEvent();
}
/**绑定底部事件*/
function initFooterPageEvent(){
	//置顶按钮
	$(document).scroll(function() {
		var res = $(document).scrollTop();
		if (res > 400) {
			$('.right_zd').addClass('active');
		} else {
			$('.right_zd').removeClass('active');
		}
	});
	$(function() {
		$('.right_zd li:last-child').click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	});

	$(document).ready(function() {
		$(".right_zd ul li").hover(function() {
			$(".right_zd ul li").removeClass('active');
			$(this).addClass('active');
		}, function() {
			$(".right_zd ul li").removeClass('active');
		});
	});

}
/**绑定头部事件*/
function initHeaderPageEvent(){
	//导航栏动画
	$('#head .menu li').hover(function(){
		$(this).find('.menu_zi').animate({'margin-left':'0'},500);
	},function(e){
		$(this).find('.menu_zi').animate({'margin-left':'50%'},500);
	});
	
	$(window).resize(function(e) {
		if($(window).width()>1300){
			if($('.mobile-menu').css('display')==='block'){
				$('.mobile-menu').hide();
				$('.mobile-tool-menu').slideUp();
				$('.mobile-login-menu').slideUp();
			}
		}else{
			$('#head .look').slideUp();
			$('#head .yuyan').slideUp();
		}
	});

	$('input[name="keyword"]').bind('keypress',function(event){
		if(event.keyCode === "13"){
			$(this).parent().find('input[name="submitsearch"]').click();
		}
	});//
    $('.moblie-bt').click(function(e){
		var display = $('.mobile-menu').css('display');
		if(display === 'none'){
			$('body,html').animate({scrollTop:0},500);
			$('.mobile-menu').css('height',$(document).height()).slideDown();
		}
		else{
			$('.mobile-menu').slideUp();
		}
    });
	
	$('.function .seach').click(function(e){
		var display = $('.look').css('display');
		if(display === 'none'){
			$('#head .look').show(500);
			$('.yuyan').slideUp();
		}
		else{
			$('#head .look').slideUp();
		}
    });
	$(window).scroll(function(e) {
		var h = $(window).scrollTop();
		var w = $(window).width();
		if(h>50&&w>1300){
			$('#head').addClass('w-head');
		}
		else{
			$('#head').removeClass('w-head');
		}
	});

	$('.menu li').hover(function(e) {
		$(this).find('dl').slideDown();
	},function(){
		$(this).find('dl').slideUp();
	});
}


/**切换语言*/
function divTwoOnclick() {
	$.cookie('CountryCode', headerDefaults.CountryCode, { expires: 7,path: '/' });
	$.cookie('sellLanguage', headerDefaults.lang, { expires: 7,path: '/' });
	window.location.href = "FLUAHomeController.do?FLUAHome&sl="+headerDefaults.CountryCode;
}

/**跳转查询*/
function ToSearch(obj){
	var keyword = $(obj).parent().find('input[name="keyword"]').val();
	// keyword = escape(keyword);
	var brand = $('body').data('brand');
	keyword= encodeURIComponent(keyword);
	window.location.href = './product_search?keyword='+keyword + '&brand='+brand;
}




/**初始化语言*/
function initHeaderPageLangs(){
	var list = $.parseJSON('[{"typenameEn":"","typename":"中国","iconpath":"/jeecg/type/20210908160326659.png","typeCode":"ZH"},{"typenameEn":"","typename":"英国","iconpath":"/jeecg/type/20210908160345091.png","typeCode":"EN"}]');
	list = Array.isArray(list) ? list : [];
	var html = [];
	var c = 'language_'+lang.toUpperCase();
	html.push('<div class="current-language">'.concat(getHtmlByLangkey(null,'header.languageCurrent'),'(',getHtmlByLangkey(null,'header.' + c),')</div>'));

	$.each(list,function(index,item){
		var a="languageCountry_"+item.typeCode;
		if(item.typeCode!='CA') {
			html.push('<div class="changeCountry" onclick="changeLangOnHeader(\''.concat(item.typeCode,'\')" >'),
				'	<a href="####">',
				'		<img src="'.concat(fileServerHttp, item.iconpath, '">'),
				'	</a>',
				'	'.concat(getHtmlByLangkey(null,'header.' + a)),
				'</div>');
		}else{
			html.push('<div>',
				'	<a href="####">',
				'		<img src="'.concat(fileServerHttp, item.iconpath, '">'),
				'	</a>',
				'	'.concat(getHtmlByLangkey(null,'header.' + a)),
				'	<div class="radioDiv">',
				'		<label onclick="changeLangOnHeader(\'EN\')"><input type="radio" name="radioName" >'.concat(getHtmlByLangkey(null,'header.language_EN'),'</label>') ,
				'		<div class="radio-line"></div>',
				'		<label onclick="changeLangOnHeader(\'FR\')"><input type="radio" name="radioName" >'.concat(getHtmlByLangkey(null,'header.language_FR'),'</label>') ,
				'	</div>',
				'</div>');
		}
	});
	$("#languageDIV").html(html.join(''));
}

/**
 * 切换语言跳转地址
 * @param typeCode
 */
function changeLangOnHeader(typeCode){
	var newUrl;
	if(headerDefaults.CurrentPageUrl && headerDefaults.CurrentPageUrl == ''){
		newUrl = headerDefaults.CurrentPageUrl;
	}else{
		newUrl = window.location.href;
		var re=eval('/(sl=)([^&]*)/gi');
		newUrl = newUrl.replace(re,'sl='+typeCode);
		while(newUrl.endsWith('#')){
			newUrl = newUrl.substring(0,newUrl.length-1)
		}
	}
	if(newUrl.indexOf('sl='+typeCode) === -1){
		if(newUrl.indexOf('?') > -1){
			newUrl = newUrl + '&sl=' + typeCode;
		}else{
			newUrl = newUrl + '?sl=' + typeCode;
		}
	}
	window.location.href = newUrl;
}

