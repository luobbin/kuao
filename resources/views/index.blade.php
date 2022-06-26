@extends('layouts.frame')

@section('header_css')
    <link href="{{ url('static/home/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/jquery-ui.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div><span></span></div>
    <!--幻灯片-->
    <section class="block-1  css3">
        <div class="ban">
            <ul id="slider"></ul>
            <div class="clearfix"></div>
        </div>
        <div class="xxx">
            <a id="left_arrow" class="banner_left"><img src="{{ url('static/home/left.png') }}"></a>
            <a id="right_arrow" class="banner_right"><img src="{{ url('static/home/right.png') }}"></a>
        </div>
        <div class="point" id="num"></div>
        <div class="clearfix"></div>
    </section>

    <!--项目案例-->
    <section class="block-6">
        <div class="home-title animated">
            <h2 title="{{$homeNames[2]}}">{{$homeNames[2]}}</h2>
            <span></span>
        </div>
        <ul id="HomeEngineeringCaseList">
            <div class="clearfix"></div>
        </ul>
    </section>

    <!--视频展示-->
    <section class="block-4">
        <div class="home-title animated">
            <h2 title="{{$homeNames[3]}}">{{$homeNames[3]}}</h2>
            <span></span>
        </div>
        <ul id="HomeVideoList"></ul>
        <div class="video-switch-btn last-video"></div>
        <div class="video-switch-btn next-video"></div>
    </section>

    <!--logo墙-->
    <section class="block-2 hide">
        <div class="home-title animated">
            <h2 title="{{$homeNames[5]}}">{{$homeNames[5]}}</h2>
            <span></span>
        </div>
        <div id="HomeProInfo" style="padding:0px 70px; margin-bottom: 36px;"></div>
        <div class="clearfix"></div>
    </section>

    <!--新闻动态-->
    <section class="block-5">
        <div class="home-title animated">
            <h2 title="{{$homeNames[4]}}">{{$homeNames[4]}}</h2>
            <span></span>
        </div>
        <ul id="HomeNewsList">

        </ul>
    </section>



    <div style="height:100px;"></div>

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
        $(function() {
            initHome();
        });
    </script>
@endsection