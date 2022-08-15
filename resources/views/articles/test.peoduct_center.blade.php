@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')

<div class="news w83">
    <div class="about">
        <div class="col-top block-title">
            <div class="tit-ban">产品筛选</div>
            <div class="fr">
                <a href="/products?cid=1">室内专业类</a>
                <a href="/products?cid=2">室内设计类</a>
                <a href="/products?cid=3">博物馆照明</a>
                <a href="/products?cid=4">展示箱</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="product-center-tag" style="position: absolute; height: 292px; margin-left: -68px; overflow: hidden; display: none;">
            <img src="/static/img_topic/images/pcenter_tag.png" style="height: 100%;">
        </div>
        <div class="col-middle">
            <div class="left">
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 50%;"><a href="/products?cid=1"><img src="/static/img_topic/images/pcenter_04.png"></a></td>
                        <td style="width: 50%;"><a href="/products?cid=1"><img src="/static/img_topic/images/pcenter_05.png"></a></td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
            </div>
            <div class="right">
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 50%;"><a href="/products?cid=2"><img src="/static/img_topic/images/pcenter_07.png"></a></td>
                        <td style="width: 50%;"><a href="/products?cid=2"><img src="/static/img_topic/images/pcenter_08.png"></a></td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
            </div>
            <div class="clearfix"></div>
            <div class="left">
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 50%;"><a href="/products?cid=3"><img src="/static/img_topic/images/pcenter_12.png"></a></td>
                        <td style="width: 50%;"><a href="/products?cid=3"><img src="/static/img_topic/images/pcenter_13.png"></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="right">
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 50%;"><a href="/products?cid=4"><img src="/static/img_topic/images/pcenter_14.png"></a></td>
                        <td style="width: 50%;"><a href="/products?cid=4"><img src="/static/img_topic/images/pcenter_15.png"></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="block-title" >
        <div class="tit-ban">产品目录申请</div>
    </div>
    <div class="clearfix"></div>
    <div class="about3">
        <div class="swiper-container">
            <div class="swiper-wrapper catalog">
                <div class="swiper-slide">
                    <img src="http://api.kalighting.cn/static/img_topic/product_center_cate_01.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="http://api.kalighting.cn/static/img_topic/product_center_cate_02.jpg">
                </div>
            </div>
        </div>
    </div>
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

        /*2个切换*/
        var swiper3 = new Swiper('.about3 .swiper-container', {
            slidesPerView: 2,
            spaceBetween: 40,
            pagination: {
                el: '.about3 .swiper-pagination',
                clickable: true,
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
