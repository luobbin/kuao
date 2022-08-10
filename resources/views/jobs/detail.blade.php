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
            <img src="{{ $common['jobs_background_pc_img'] }}" class="pc">
            <img src="{{ $common['jobs_background_mob_img'] }}" class="m">
        </div>
        <div class="word1" style="width: 40%;">
            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">招聘</h3>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">{{ $common['jobs_background_info'] }}</p>
        </div>
    </div>
    <!-- 内页banner End -->

    <!-- 详细 -->
<div class="job-di">
    <div class="news-show w75">
        <div class="tit">
            <h2>@if($data['if_jp']==1) <span class="button"> 急聘 </span> @endif {{ $data['title'] }}</h2>
            <p>
                <span class="city">{{ $data['city'] }} &nbsp;|&nbsp; {{ $data['cate_name'] }} &nbsp;|&nbsp; {{ $data['jingyan'] }} &nbsp;|&nbsp; {{ $data['demand'] }}</span>
                <span class="time">发布时间：{{ $data['created_at'] }} &nbsp;&nbsp; <span style="color: #C8A063;">{{ $data['salary'] }}</span></span>
            </p>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

        <article>{!! $data['content'] !!}</article>

        <div class="clearfix mb50"></div>
        <div class="show_next">
            <p>
                {!! $common['jobs_bottom_info'] !!}
            </p>
            <div class="">
                <a href="{{ $data['link_addr'] }}" class="buttonface" target="_blank">招聘官网 >>></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- 新闻详细End -->
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


@endsection
