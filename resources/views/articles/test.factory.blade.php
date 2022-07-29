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
            <img src="http://api.kalighting.cn/static/img_topic/factory_bg.jpg" class="pc">
            <img src="http://api.kalighting.cn/static/img_topic/factory_bg_m.jpg" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp">关于工厂</h3>
            <p class="wow fadeInUp">库奥生产厂区坐落于惠州，是集产品研发、设计、生产为一体的高新技术企业。</p>
        </div>
    </div>
    <!-- 内页banner End -->
    <div class="clearfix"></div>

    <div class="news w83">
        <div class="about factory p110">
            <div class="block-title">
                <div class="tit-ban">关于工厂</div>
            </div>
            <div class="clearfix"></div>

            <div class="col-middle">
                <div class="left">
                    <h3>车间生产线</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_03.jpg">
                    <p></p>
                </div>
                <div class="right">
                    <h3>拼装生产线</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_05.jpg">
                    <p></p>
                </div>
                <div class="clearfix"></div>
                <div class="left">
                    <h3>老化生产线</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_09.jpg">
                    <p></p>
                </div>
                <div class="right">
                    <h3>老化生产线</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_10.jpg">
                    <p></p>
                </div>
                <div class="clearfix"></div>
                <div class="left">
                    <h3>电热恒温鼓风干燥箱</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_13.jpg">
                    <p></p>
                </div>
                <div class="right">
                    <h3>光谱测试仪</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_14.jpg">
                    <p></p>
                </div>
                <div class="clearfix"></div>
                <div class="left">
                    <h3>原料仓</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_17.jpg">
                    <p></p>
                </div>
                <div class="right">
                    <h3>成品仓</h3>
                    <img src="http://api.kalighting.cn/static/img_topic/factory_18.jpg">
                    <p></p>
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="col-bottom">
                <img src="http://api.kalighting.cn/static/img_topic/factory_21.jpg">
                <p></p>
                <img src="http://api.kalighting.cn/static/img_topic/factory_23.jpg">
                <p></p>
                <h3>库奥工厂位于广东省惠州市惠城区惠民大道辅路康卓大楼</h3>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

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
        /*发展历程*/
        var swiper1 = new Swiper('.about1 .swiper-container', {
            slidesPerView: "auto",
            speed: 1000,
            freeMode: true,
            allowTouchMove: false, //禁止拖拽切换
            scrollbar: {
                el: '.about1 .swiper-scrollbar',
                draggable: true,
            },
            mousewheel: {
                eventsTarged: '.about1 .swiper-container',
                sensitivity: 0.3,
            },
            breakpoints: {
                1024: {
                    allowTouchMove: true, //允许拖拽切换
                    freeMode: false,
                },
            },
            on: {
                slideChange: function () {
                    var aa = swiper1.getTranslate();
                    var ab = -aa;
                    var ac = ab + 700;
                    $(".about1 .bg1").css('width', 1.2 * ac);
                },
            },
        });

        /*服务领域*/
        var swiper2 = new Swiper('.about2 .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
                el: '.about2 .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            }
        });

        var swiper4 = new Swiper('.about4 .swiper-container', {
            slidesPerView: "auto",
            centeredSlides: true,
            loopedSlides: 6,
            initialSlide: 1,
            loop: true,
            pagination: {
                el: '.about4 .swiper-pagination',
                clickable: true,
            },
        });

        $(document).ready(function () {
            $(".about3 .col-middle").scrollBar();
        });

        $('.about3 .col-middle li').hover(function () {
            var i = $(this).index(); //下标第一种写法
            $(this).addClass('active').siblings().removeClass('active');
            $('.about3 .col-bottom .adr dl').eq(i).addClass('active').siblings().removeClass('active');
        });


    </script>
    <script>
        sr.reveal('.about .col-top .left', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.about .col-top .right', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.about .col-middle .left', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.about .col-middle .right', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.about .col-bottom', {
            delay: 300
        });
        sr.reveal('.about .col-info', {
            delay: 300
        });
        sr.reveal('.about .col-title', {
            delay: 300
        });
        sr.reveal('.about .col-middle', {
            delay: 300
        });
        sr.reveal('.about1 .tit', {
            delay: 100
        });
        sr.reveal('.about1 .swiper-container', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.about2 .tit', {
            delay: 100
        });
        sr.reveal('.about2 .swiper-slide', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.about3 .col-top', {
            delay: 100
        });
        sr.reveal('.about3 .col-middle', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.about3 .col-bottom', {
            delay: 300,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.about4 .tit', {
            delay: 100
        });
        sr.reveal('.about4 .swiper-container', {
            delay: 300,
        });
        sr.reveal('.contact .tit', {
            delay: 100,

        });
        sr.reveal('.contact ul li', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.contact1 .layout .tit', {
            delay: 100,

        });
        sr.reveal('.contact1 .layout form', {
            delay: 200,

        });

    </script>
@endsection
