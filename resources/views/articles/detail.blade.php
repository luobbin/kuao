@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')

    <!-- 新闻详细 -->
    <div class="news-show w75">
        <div class="tit">
            <h1>{{ $data['title'] }}</h1>
            <p class="time">发布时间：{{ $data['created_at'] }}</p>

        </div>

        <div class="ms">
            <title>{{ $data['info'] }}</title>
            <article>{!! $data['content'] !!}</article>
        </div>

        <div class="show_next clearfix">
            <div class="fl">
                <p>上一篇：
                    @if ($data['next'])
                        <a href="{{ url("article_detail", ["id"=>$data['next']['id']]) }}">{{ $data['next']['title'] }}</a>
                    @else
                        沒有了
                    @endif
                </p>
                <p>下一篇：
                    @if ($data['previous'])
                        <a href="{{ url("article_detail", ["id"=>$data['previous']['id']]) }}">{{ $data['previous']['title'] }}</a>
                    @else
                        沒有了
                    @endif
                </p>
            </div>
            <div class="fr">
                <a href="{{ url("articles") }}" class="buttonface">返回列表 >>></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- 新闻详细End -->
    <div style="height:100px;"></div>

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
<style>
    article img{width: 100%; overflow: hidden;}
</style>

@endsection
