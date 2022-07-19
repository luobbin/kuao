@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')

    <div class="search content w83">
        <form action="{{ url("product_search") }}" method="get" class="f_18 ss">
            <input type="text" class="" name="name" value="{{ $name }}" placeholder="请输入搜索内容...">
            <button class="iconfont iconsousuo">
                <img src="{{ url('static/images/ser-ico2.png') }}" alt="">
            </button>
        </form>
        <div class="clearfix"></div>
        <div class="product" style="background-color: #fff;">
            <dl>
                <dd>
                    @foreach ($data as $item)
                    <a href="{{ url("product_detail",["id"=>$item['id']]) }}" class="item">
                        <div class="tip">{{ $item['description'] }}</div>
                        <div class="img">
                            <img src="{{ $item['index_img'] }}">
                        </div>
                        <div class="word">
                            {{ $item['name'] }}
                        </div>
                    </a>
                    @endforeach
                    <div class="clearfix"></div>
                </dd>
            </dl>
        </div>
    </div>

@endsection

@section('footer_js')
    <script src="{{ asset('static/js/jquery.transit.js') }}"></script>
    <script src="{{ asset('static/js/swiper.min.js') }}"></script>
    <script src="{{ asset('static/js/swiper.animate.min.js') }}"></script>
    <script src="{{ asset('static/js/wow.min.js') }}"></script>
    <script src="{{ asset('static/js/scrollBar.js') }}"></script>
    <script src="{{ asset('static/js/scrollreveal.min.js') }}"></script>
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

@endsection
