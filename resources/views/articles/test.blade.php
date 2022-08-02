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
            <img src="http://api.kalighting.cn/static/img_topic/contact.jpg" class="pc">
            <img src="http://api.kalighting.cn/static/img_topic/contact_m.jpg" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp">联系我们</h3>
            <p class="wow fadeInUp">先进的制造，贴心的服务，真诚与您合作。</p>
        </div>
    </div>
    <!-- 内页banner End -->
    <div class="clearfix"></div>

    <div class="news w83">
        <!--开始:联系我们-->
        <div class="about p110">
            <div class="col-title block-title">
                <div class="tit-ban">联系我们</div>
            </div>
            <div class="clearfix"></div>
            <div class="col-info" style="color: white;">
                <div style="width: 100%; border-bottom: 2px solid #efefef;">
                    <div class="p20">
                        <img src="http://api.kalighting.cn/static/img_topic/dingwei.png" style="float: left;">
                        <span style="margin-left: 3%;">广东省深圳市宝安区新湖路华美居 A区C座415-418</span>
                    </div>
                    <div class="p20">
                        <img src="http://api.kalighting.cn/static/img_topic/email.png" style="float: left;width: 15px;">
                        <span style="margin-left: 3%;">邮箱:zwb@kalighting.com </span>
                    </div>
                    <div class="p20" style="margin-bottom: 50px;">
                        <img src="http://api.kalighting.cn/static/img_topic/phone-yellow.png" style="float: left;width: 15px;">
                        <span style="margin-left: 3%;">电话：13927472536 / （周一至周五 9:00-18:00） </span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div style="width: 100%; margin-top: 50px;">
                    <div class="p20">
                        <img src="http://api.kalighting.cn/static/img_topic/dingwei.png" style="float: left;">
                        <span style="margin-left: 3%;">广东省惠州市惠城区惠民大道辅路康卓大楼5楼（工厂）</span>
                    </div>
                    <div class="p20">
                        <img src="http://api.kalighting.cn/static/img_topic/phone-yellow.png" style="float: left;width: 15px;">
                        <span style="margin-left: 3%;">电话：0755-86575946 （工厂） </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>

        <!--结束:联系我们-->

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
                observer:true,//修改swiper自己或子元素时，自动初始化swiper
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
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
                observer:true,//修改swiper自己或子元素时，自动初始化swiper
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
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
        /*关联案例分类*/
        var swiper4 = new Swiper('.about4 .swiper-container', {
            slidesPerView: "auto",
            centeredSlides: true,
            loopedSlides: 6,
            initialSlide: 1,
            loop: true,
            pagination: {
                el: '.about4 .swiper-pagination',
                clickable: true,
                observer:true,//修改swiper自己或子元素时，自动初始化swiper
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
            },
        });

        /*2个切换*/
        var swiper3 = new Swiper('.about3 .swiper-container', {
            slidesPerView: 2,
            spaceBetween: 40,
            pagination: {
                el: '.about3 .swiper-pagination',
                clickable: true,
                observer:true,//修改swiper自己或子元素时，自动初始化swiper
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            }
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
