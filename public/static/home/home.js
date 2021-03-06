var defaults = {
	sliderTime:6000, //顶部广告Banner轮转间隔
	fileServerHttp:'',
	default_img:default_img,
	locale:'zh',
	timeStamp:new Date().getTime()
};
function initHome(){
	initHomeBanner();
	initHomeProduct();
	initHomeNews();
	initHomeVideo();
	//initHomeVideoSlider();
	initHomeEngineeringCase();

}


/**初始化顶部广告Banner*/
function initHomeBanner(){
	$.ajax({
		url:'./getBlock/1?' + defaults.timeStamp,
		async:true,
		success: function(data){
			data = $.parseJSON(data);
			var html;
			for(var i in data){
				var item = $.parseJSON(data[i]);
				console.log("解析出的banner数据",item)
				html = '<li class="css3">' +
				       '	<img src="' + defaults.fileServerHttp + item['img'] + '" width="100%" onerror="' + defaults.default_img + '">' +
				       '	<div class="ban-con">' +
				       '		<h2 title="' + item['title'] + '">' + item['title'] + '</h2>' +
				       '		<p title="' + item['info'] + '">' + item['info'] + '</p>' +
				       (isNotEmpty(item['url']) ? '<a href="' + item['url'] + '" title="LearnMore">了解更多</a>' : '') +
				       '	</div>' +
				       '	<div class="clearfix"></div>' +
				       '</li>';
				$('#slider').append(html);
			}
			$('#slider').append('<div class="clearfix"></div>');

			initHomeBannerSlider();
		}
	});
}
/**顶部广告Banner轮转*/
function initHomeBannerSlider(){
	var heiii,weighh ,winwei,ifat = true,sindex = 0,loaded = false;
	/*
	$('#slider li').eq(0).show();

	$('#slider li').eq(0).find('.ban-con h2').addClass('anit');
	$('#slider li').eq(0).find('.ban-con p').addClass('anit');
	$('#slider li').eq(0).find('.ban-con a').addClass('anit');
	*/
	var lenThumb = $('#slider li').length;
	for(var i=1;i<=lenThumb;i++){
		$('#num').append('<span>'+i+'</span>');
	}
	//$('#num span').eq(0).addClass('on');
	//bannerHeight();

	var len = $('#num span').length;
	var index = 1;

	$('#num span').click(function(){
		index = $('#num span').index(this);
		picShow(index);
	});
	$('#slider').imagesLoaded( function() {
		loaded = true;
	});
	var playPic = setInterval(function(){
		if(!loaded){
			return false;
		}
		picShow(index);
		index++;
		if(index==len){index=0;}
	},defaults.sliderTime);


	function picShow(i){
		$('#slider li').eq(i).stop(true,true).fadeIn().siblings().fadeOut();

		$('#slider li').siblings().find('.ban-con h2').removeClass('anit');
		$('#slider li').siblings().find('.ban-con p').removeClass('anit');
		$('#slider li').siblings().find('.ban-con a').removeClass('anit');

		$('#slider li').eq(i).find('.ban-con h2').addClass('anit');
		$('#slider li').eq(i).find('.ban-con p').addClass('anit');
		$('#slider li').eq(i).find('.ban-con a').addClass('anit');
		$('#num > span').eq(i).addClass('on').siblings().removeClass('on');
		sindex = i;
		bannerHeight();
	}

	$('#left_arrow').click(function(){
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
		},defaults.sliderTime);
	});
	$('#right_arrow').click(function(){
		picShow(index);
		index++;
		if(index==len){index=0;}
		clearInterval(playPic);
		playPic = setInterval(function(){
			picShow(index);
			index++;
			if(index==len){index=0;}
		},defaults.sliderTime);
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
}

/**初始化logo墙展示*/
function initHomeProduct(){
	$.ajax({
		url:'./getBlock/5?' + defaults.timeStamp,
		async:true,
		success: function(data){
			data = $.parseJSON(data);
			var html=[];
			for(var i in data){
				var item = $.parseJSON(data[i]);
				html.push('<li class="col-md-3 col-sm-3 col-xs-3">' +
					'<a href="' + (isNotEmpty(item['url']) ? item['url'] : '####') + '">' +
					'<img src="' + item['img'] + '" width="100%">' +
					'</a></li>');
			}
			$('#HomeProInfo').html(html.join(''));
			if($('#HomeProInfo li').length > 0){
				$('.block-2').removeClass('hide');
			}
		}
	});
	/*
	var jsonText = '[{"id":"8a8a80","hi02":"4028818958719ea80158750851fd0396","hi08":"","hi10":"static/home/lo (1).jpg"},' +
		'{"id":"100695","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (2).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (3).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (4).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (5).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (6).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (7).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (8).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (9).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (10).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (11).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (12).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (13).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (14).jpg"},' +
		'{"id":"100696","hi02":"40288189632e7b2d016347780db11de3","hi08":"","hi10":"static/home/lo (15).jpg"},' +
		'{"id":"267d38","hi02":"402881896a9c98a3016aafbf0fcb1a07","hi08":"","hi10":"static/home/lo (4).jpg"}]';
	data = $.parseJSON(jsonText);
	var html=[];
	for(var i in data){
		html.push('<li class="col-md-3 col-sm-3 col-xs-3"><a href="' + (isNotEmpty(data[i]['hi08']) ? data[i]['hi08'] : '####') + '"><img src="' + defaults.fileServerHttp + data[i]['hi10'] + '" width="100%"></a></li>');
		// html.push('<div  style="cursor:pointer;padding-top: 27px; ">');
		// html.push('<a href="'.concat('FLUAInventoryController.do?FLUASearch&sl=',defaults.locale,'&keyword=',data[i]['hi02'], '"> ' +
		// 	'<img src="',defaults.fileServerHttp,data[i]['hi10'],'" style="width:100%;height:100%;" onerror="this.src=\'puri-plug/Images/Flua500x146.png\'">'));
		// html.push('</a></div>');
	}
	$('#HomeProInfo').html(html.join(''));
	if($('#HomeProInfo li').length > 0){
		$('.block-2').removeClass('hide');
	}
	*/
}
/**初始化新闻信息*/
function initHomeNews(){
	$.ajax({
		url:'./getBlock/4?' + defaults.timeStamp,
		async:true,
		success: function(data){
			data = $.parseJSON(data);
			var html;
			for(var i in data){
				if(i%2 === 0){
					$('#HomeNewsList').append('<li class="col-md-12 col-sm-12 col-xs-12" style="height: 1px;">&nbsp</li>');
				}
				var item = data[i];
				html = '<li class="col-md-6 col-sm-12 col-xs-12">' +
					'	<a href="' + item['url'] + '">' +
					'		<div class="new-case">' +
					'			<div class="new-time col-md-2 col-sm-2 col-xs-12">' +
					'				<span>' + item['d'] + '</span>' +
					'				' + item['ym'] + '' +
					'			</div>' +
					'			<div class="new-con col-md-10 col-sm-10 col-xs-12">' +
					'				<div class="new-tu col-md-4  col-sm-4 col-xs-5">' +
					'					<div class="new-tx">' +
					'						<img src="' + item['img'] + '" onerror="this.src=\'' + defaults.default_img + '\'">' +
					'					</div>' +
					'				</div>' +
					'				<div class="new-nei col-md-8 col-sm-8 col-xs-7">' +
					'					<h3 title="' + item['title'] + '">' + item['title'] + '</h3>' +
					'					<P>' + item['info'] + '</P>' +
					'				</div>' +
					'			</div>' +
					'			<div class="clearfix"></div>' +
					'		</div>' +
					'		<span class="more">了解更多</span>' +
					'	</a>' +
					'</li>';
				$('#HomeNewsList').append(html);
			}
			$('#HomeNewsList').append('<div class="clearfix"></div>');

			if($('#HomeNewsList li').length > 0){
				$('.block-5').removeClass('hide');
				$('#HomeNewsList').imagesLoaded(function() {
					if($('#HomeNewsList').length>2){
						var height1 = $('#HomeNewsList>li:nth-child(1)').height();
						var height2 = $('#HomeNewsList>li:nth-child(2)').height();
						if(height1>height2){
							$('#HomeNewsList>li:nth-child(1)').height(height1);
							$('#HomeNewsList>li:nth-child(2)').height(height1);
						}
					}
				});
			}
		}
	});
}

/**初始化视频*/
function initHomeVideo(){
	$.ajax({
		url:'./getBlock/3?' +defaults.timeStamp,
		async:true,
		success: function(data){
			data = $.parseJSON(data);
			var html;
			for(var i in data){
				var item = $.parseJSON(data[i]);
				html = '<li>' +
					'	<div></div>' +
					'	<img src="'+ item['img'] + '" onerror="this.src=\''+ defaults.default_img +'\'">' +
					'	<video src="' + item['url'] + '" controls preload="none" height="100%" width="100%"></video>' +
					'</li>';
				$('#HomeVideoList').append(html);
			}
			initHomeVideoSlider();
		}
	});
}
function initHomeVideoSlider(){
	$('#HomeVideoList li div').click(function(e) {
		if($(this).parent().hasClass('active')){
	        $(this).parent().addClass('playing');
			$(this).parent().find('video').trigger('play');
		}
    });
	$('.block-4 .video-switch-btn').click(function(e) {
		videoShow($(this).hasClass('next-video'));
	});
	var sindex = 1;
	function videoShow(left){
		$('#HomeVideoList li').removeClass('active');
		$('#HomeVideoList li.playing').each(function(index, element) {
			$(this).removeClass('playing');
			var media = $(this).find('video').get(0);
			media.pause();
			media.currentTime = 0;
		});
		$('#HomeVideoList li').unbind('click');
		var len = $('#HomeVideoList li').length;
		var _last2 = $('#HomeVideoList li').eq(sindex - 2 >= 0 ? (sindex - 2) : (sindex - 2 + len));
		var _last1 = $('#HomeVideoList li').eq(sindex - 1 >= 0 ? (sindex - 1) : (sindex - 1 + len));
		var _center = $('#HomeVideoList li').eq(sindex);
		var _next1 = $('#HomeVideoList li').eq(sindex + 1 < len ? (sindex + 1) : (sindex + 1 - len));
		var _next2 = $('#HomeVideoList li').eq(sindex + 2 < len ? (sindex + 2) : (sindex + 2 - len));
		if(left){
			if(len > 3){
				$(_last1).css('z-index',1);
			}
			$(_center).css('z-index',2);
			$(_next1).css('z-index',5);
			if(len > 2){
				$(_next2).css('z-index',3);
			}

			if(len > 3){
				toHide(_last1);
			}
			toLeft(_center);
			toCenter(_next1);
			if(len > 2){
				toRight(_next2);
			}

		}else{
			if(len > 3){
				$(_next1).css('z-index',1);
			}
			$(_center).css('z-index',2);
			$(_last1).css('z-index',5);
			if(len > 2){
				$(_last2).css('z-index',3);
			}

			if(len > 3){
				toHide(_next1);
			}
			toRight(_center,left);
			toCenter(_last1);
			if(len > 2){
				toLeft(_last2);
			}
		}
		sindex = $('#HomeVideoList li.active').index();
	}
	function toLeft(obj){
		$(obj).animate({height:'390px',width:'587px',top:'20px',left:'0','margin-left':'0',opacity:1});
		$(obj).click(function(e) {
            videoShow(false);
        });
	}
	function toRight(obj){
		var width = $('#HomeVideoList').width();
		$(obj).animate({height:'390px',width:'587px',top:'20px',left:'100%','margin-left':'-587px',opacity:1});
		$(obj).click(function(e) {
            videoShow(true);
        });
	}
	function toCenter(obj){
		var width = $('#HomeVideoList').width();
		$(obj).animate({height:'425px',width:'640px',top:'0',left:'50%','margin-left':'-320px',opacity:1});
		$(obj).addClass('active');
	}
	function toHide(obj){
		$(obj).animate({height:'355px',width:'535px',top:'40px',left:'0','margin-left':'0',opacity:0});
	}
	videoShow(false);
}

/**初始化工程案例*/
function initHomeEngineeringCase(){
	$.ajax({
		url:'./getBlock/2?' +defaults.timeStamp,
		async:true,
		success: function(data){
			data = $.parseJSON(data);
			var html;
			for(var i in data){
				html = '<li class="col-md-6 col-sm-12 col-xs-12">' +
				       '	<a href="' + data[i]['url'] + '">' +
				       '		<div class="rectangle-3-2 rectangle">' +
				       '			<div>' +
				       '				<div>' +
				       '					<div>' +
				       '						<div></div>' +
				       '						<img src="' + data[i]['index_img'] + '" alt="' + data[i]['name'] + '">' +
				       '					</div>' +
				       '				</div>' +
				       '			</div>' +
				       '		</div>' +
				       '		<div class="EC-con">' +
				       '			<h3 class="text-ellipsis" title="' + data[i]['name'] + '">' + data[i]['name'] + '</h3>' +
				       '			<div class="text-ellipsis" title="工程地点：' + data[i]['location'] + '"> 工程地点：' + data[i]['location'] + '</div>' +
				       '			<div class="text-ellipsis" title="工程种类：' + data[i]['cate_name'] + '">工程种类：' + data[i]['cate_name'] + '</div>' +
				       //'			<div>' + data[i]['ei05'] + '</div>' +
				       '		</div>' +
				       '		<div class="ec-detail" title="查看详情">查看详情</div>' +
				       '	</a>' +
				       '</li>';
				$('#HomeEngineeringCaseList').append(html);
			}
			$('#HomeEngineeringCaseList').append('<div class="clearfix"></div>');
		}
	});
	if($('#HomeEngineeringCaseList li').length > 0){
		$('.block-6').removeClass('hide');
		$('#HomeEngineeringCaseList').imagesLoaded(function() {
			if($('#HomeEngineeringCaseList li').length > 2){
				var height1 = $('#HomeEngineeringCaseList>li:nth-child(1)').height();
				var height2 = $('#HomeEngineeringCaseList>li:nth-child(2)').height();
				if(height1>height2){
					$('#HomeEngineeringCaseList>li:nth-child(1)').height(height1);
					$('#HomeEngineeringCaseList>li:nth-child(2)').height(height1);
				}
			}
			if($('#HomeEngineeringCaseList li').length > 4){
				var height1 = $('#HomeEngineeringCaseList>li:nth-child(3)').height();
				var height2 = $('#HomeEngineeringCaseList>li:nth-child(4)').height();
				if(height1>height2){
					$('#HomeEngineeringCaseList>li:nth-child(3)').height(height1);
					$('#HomeEngineeringCaseList>li:nth-child(4)').height(height1);
				}
			}
		});
	}
}

function toSearchProduct(keyWord){
	console.log(keyWord)

}
