@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')

    <!-- 内页banner -->
    <div class="ny-banner">
        <div class="img">
            <img src="{{ $common['product_background_pc_img'] }}" class="pc">
            <img src="{{ $common['product_background_mob_img'] }}" class="m">
        </div>
        <div class="word1">
                <h3>{{ $data['name'] }}</h3>
            <p>{{ $data['description'] }}</p>
        </div>
        <div class="p-nav" style="background-color: #ffffff;">
            <div class="w83">
                <h3>{{ $data['name'] }}</h3>
                <div class="c-nav">
                    <a href="#p-show1" class="active">简介</a>
                    <a href="#p-show2">特点</a>
                    <a href="#p-show3">规格</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 内页banner End -->
<div class="w83 p110" style="background-color: white;">
    <!-- 产品简介 -->
    <div id="p-show1"></div>
    <div class="p-part1">
        <div class="p-ms">
            <div class="swiper-container oa">
                <div class="swiper-wrapper">
                    @foreach ($data['imgs'] as $img)
                    <div class="swiper-slide">
                        <img src="{{ $img }}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-container ob">
                <div class="swiper-wrapper">
                    @foreach ($data['imgs'] as $img)
                        <div class="swiper-slide">
                            <img src="{{ $img }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- 切换按钮 -->
        <div class="p-prev"></div>
        <div class="p-next"></div>
    </div>
    <div class="p-part1-1">
        <h3>{{ $data['name'] }}</h3>
        <h4>{{ $data['description'] }}</h4>
        <p>{{ $data['info'] }}</p>
    </div>
    <!-- 产品简介End -->
    <!-- 产品特点 -->
    <div id="p-show2"></div>
    <div class="p-part2 pt110">
        <div class="w83">
            <div class="tit-ban">产品特点</div>
            <div class="clearfix"></div>
            @foreach ($data['features'] as $feature)
                @if ($loop->index%2==0)
                    <dl class="c-flex">
                        <dt>
                            <img src="{{ $feature['img'] }}">
                        </dt>
                        <dd>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['content'] }}</p>
                        </dd>
                    </dl>
                @else
                    <dl class="c-flex">
                        <dd>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['content'] }}</p>
                        </dd>
                        <dt>
                            <img src="{{ $feature['img'] }}">
                        </dt>
                    </dl>
                @endif

            @endforeach
        </div>
    </div>
    <!-- 产品特点End -->
    <!-- 产品规格 -->
    <div id="p-show3"></div>
    <div class="p-part5 pt110">
        <div class="w83">
            <div class="tit-ban">产品规格</div>
            <div class="clearfix"></div>
            <div class="ms">
                {!! $data['specification'] !!}
            </div>
        </div>
    </div>
    <!-- 产品规格End -->
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
        var swiper1 = new Swiper('.p-part1 .ob', {
            slidesPerView: 4,
            //loop: true,
            //loopedSlides: 5, //looped slides should be the same
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper('.p-part1 .oa', {
            navigation: {
                nextEl: '.p-next',
                prevEl: '.p-prev',
            },
            thumbs: {
                swiper: swiper1,
            },
        });

        var swiper3 = new Swiper('.p-part3 .swiper-container', {
            pagination: {
                el: '.p-part3 .swiper-pagination',
                clickable: true,
            },
        });

        var swiper4 = new Swiper('.p-part4 .swiper-container', {
            spaceBetween: 20,
            freeMode: true,
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.next',
                prevEl: '.prev',
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
                    $('header').addClass('gray');
                } else if (scroH < navH) {
                    $(".p-nav").removeClass("ff");
                    $('header').removeClass('gray');
                }
            })
        });
        $(window).scroll(function () {
            var f1 = $('#p-show1').offset().top - 150;
            var f2 = $('#p-show2').offset().top - 150;
            var f3 = $('#p-show3').offset().top - 150;
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
        });
    </script>
@endsection
