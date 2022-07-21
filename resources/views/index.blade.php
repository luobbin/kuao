@extends('layouts.frame')

@section('header_css')
    <link href="{{ url('static/home/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ url('static/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ url('static/css/animate.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- 首页banner -->
    <div class="index-banner">
        <div class="bg">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-swiper-autoplay="15000">
                        <video src="{{ $banner['pc_video_url'] }}" type="video/mp4" autoplay="autoplay"
                               loop="loop" muted="muted" style="object-fit: fill;display: block;width:100vw;"></video>
                        <div class="mm">
                            <img src="{{ $banner['mob_img_url'] }}" class="mm">
                            <div class="word">
                                <h3><strong class="ani" swiper-animate-effect="fadeInLeft2" swiper-animate-duration="1s"
                                            swiper-animate-delay="0.2s">{{ $banner['mob_h3'] }}</strong></h3>
                                <p><strong class="ani" swiper-animate-effect="fadeInLeft2" swiper-animate-duration="1s"
                                           swiper-animate-delay="0.4s">{{ $banner['mob_p'] }}</strong>
                                </p>
                                <div class="oc">
                                    <a href="{{ $banner['mob_a_url'] }}" class="more ani" swiper-animate-effect="fadeInLeft2"
                                       swiper-animate-duration="1s" swiper-animate-delay="0.6s">
                                        <span>详情 >>></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="img">--}}
{{--                            <img src="{{ url('static/images/index_banner02.jpg') }}" class="pc">--}}
{{--                            <img src="{{ url('static/images/index_bannerm02.jpg') }}" class="m">--}}
{{--                        </div>--}}
{{--                        <div class="word">--}}
{{--                            <h3><strong class="ani" swiper-animate-effect="fadeInLeft2" swiper-animate-duration="1s"--}}
{{--                                        swiper-animate-delay="0.2s">上海天文馆</strong></h3>--}}
{{--                            <p><strong class="ani" swiper-animate-effect="fadeInLeft2" swiper-animate-duration="1s"--}}
{{--                                       swiper-animate-delay="0.4s"></strong>--}}
{{--                            </p>--}}
{{--                            <div class="oc">--}}
{{--                                <a href="cases-detail/1.html" class="more ani" swiper-animate-effect="fadeInLeft2"--}}
{{--                                   swiper-animate-duration="1s" swiper-animate-delay="0.6s">--}}
{{--                                    <span>详情 >>></span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- Add Pagination -->
                <div class="index-p"></div>
                <!-- Add Arrows -->
                <div class="index-next hide"></div>
                <div class="index-prev hide"></div>
            </div>
        </div>
    </div>
    <!-- 首页bannerEnd -->
    <!-- banner高度 -->
    <div class="oo"></div>
    <!-- banner高度End -->
    <div class="clearfix"></div>

<div class="w83 p110">
    <!--幻灯片:项目案例-->
    <div class="block-title">
        <div class="tit-ban">{{$homeNames[1]}}</div>
        <div class="fr">
            @foreach ($cates as $cate)
                <a href="{{ url("cases") }}?cate_id={{ $cate['id'] }}">{{ $cate['name'] }}</a>
            @endforeach
        </div>
    </div>
    <div class="clearfix"></div>
    <section class="block-1 css3">
        <div class="ban">
            <ul id="slider"></ul>
            <div class="clearfix"></div>
        </div>
        <div class="xxx">
            <a id="left_arrow" class="banner_left"><img src="{{ url('static/home/left.png') }}"></a>
            <a id="right_arrow" class="banner_right"><img src="{{ url('static/home/right.png') }}"></a>
        </div>
        <div class="point" id="num"></div>
        <div class="clearfix"></div>
    </section>

    <!--logo墙-->
    <div class="block-title">
        <div class="tit-ban">{{$homeNames[5]}}</div>
    </div>
    <div class="clearfix"></div>
    <section class="block-2 hide">
        <div id="HomeProInfo" class="logo-wall"></div>
        <div class="clearfix"></div>
    </section>

    <!--项目案例-->
{{--    <section class="block-6">--}}
{{--        <div class="home-title animated">--}}
{{--            <h2 title="{{$homeNames[2]}}">{{$homeNames[2]}}</h2>--}}
{{--            <span></span>--}}
{{--        </div>--}}
{{--        <ul id="HomeEngineeringCaseList">--}}
{{--            <div class="clearfix"></div>--}}
{{--        </ul>--}}
{{--    </section>--}}

    <!--视频展示-->
    <div class="block-title">
        <div class="tit-ban">{{$homeNames[3]}}</div>
    </div>
    <div class="clearfix"></div>
    <section class="block-4">
        <ul id="HomeVideoList"></ul>
        <div class="video-switch-btn last-video"></div>
        <div class="video-switch-btn next-video"></div>
    </section>

    <!--新闻动态-->
    <div class="block-title">
        <div class="tit-ban">{{$homeNames[4]}}</div>
    </div>
    <div class="clearfix"></div>
    <section class="block-5">
        <ul id="HomeNewsList">

        </ul>
    </section>

</div>

@endsection

@section('footer_js')
    <script src="{{ asset('static/home/jquery.form.js') }}"></script>
    <script src="{{ asset('static/home/jquery.cookie.js') }}"></script>
    <script src="{{ asset('static/home/jquery-ui.js') }}" type="text/javascript"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('static/home/bootstrap.js') }}"></script>
    <script src="{{ asset('static/home/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('static/home/owl.carousel.min.js') }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{ asset('static/home/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/home/tools.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/home/core.js') }}"></script>
@endsection

@section('content_js')
    <script type="text/javascript" src="{{ asset('static/home/home.js') }}"></script>
    <script type="text/javascript">
        // 首页banner
        $(function () {
            var bannerItem = $('.index-banner .swiper-slide');
            var swiper1 = new Swiper('.index-banner .swiper-container', {
                speed: 1000,
                effect: 'fade',
                noSwiping: true,
                autoplay: {
                    delay: 6000,
                    stopOnLastSlide: false,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.index-p',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.index-next',
                    prevEl: '.index-prev',
                },
                pagination: {
                    el: ".index-p",
                    clickable: !0,
                    renderBullet: function (e, i) {
                        return '<div class="' + i +
                            '"><svg viewBox="0 0 120 120" class="svg"><circle cx="60" cy="60" r="54" stroke-width="6" fill="transparent" class="circle1"></circle> <circle cx="60" cy="60" r="54" stroke-width="6" fill="transparent" class="circle2" style="animation-duration:' +
                            $(".index-banner .swiper-slide").eq(e).data("duration") +
                            's"></circle></svg></div>'
                    }
                },
                on: {
                    init: function () {
                        swiperAnimateCache(this); //隐藏动画元素
                        swiperAnimate(this); //初始化完成开始动画
                        bannerItem.eq(0).addClass(createNum());
                    },
                    slideChangeTransitionStart: function () {
                        bannerItem.removeClass('leftUp moveRight moveDown centerBig rightDownBig').eq(
                            this.activeIndex).addClass(createNum());
                    },
                    slideChangeTransitionEnd: function () {
                        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
                        //this.slides.eq(this.activeIndex).find('.ani').removeClass('ani'); 动画只展现一次，去除ani类名
                    },
                }
            })

            function createNum() {
                var animName;
                var num = Math.floor(Math.random() * 5);
                switch (num) {
                    case 1:
                        animName = 'moveRight'
                        break;
                    case 2:
                        animName = 'moveDown'
                        break;
                    case 3:
                        animName = 'centerBig'
                        break;
                    case 4:
                        animName = 'rightDownBig'
                        break;
                    default:
                        animName = 'leftUp'
                        break;
                }
                return animName;
            }
            //其他模块加载
            initHome();
        });
    </script>
@endsection
