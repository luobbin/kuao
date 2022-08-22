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
                        <div class="mm topVideo">
                            <div class="play-button"></div>
                            <img src="{{ $topVideo['mob_img_url'] }}" class="mm">
                        </div>
                        <video id="videoPlay" src="{{ $topVideo['pc_video_url'] }}" type="video/mp4" autoplay="autoplay"
                               loop="loop" muted="muted" x5-video-player-type="h5" preload="metadata" playsinline="true"
                               webkit-playsinline="true"  x-webkit-airplay="true"x5-video-orientation="portraint" x5-video-player-fullscreen="true" style="object-fit: fill;display: block;width:100vw;"></video>
{{--                        <div class="mm">--}}
{{--                            <img src="{{ $topVideo['mob_img_url'] }}" class="mm">--}}
{{--                            <div class="word">--}}
{{--                                <h3><strong class="ani" swiper-animate-effect="fadeInLeft2" swiper-animate-duration="1s"--}}
{{--                                            swiper-animate-delay="0.2s">{{ $topVideo['mob_h3'] }}</strong></h3>--}}
{{--                                <p><strong class="ani" swiper-animate-effect="fadeInLeft2" swiper-animate-duration="1s"--}}
{{--                                           swiper-animate-delay="0.4s">{{ $topVideo['mob_p'] }}</strong>--}}
{{--                                </p>--}}
{{--                                <div class="oc">--}}
{{--                                    <a href="{{ $topVideo['mob_a_url'] }}" class="more ani" swiper-animate-effect="fadeInLeft2"--}}
{{--                                       swiper-animate-duration="1s" swiper-animate-delay="0.6s">--}}
{{--                                        <span>详情 >>></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
{{--                <!-- Add Pagination -->--}}
{{--                <div class="index-p"></div>--}}
{{--                <!-- Add Arrows -->--}}
{{--                <div class="index-next hide"></div>--}}
{{--                <div class="index-prev hide"></div>--}}
            </div>
        </div>
    </div>
    <!-- 首页bannerEnd -->
    <!-- banner高度 -->
    <div class="oo"></div>
    <!-- banner高度End -->


    <div class="clearfix"></div>

<div class="home mdec90 w83">
    <!--幻灯片:项目案例-->
    <div class="block-title">
        <div class="tit-ban">{{ $homeNames[1]['name'] }}</div>
        <div class="fr">
            @foreach ($cates as $cate)
                <a href="{{ url("cases") }}?cate_id={{ $cate['id'] }}">{{ $cate['name'] }}</a>
            @endforeach
        </div>
    </div>
    <div class="clearfix"></div>
    <section class="block-1">
        <div class="swiper-container ban">
            <div class="swiper-wrapper">
                @foreach ($blockCases as $cat)
                    <div class="swiper-slide">
                        <a href="{{ $cat['url'] }}">
                            <div class="img">
                                <img src="{{ $cat['img'] }}">
                            </div>
                            <div class="ban-con">
                                <h2>{{ $cat['title'] }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="left_arrow" class="cicle banner_left"><img src="{{ url('static/home/images/banner-left.png') }}"></div>
        <div id="right_arrow" class="cicle banner_right"><img src="{{ url('static/home/images/banner-right.png') }}"></div>
        <div id="num" class="point" style="display: none;"></div>
        <div class="clearfix"></div>
    </section>

    <!--logo墙-->
    <div class="block-title">
        <div class="tit-ban">{{ $homeNames[5]['name'] }}</div>
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
        <div class="tit-ban">{{ $homeNames[3]['name'] }}</div>
    </div>
    <div class="clearfix"></div>
    <section class="block-4">
        <ul id="HomeVideoList"></ul>
        <div class="video-switch-btn last-video"></div>
        <div class="video-switch-btn next-video"></div>
    </section>

    <!--新闻动态-->
    <div class="block-title">
        <div class="tit-ban">{{ $homeNames[4]['name'] }}</div>
    </div>
    <div class="clearfix"></div>
    <section class="block-5">
        <ul id="HomeNewsList">

        </ul>
    </section>

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
            var swiper0 = new Swiper('.index-banner .swiper-container', {
                speed: 1000,
                effect: 'fade',
                noSwiping: true,
                autoplay: {
                    delay: 6000,
                    stopOnLastSlide: false,
                    disableOnInteraction: false,
                },
                // pagination: {
                //     el: '.index-p',
                //     clickable: true,
                //     observer:true,//修改swiper自己或子元素时，自动初始化swiper
                //     observeParents:true,//修改swiper的父元素时，自动初始化swiper
                // },
                // navigation: {
                //     nextEl: '.index-next',
                //     prevEl: '.index-prev',
                // },
                // pagination: {
                //     el: ".index-p",
                //     clickable: !0,
                //     renderBullet: function (e, i) {
                //         return '';
                //         // return '<div class="' + i +
                //         //     '"><svg viewBox="0 0 120 120" class="svg"><circle cx="60" cy="60" r="54" stroke-width="6" fill="transparent" class="circle1"></circle> <circle cx="60" cy="60" r="54" stroke-width="6" fill="transparent" class="circle2" style="animation-duration:' +
                //         //     $(".index-banner .swiper-slide").eq(e).data("duration") +
                //         //     's"></circle></svg></div>'
                //     }
                // },
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
            });
            /**banner切换**/
            var swiper1 = new Swiper('.block-1 .swiper-container', {
                slidesPerView: 1,
                loop: true,
                autoplay: {
                    delay: 5000
                },
                pagination: {
                    el: '.block-1 .swiper-pagination',
                    clickable: true,
                    observer:true,//修改swiper自己或子元素时，自动初始化swiper
                    observeParents:true,//修改swiper的父元素时，自动初始化swiper
                },
                navigation: {
                    nextEl: '.block-1 .banner_right',
                    prevEl: '.block-1 .banner_left',
                },
            });
            /**视频轮播**/
            var swiper4 = new Swiper('.block-4 .swiper-container', {
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween : 10,
                initialSlide: 1,
                loop: true,
                navigation: {
                    nextEl: '.block-4 .next-video',
                    prevEl: '.block-4 .last-video',
                },
            });
            //视频弹窗
            $(".block-4 .swiper-slide .play").on('click', function () {
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
            //顶部视频轮播数字
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
            //顶部视频自动播放（微信浏览器）
            var width = $('#videoPlay').width();
            if(width < 768 && isWeiXin()) {
                $('.index-banner .swiper-slide .mm').show();
                $('.topVideo .play-button').click(function(e) {
                    $('.index-banner .swiper-slide .mm').hide();
                    $('#videoPlay').trigger('play');
                });
                //$('#videoPlay').attr("controls","controls");
                audioAutoPlay('videoPlay')
            }
            //其他模块加载
            initHome();
        });
    </script>
@endsection
