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
            <img src="http://api.kalighting.cn/static/images/index_banner02.jpg" class="pc">
            <img src="http://api.kalighting.cn/static/images/index_bannerm02.jpg" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp">关于我们</h3>
            <p class="wow fadeInUp">以创新的技术、卓越的品质和一流的服务，通过灯具对光信息的演绎来诠释照明美学，创造美好的光环境。</p>
        </div>
    </div>
    <!-- 内页banner End -->
    <div class="clearfix"></div>

    <div class="news w83">
        <!--开始:库奥照明简介-->
        <div class="about">
            <div class="col-top block-title">
                <div class="tit-ban">库奥照明简介</div>
                <div class="fr">
                    <a href="#about">公司介绍</a>
                    <a href="#about1">发展历程</a>
                    <a href="#about2">服务领域</a>
                    <a href="#about4">关联案例分类</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div id="about"></div>
            <div class="col-middle" style="background-color: #EFEFEF;float: left;padding: 50px 0;">
                <div class="info">
                    <div class="limg">
                        <img src="http://api.kalighting.cn//static/img_topic/about_usinfo_01.jpg">
                    </div>
                    <div class="rtxt">
                        <h3>库奥（深圳）照明技术有限公司</h3>
                        <p>
                            库奥（深圳）照明技术有限公司一直致力于国际前沿技术的研究与创新，研发出的SUBROSA隐光、LiteBrush光瀑、LiteBox偏光洗墙等核心技术，广泛运用到博物馆照明产品中，相继完成了故宫博物院、良渚博物院、南京牛首山、曲阜尼山等重要文化圣地，用丰富的灯光灵感，照亮文物璀璨新生。凭借在高端展陈空间里的技术优势，如今我们在国内已服务了超过40%的国家一级博物馆，参与制定国家行业标准，以创新引领行业，以品质树立标杆。
                        </p>
                    </div>
                </div>

                <div class="info">
                    <div class="ltxt">
                        <p>
                            专业且充满热情的服务团队，给予空间高级定制般的灯光体验。以深厚的技术底蕴，为博物馆、高端酒店住宅、商业综合体、零售、建筑，景观等空间提供可持续照明解决方案和技术应用。<br>
                            秉承“行动本土化，思维全球化”的理念，库奥在国内拥有专属的研发中心及工厂，以创新的技术、卓越的品质和一流的服务，为多元空间创造非凡的灯光体验。以深厚的技术底蕴，为博物馆、高端酒店住宅、商业综合体、零售、建筑，景观等空间提供可持续照明解决方案和技术应用。
                        </p>
                    </div>
                    <div class="rimg">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usinfo_04.jpg">
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>

        <!--结束:库奥照明简介-->
        <!--开始:发展历程-->
        <div id="about1"></div>
        <div class="block-title" id="about2">
            <div class="tit-ban">发展历程</div>
        </div>
        <div class="clearfix"></div>
        <div class="about1" style="margin-bottom: 80px;">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_01.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_02.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_03.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_04.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_05.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_06.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_07.jpg">
                    </div>
                    <div class="swiper-slide c-flex">
                        <img src="http://api.kalighting.cn/static/img_topic/about_usfzlc_08.jpg">
                    </div>
                    <div class="bg"></div>
                    <div class="bg1"></div>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <!--结束:发展历程-->
        <!--开始:服务领域-->
        <div id="about2"></div>
        <div class="block-title" >
            <div class="tit-ban">服务领域</div>
        </div>
        <div class="clearfix"></div>
        <div class="about2" style="margin-bottom: 80px;">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us03.png">
                        </div>
                        <div class="word">
                            <h3>展陈展示空间</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us04.png">
                        </div>
                        <div class="word">
                            <h3>酒店照明</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us05.png">
                        </div>
                        <div class="word">
                            <h3>会展空间</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us06.jpg">
                        </div>
                        <div class="word">
                            <h3>商业高空间</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--结束:服务领域-->
        <!--开始:关联案例分类-->
        <div id="about4"></div>
        <div class="block-title" >
            <div class="tit-ban">关联案例分类</div>
        </div>
        <div class="clearfix"></div>
        <div class="about4">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us03.png">
                        </div>
                        <div class="word">
                            <h3>酒店案例</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us04.png">
                        </div>
                        <div class="word">
                            <h3>博物馆案例</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us05.png">
                        </div>
                        <div class="word">
                            <h3>商业空间案例</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="http://api.kalighting.cn/static/img_topic/about_us06.jpg">
                        </div>
                        <div class="word">
                            <h3>别墅豪宅案例</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--结束:关联案例分类-->
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
