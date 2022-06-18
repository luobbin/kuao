@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')
    <!-- 内页banner -->
    <div class="ny-banner aa">
        <div class="img">
            <img src="/static/202108/ef40ebff2697f85f7408442a5c7df363.jpg" class="pc">
            <img src="/static/202108/0bf43c06d18344a1a551f1edae61e979.jpg" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">案例中心</h3>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                以责任，耀文明，WAC华格以博物馆级别的照明，点亮非凡空间！</p>
        </div>
    </div>
    <!-- 内页banner End -->
    <!-- 案例详细 -->
    <div class="case-show p110 w83">
        <div class="col-top clearfix">
            <div class="left">
                上海天文馆
            </div>
            <div class="right">
                <p>“我们不是在写一本教科书，我们是在创造一段体验”，上海天文馆全馆运用环境氛围、灯光音效和高仿真场景模拟手段，还采用了体感互动、数据可视化、AR、VR等方式构建沉浸式宇宙空间体验环境，

                    以寓教于乐的方式将晦涩枯燥的科学、天文理论知识生动传递给观众。该馆打造了“家园”“宇宙”“征程”三大主题展区，以及“中华问天”“好奇星球”“航向火星”等特色展区，300余件展品中，原创比例高达85%，互动展品占比50%以上。</p>
                <p><br/></p>
            </div>
        </div>
        <div class="col-middle">
            <div class="swiper-container pic">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="/static/202108/8866cf1ae61db3c6d20a7e3d9e408fd8.jpg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="/static/202108/83fe45345227940e6f7b6d8220f53df6.jpg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="/static/202108/c5abdeb04991aa8049ffe9d219c470be.jpg">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="/static/202108/9ea56a32d559f75fb7f8e7beef945583.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-container word">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <h3>上海天文馆</h3>
                        <p>星际穿越，挥舞双臂，自有属于你的星河</p>
                    </div>
                    <div class="swiper-slide">
                        <h3>上海天文馆</h3>
                        <p>
                            灯光利用黑空创造的间离效果容纳了人们的想象力，虚化了空间的边界，以期在方寸之间营造空幻浩渺的宇宙氛围。低照度的环境有利于打造沉浸式体验，同时以色温、亮度作为引导，呼应参观动线，呈现丰富立体的空间层次。</p>
                    </div>
                    <div class="swiper-slide">
                        <h3>上海 天文馆</h3>
                        <p>
                            从家园启程踏入璀璨星空，围绕“日月地”展开银河系，逐渐打开浩瀚宇宙，了解人类对宇宙探索的历程和取得的成就。展陈设计将人文与科学进行了有机融合，把深奥的天文理论转化为艺术形态，以一种寓教于乐的方式打开天体和宇宙的奥秘，将神秘的宇宙星空带到身边。</p>
                    </div>
                    <div class="swiper-slide">
                        <h3>上海天文馆</h3>
                        <p>
                            征程-经历了漫长岁月的积累，人类对宇宙的探索不断加深，从卷卷书页到天文望远镜，灯光对不同展品采用了不同的照明方式，通过立体布灯的方法来表现三维展品的完整面貌,大型展品和布景以切合主题的灯光场景来表达内涵。</p>
                    </div>
                </div>
                <!-- 分页器 -->
                <div class="swiper-pagination"></div>
                <!-- 左右切换按钮 -->
                <div class="prev"></div>
                <div class="next"></div>
            </div>
        </div>
        <div class="p-part3 pt110">
            <div class="tit">案例视频</div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img"><img src="/static/202108/c5b4c5ad9af9db4b41c119257a8cc9b9.jpg"></div>
                        <div class="bg"></div>
                        <div class="play" data-src="/uploads/files/202108/1.mp4">
                            <div class="img1"><img src="/static/images/play-ico.png">
                                <svg viewBox="0 0 120 120" class="svg">
                                    <circle cx="60" cy="60" r="59" stroke-width="2" fill="transparent"
                                            class="circle1"></circle>
                                    <circle cx="60" cy="60" r="59" stroke-width="2" fill="transparent"
                                            class="circle2"></circle>
                                </svg>
                            </div>
                            <p>案例视频</p>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- 案例视频End -->
    </div>
    <div class="case-show1 p110">
        <div class="w83">
            <div class="tit">案例产品</div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <a href="./product-detail/215.html" class="swiper-slide item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/af968efb9ed2790ad513f72fc332b9b4.jpg">
                        </div>
                        <div class="word">
                            <h3>S系列</h3>
                            <p>LED-TCE/InvisiLED S灯带</p>
                        </div>
                    </a>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="case-show2">
        <h3>联系我们</h3>
        <a href="./contact.html" class="more"><span>联系我们</span></a>
    </div>

    <!-- 视频弹窗 -->
    <div id="z_tanchuang" class="z_tanchuang">
        <div class="tbox">
            <div class="modal">
                <div class="out alltime"></div>
                <div class="img">
                    <video src="#" controls></video>
                </div>
            </div>
        </div>
    </div>
    <!-- 视频弹窗END -->
    <!-- 案例详细End -->

@endsection

@section('footer_js')
    <script src="{{ asset('static/js/jquery.transit.js') }}"></script>
    <script src="{{ asset('static/js/swiper.min.js') }}"></script>
    <script src="{{ asset('static/js/swiper.animate.min.js') }}"></script>
    <script src="{{ asset('static/js/wow.min.js') }}"></script>
    <script src="{{ asset('static/js/scrollBar.js') }}"></script>
    <script src="{{ asset('static/js/main.js') }}"></script>
@endsection

@section('content_js')
    <script>
        var swiper1 = new Swiper('.case-show .col-middle .pic', {});
        var swiper2 = new Swiper('.case-show .col-middle .word', {
            pagination: {
                el: '.case-show .col-middle .word .swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.case-show .col-middle .word .next',
                prevEl: '.case-show .col-middle .word .prev',
            },
            breakpoints: {
                1024: {
                    pagination: {
                        el: '.case-show .col-middle .word .swiper-pagination',
                        type: 'bullets',
                    },
                },
            },
        });

        swiper1.controller.control = swiper2; //Swiper1控制Swiper2，需要在Swiper2初始化后
        swiper2.controller.control = swiper1; //Swiper2控制Swiper1，需要在Swiper1初始化后

        var swiper3 = new Swiper('.p-part3 .swiper-container', {
            pagination: {
                el: '.p-part3 .swiper-pagination',
                clickable: true,
            },
        });
        //视频弹窗
        $(".p-part3 .swiper-slide .play").on('click', function () {
            $('.z_tanchuang').removeClass('out').addClass('one');
            var src = $(this).attr('data-src');
            $('html').addClass('act');
            $(".z_tanchuang video").attr({
                src: src
            }).trigger('play');
        });
        $('.z_tanchuang .out').on('click', function () {
            $('.z_tanchuang').addClass('out');
            $('html').removeClass('act');
            $(".z_tanchuang video").trigger('pause');
        });

        var swiper4 = new Swiper('.case-show1 .swiper-container', {
            slidesPerView: 3,
            spaceBetween: 50,
            pagination: {
                el: '.case-show1 .swiper-pagination',
                clickable: true,
            },
            breakpoints: {

                1024: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
            }
        });
    </script>
    <script>
        sr.reveal('.case-show .col-top .left', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.case-show .col-top .right', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.case-show .col-middle .pic', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.case-show .col-middle .word', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.case-show .p-part3 .tit', {
            delay: 100,

        });
        sr.reveal('.p-part3 .swiper-container', {
            delay: 300,

        });
        sr.reveal('.case-show1 .tit', {
            delay: 100,

        });
        sr.reveal('.case-show1 .swiper-container', {
            delay: 200,

        });

    </script>
    <script src="{{ asset('static/js/scrollreveal.min.js') }}"></script>
    <script>
        window.sr = new ScrollReveal({
            distance: '100px',
            duration: 1000,
            easing: 'ease-out',
            viewFactor: 0.2,
            mobile: false
        });
    </script>
    <script>
        sr.reveal('.ny-banner .word1 h3', {
            delay: 100
        });
        sr.reveal('.ny-banner .word1 p', {
            delay: 200
        });
        sr.reveal('.ny-banner .p-nav', {
            delay: 600,
            interval: 300
        });
        sr.reveal('.p-part1', {
            delay: 400
        });
        sr.reveal('.p-part1-1 h3', {
            delay: 200
        });
        sr.reveal('.p-part1-1 h4', {
            delay: 300
        });
        sr.reveal('.p-part1-1 p', {
            delay: 400
        });
        sr.reveal('.p-part2 .p-tit', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.p-part2 dl dt', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.p-part2 dl dd', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.p-part3', {
            delay: 300
        });
        sr.reveal('.p-part4', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.p-part5 .p-tit', {
            delay: 100
        });
        sr.reveal('.p-part5 .ms', {
            delay: 200
        });
        sr.reveal('.p-part6 .p-tit', {
            delay: 300
        });
        sr.reveal('.p-part6 .down .item', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
    </script>
    <script>
        //内页导航置顶滚动
        $(function () {
            //获取要定位元素距离浏览器顶部的距离
            //var navH = $(".ny-banner").height() - 100;
            //滚动条事件
            $(window).scroll(function () {
                //获取滚动条的滑动距离
                var navH = $(".ny-banner").height() - 100;
                var scroH = $(this).scrollTop();
                //滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
                if (scroH >= navH) {
                    $(".p-nav").addClass("ff");
                } else if (scroH < navH) {
                    $(".p-nav").removeClass("ff");
                }
            })
        });
        $(window).scroll(function () {
            var f1 = $('#p-show1').offset().top - 150;
            var f2 = $('#p-show2').offset().top - 150;
            var f3 = $('#p-show3').offset().top - 150;
            var f4 = $('#p-show4').offset().top - 150;
            var f5 = $('#p-show5').offset().top - 150;
            var f6 = $('#p-show6').offset().top - 150;
            if ($(window).scrollTop() >= f1) {
                $(".p-nav .c-nav a").eq(0).addClass('active').siblings().removeClass('active');
            }
            ;
            if ($(window).scrollTop() >= f2) {
                $(".p-nav .c-nav a").eq(1).addClass('active').siblings().removeClass('active');
            }
            ;
            if ($(window).scrollTop() >= f3) {
                $(".p-nav .c-nav a").eq(2).addClass('active').siblings().removeClass('active');
            }
            ;
            if ($(window).scrollTop() >= f4) {
                $(".p-nav .c-nav a").eq(3).addClass('active').siblings().removeClass('active');
            }
            ;
            if ($(window).scrollTop() >= f5) {
                $(".p-nav .c-nav a").eq(4).addClass('active').siblings().removeClass('active');
            }
            ;
            if ($(window).scrollTop() >= f6) {
                $(".p-nav .c-nav a").eq(5).addClass('active').siblings().removeClass('active');
            }
            ;
        });
    </script>
@endsection