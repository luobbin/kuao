@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')
{!! $data['content'] !!}
@endsection

@section('footer_js')
    <script>
        window.location.reload();
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
