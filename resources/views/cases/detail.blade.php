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
            <img src="{{ $data['index_img'] }}" class="pc">
            <img src="{{ $data['index_img'] }}" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp">项目案例</h3>
            <p class="wow fadeInUp">{{ $common['cases_background_info'] }}</p>
        </div>
    </div>
    <!-- 内页banner End -->
    <!-- 案例详细 -->
    <div class="case-show p80 w83">
        <div class="col-top clearfix">
            <div class="left">
                {{ $data['name'] }}
            </div>
            <div class="right">
                <p>
                    {{ $data['info'] }}
                </p>
                <p><br/></p>
            </div>
        </div>
        <div class="col-middle">
            <div class="swiper-container pic">
                <div class="swiper-wrapper">
                    @foreach ($data['imgs'] as $item)
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="{{ $item['img'] }}">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-container word">
                <div class="swiper-wrapper">
                    @foreach ($data['imgs'] as $item)
                    <div class="swiper-slide">
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['info'] }}</p>
                    </div>
                    @endforeach
                </div>
                <!-- 分页器 -->
                <div class="swiper-pagination"></div>
                <!-- 左右切换按钮 -->
                <div class="prev"></div>
                <div class="next"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="p-part3 pt110">
            <div class="tit">案例视频</div>
            <div class="clearfix"></div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img"><img src="{{ $data['video_img'] }}"></div>
                        <div class="bg"></div>
                        <div class="play" data-src="{{ $data['video_url'] }}">
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
        <div class="clearfix"></div>
        @if($data['products'])
        <div class="case-show1">
            <div class="tit">案例产品</div>
            <div class="clearfix"></div>
            <div class="bg-white">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($data['products'] as $product)
                        <a href="{{ url("product_detail",["id"=>$product['id']]) }}" class="swiper-slide item">
                            <div class="tip">{{ $product['name'] }}</div>
                            <div class="img">
                                <img src="{{ $product['index_img'] }}">
                            </div>
                            <div class="word">
                                <h3>{{ $product['description'] }}</h3>
                                <p>{{ $product['info'] }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        @endif

        <div class="clearfix"></div>
        <div class="case-show1">
            <div class="tit">联系我们</div>
            <a href="{{ url("/news/contact_us") }}">
                <img src="{{ $common['case_contact_us_img'] }}" style="width: 100%">
            </a>
        </div>

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
    <script>
        window.sr = new ScrollReveal({
            distance: '100px',
            duration: 1000,
            easing: 'ease-out',
            viewFactor: 0.2,
            mobile: false
        });
    </script>
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
