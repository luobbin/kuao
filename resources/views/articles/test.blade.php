@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/home/bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')

    <!-- 内页banner -->
    <div class="ny-banner aa">
        <div class="img">
            <img src="http://api.kalighting.cn/static/img_topic/about_us_bg.jpg" class="pc">
            <img src="http://api.kalighting.cn/static/img_topic/about_us_bg_m.jpg" class="m">
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
                            库奥（深圳）照明技术有限公司专注于LED整体照明方案的个性化定制，是国内倡导整体照明定制的科技企业。公司创建于2009年，公司创始团队一直从事LED照明产品的设计、开发和营销工作。丰富的从业经验，对照明行业的热爱和对光照艺术的不懈追求，是库奥人敢于走在行业前端的主要动力。
                        </p>
                    </div>
                </div>

                <div class="info">
                    <div class="ltxt">
                        <p>
                            经过多年的发展，现已拥有超过600名员工，25名经验丰富的工程师，拥有独立的LED驱动部门、光学设计部门和照明设计部门。<br><br>
                            库奥照明自成立以来，以专业的照明解决方案，为商业照明提供专业的照明解决方案。我们始终以产品质量和客户需求为主导。公司致力于为客户提供专业服务，开发了系列LED照明产品，满足不同的需求，符合CE、CCC、RoHS的要求，可广泛应用于服装零售、食品杂货店、餐饮及商店、珠宝、奢侈品商店等。
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
        <div class="about1">
            <div class="img">
                <img src="http://api.kalighting.cn/static/img_topic/about_us02.png">
            </div>
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
        <div class="about2">
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
                        <a href="/cases?cate_id=1">
                            <div class="img">
                                <img src="http://api.kalighting.cn/static/img_topic/about_us03.png">
                            </div>
                            <div class="word">
                                <h3>酒店案例</h3>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/cases?cate_id=2">
                            <div class="img">
                                <img src="http://api.kalighting.cn/static/img_topic/about_us04.png">
                            </div>
                            <div class="word">
                                <h3>博物馆案例</h3>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/cases?cate_id=3">
                            <div class="img">
                                <img src="http://api.kalighting.cn/static/img_topic/about_us05.png">
                            </div>

                            <div class="word">
                                <h3>商业空间案例</h3>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="/cases?cate_id=4">
                            <div class="img">
                                <img src="http://api.kalighting.cn/static/img_topic/about_us06.jpg">
                            </div>
                            <div class="word">
                                <h3>别墅豪宅案例</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>    <!-- 如果需要导航按钮 -->
            </div>
        </div>
        <!--结束:关联案例分类-->
    </div>

@endsection

@section('footer_js')
    <script src="{{ asset('static/home/bootstrap.js') }}"></script>
    <script>
        $(function () {
            //绑定目录申请弹窗事件
            $('.about3 .swiper-container .swiper-slide,.about3 .swiper-container .swiper-slide img').click(function(e) {
                $('#InventoryCatalogModal').modal({show: true});
            });
        });
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
