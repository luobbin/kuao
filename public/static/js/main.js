// pc头部
$(window).scroll(function() {
	if ($(window).scrollTop() > 0) {
		$('header').addClass('fix');
	} else {
		$('header').removeClass('fix');
	}
});

//头部搜索
$(document).ready(function() {
	$('header .ser1').on('click', function(e) {
		$('header').addClass("fix");
		$("#siteHeaderSearch").show();
		$(document).one('click', function() {
			$('#siteHeaderSearch').hide();
		})
		e.stopPropagation();
	});
	$('.search-box .search-input').on('click', function(e) {
		$('header').addClass("fix");
		$("#siteHeaderSearch").show();
		$(document).one('click', function() {
			$('#siteHeaderSearch').hide();
		})
		e.stopPropagation();
	});
	$('.search-box .close-btn').on('click', function(e) {
		$("#siteHeaderSearch").hide();

	});
});

//弹出导航
$(document).ready(function() {
	$(".menu-tc .nav .col-middle dl").hover(function() {
		$(this).children('dt').addClass('active');
		$(this).children("dd").stop(true, false).slideDown();
	}, function() {
		$(this).children('dt').removeClass('active');
		$(this).children("dd").stop(true, false).slideUp("");

	});
});

$(document).ready(function() {
	$('header .left').on('click', function(e) {
		$(this).addClass('active')
		$('.menu-tc').addClass('active');
	});
	$('.menu-tc .bg').on('click', function(e) {
		$('.menu-tc').removeClass('active');
	});
	$('.menu-tc .col-top').on('click', function(e) {
		$('.menu-tc').removeClass('active');
	});
	$('.menu-tc .nav .col-middle a').on('click', function(e) {
		$('.menu-tc').removeClass('active');
	});
});

//滚动条
$(document).ready(function() {
	$(".menu-tc .nav .col-middle").scrollBar();
});

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

//手机头部
$(function() {
	$(".header2 .nav-btn").on('click', function() {
		var _this = $(this);
		if (!$(this).hasClass('hover')) {
			$(this).addClass('hover');
			$(this).children('.line1').stop(true, true).transition({
				rotate: 45
			}, 300);
			$(this).children('.line2').stop(true, true).fadeOut(300);
			$(this).children('.line3').stop(true, true).transition({
				rotate: -45
			}, 300, function() {
				_this.addClass('active');
			});
			$(this).parent(".main-wrap").siblings('.sub-menu').stop().fadeIn();
			$("header .list-cont").addClass('active');
			$("body,html").stop(true, true).addClass('ovh-f');
			$(".search-bg1").stop(true, true).fadeIn();
			$(".header2").addClass('active');
			$(".sub-menu li").addClass("animate");
		} else {
			$(this).removeClass('hover');
			$(this).removeClass('active');
			$(this).children('.line1').stop(true, true).transition({
				rotate: 0
			}, 300);
			$(this).children('.line2').stop(true, true).fadeIn(300);
			$(this).children('.line3').stop(true, true).transition({
				rotate: 0
			}, 300);
			$(this).parent(".main-wrap").siblings('.sub-menu').stop().fadeOut();
			$("header .list-cont").removeClass('active');
			$("body,html").stop(true, true).removeClass('ovh-f');
			$(".search-bg1").stop(true, true).fadeOut();
			$(".header2").removeClass('active');
			$(".sub-menu li").removeClass("animate");
		}
	});

	$(".header2 .sub-menu .sec-list a").on('click', function() {
		$(".header2 .nav-btn").removeClass('hover');
		$(".header2 .nav-btn").removeClass('active');
		$(".header2 .nav-btn").children('.line1').stop(true, true).transition({
			rotate: 0
		}, 300);
		$(".header2 .nav-btn").children('.line2').stop(true, true).fadeIn(300);
		$(".header2 .nav-btn").children('.line3').stop(true, true).transition({
			rotate: 0
		}, 300);
		$(".header2 .nav-btn").parent(".main-wrap").siblings('.sub-menu').stop().fadeOut();
		$("header .list-cont").removeClass('active');
		$("body,html").stop(true, true).removeClass('ovh-f');
		$(".search-bg1").stop(true, true).fadeOut();
		$(".header2").removeClass('active');
		$(".sub-menu li").removeClass("animate");
	});
});

$(".header2 .sub-menu .sub-tit").on('click', function() {
	if ($(this).siblings('.sec-list').is(':hidden')) {
		$(this).addClass('on');
		$(this).siblings('.sec-list').stop().slideDown();
		$(this).parent().siblings('li').children('.sec-list').stop().slideUp().siblings('.tit').removeClass(
			'on');
	} else {
		$(this).removeClass('on');
		$(this).siblings('.sec-list').stop().slideUp();
	}
});

// 首页banner
$(window).scroll(function() {
	scrollx = $(document).scrollTop();
	wh = $(window).height() * .8;
	if (scrollx < wh) {
		percent = parseInt((1 - scrollx / wh) * 100) / 100;
	} else {
		percent = 0;
	}
	if ($(window).width() > 480) {
		$('.index-banner .bg').css({
			opacity: percent
		});
	} else {
		$('.index-banner .bg .cover').css({
			opacity: 1 - percent
		});
	}
});


$(document).ready(function() {
	$("header .lang").hover(function() {
		$(this).children(".xl").stop(true, false).slideDown();
	}, function() {
		$(this).children(".xl").stop(true, false).slideUp("fast");

	});
});

$(document).ready(function() {
	$("footer .foot1 .right dl").hover(function() {
		$(this).children("dd").stop(true, false).slideDown();
	}, function() {
		$(this).children("dd").stop(true, false).slideUp("fast");

	});
});

$(function() {
	var w = $(window).width();
	if (w > 1024) {
		if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
			new WOW({
				callback: function(box) {
					$(box).addClass("wow1");
				}
			}).init();

		}

		$(window).resize(function() {

			new WOW({
				callback: function(box) {
					$(box).addClass("wow1");
				}
			}).init();

		});
	}
});


$(document).ready(function() {
	$(".down .left li h3").click(function() {
		if ($(this).next('.xl').is(':hidden')) {
			$(this).next('.xl').slideDown();
		} else {
			$(this).next('.xl').slideUp();
		}
	});
});



$('footer .foot1 .right .fx span').on('click',function(e){
    $('footer .foot1 .right .fx span img').hide();
    $(this).children('img').show();
    $(document).one('click',function(){
        $('footer .foot1 .right .fx span img').hide();
    })
    e.stopPropagation();/*stopPropagation();方法可以阻止把事件分派到其他节点*/
})
