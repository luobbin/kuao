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
        <img src="http://api.kalighting.cn/static/img_topic/products_bg.jpg" class="pc">
        <img src="http://api.kalighting.cn/static/img_topic/products_bg_m.jpg" class="m">
    </div>
    <div class="word1">
        <h3 class="wow fadeInUp">产品中心</h3>
        <p class="wow fadeInUp">库奥专心于照明技术、研究，制造让“消费者心动”的产品，创造全新的产品与需求，通过独特的产品研发，为顾客创造新的照明方式。</p>
    </div>
</div>
<!-- 内页banner End -->
<div class="clearfix"></div>

{{--{!! $data['content'] !!}--}}
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
        <div class="col-middle">
            <div class="left">
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 50%;"><a href="/products?cid=1"><img src="/static/img_topic/images/product_center_01_01.jpg"></a></td>
                        <td style="width: 50%;"><a href="/products?cid=1"><img src="/static/img_topic/images/product_center_01_02.jpg"></a></td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
            </div>
            <div class="right">
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 50%;"><a href="/products?cid=2"><img src="/static/img_topic/images/product_center_02_01.jpg"></a></td>
                        <td style="width: 50%;"><a href="/products?cid=3"><img src="/static/img_topic/images/product_center_02_02.jpg"></a></td>
                    </tr>
                    </tbody>
                </table>
                <p></p>
            </div>
            <div class="clearfix"></div>
            <div class="left">
                <table style="border-collapse: collapse; width: 100%; background-color: #fff;">
                    <caption>配件类</caption>
                    <tbody>
                    <tr>
                        <td style="width: 25%;"><a href="/products?cid=3"><img src="/static/img_topic/images/product_center_03_03.jpg"></a></td>
                        <td style="width: 25%;"><a href="/products?cid=3"><img src="/static/img_topic/images/product_center_03_04.jpg"></a></td>
                        <td style="width: 25%;"><a href="/products?cid=4"><img src="/static/img_topic/images/product_center_03_05.jpg"></a></td>
                        <td style="width: 25%;"><a href="/products?cid=3"><img src="/static/img_topic/images/product_center_03_06.jpg"></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="right">
                <a href="/products?cid=4"><img src="http://api.kalighting.cn/static/img_topic/product_center_04.jpg"></a>
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

<div class="clearfix"></div>
<div class="modal fade catalog-modal" id="InventoryCatalogModal" tabindex="-1" role="dialog" aria-hidden="true"
     data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="pull-left catalog-modal-title" title="{{ $common['web_name'] }}">KA</div>
                <div class="pull-left catalog-modal-subtitle" title="{{ $common['web_name'] }} 产品目录">{{ $common['web_name'] }} 目录下载</div>
                <div class="pull-left catalog-modal-year" title="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></div>
                <div class="pull-left catalog-modal-text">
                    <span title="微信扫描二维码添加{{ $common['web_name'] }}公众号可获取目录">微信扫描二维码<br>添加{{ $common['web_name'] }}公众号<br>可获取产品目录</span>
                </div>
                <div class="pull-left catalog-modal-QRcode">
                    <img src="{{ $common['public_account_img'] }}">
                </div>
                <div class="pull-left catalog-modal-phone" title="拨打服务热线:{{ $common['connect_phone'] }}">拨打服务热线:{{ $common['connect_phone'] }}
                </div>
                <div class="clearfix"></div>
                <div class="close" data-dismiss="modal" aria-hidden="true">×</div>
            </div>
        </div>
    </div>
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
            observer:true,//修改swiper自己或子元素时，自动初始化swiper
            observeParents:true,//修改swiper的父元素时，自动初始化swiper
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
        if($('div').hasClass('.about .col-top .left')) {
            sr.reveal('.about .col-top .left', {
                delay: 100,
                interval: 300,
                origin: 'left'
            });
        }
        if($('div').hasClass('.about .col-top .right')) {
            sr.reveal('.about .col-top .right', {
                delay: 200,
                interval: 300,
                origin: 'right'
            });
        }
        if($('div').hasClass('.about .col-middle .left')) {
            sr.reveal('.about .col-middle .left', {
                delay: 100,
                interval: 300,
                origin: 'left'
            });
        }
        if($('div').hasClass('.about .col-middle .right')) {
            sr.reveal('.about .col-middle .right', {
                delay: 200,
                interval: 300,
                origin: 'right'
            });
        }
        if($('div').hasClass('.about .col-bottom')) {
            sr.reveal('.about .col-bottom', {
                delay: 300
            });
        }
        if($('div').hasClass('.about .col-info')) {
            sr.reveal('.about .col-info', {
                delay: 300
            });
        }
        if($('div').hasClass('.about .col-title')) {
            sr.reveal('.about .col-title', {
                delay: 300
            });
        }
        if($('div').hasClass('.about .col-middle')) {
            sr.reveal('.about .col-middle', {
                delay: 300
            });
        }
        if($('div').hasClass('.about1 .tit')) {
            sr.reveal('.about1 .tit', {
                delay: 100
            });
        }
        if($('div').hasClass('.about1 .swiper-container')) {
            sr.reveal('.about1 .swiper-container', {
                delay: 200,
                interval: 300,
                origin: 'left'
            });
        }
        if($('div').hasClass('.about2 .tit')) {
            sr.reveal('.about2 .tit', {
                delay: 100
            });
        }
        if($('div').hasClass('.about2 .swiper-slide')) {
            sr.reveal('.about2 .swiper-slide', {
                delay: 200,
                interval: 300,
                origin: 'left'
            });
        }
        if($('div').hasClass('.about3 .col-top')) {
            sr.reveal('.about3 .col-top', {
                delay: 100
            });
        }
        if($('div').hasClass('.about3 .col-middle')) {
            sr.reveal('.about3 .col-middle', {
                delay: 200,
                interval: 300,
                origin: 'right'
            });
        }
        if($('div').hasClass('.about3 .col-bottom')) {
            sr.reveal('.about3 .col-bottom', {
                delay: 300,
                interval: 300,
                origin: 'left'
            });
        }
        if($('div').hasClass('.about4 .tit')) {
            sr.reveal('.about4 .tit', {
                delay: 100
            });
        }
        if($('div').hasClass('.about4 .swiper-container')) {
            sr.reveal('.about4 .swiper-container', {
                delay: 300,
            });
        }
        if($('div').hasClass('.contact .tit')) {
            sr.reveal('.contact .tit', {
                delay: 100,
            });
        }
        if($('div').hasClass('.contact ul li')) {
            sr.reveal('.contact ul li', {
                delay: 200,
                interval: 300,
                origin: 'left'
            });
        }
        if($('div').hasClass('.contact1 .layout .tit')) {
            sr.reveal('.contact1 .layout .tit', {
                delay: 100,

            });
        }
        if($('div').hasClass('.contact1 .layout form')) {
            sr.reveal('.contact1 .layout form', {
                delay: 200,

            });
        }

    </script>
@endsection
