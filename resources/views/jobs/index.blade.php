@extends('layouts.frame')

@section('header_css')
    <link rel="stylesheet" href="{{ url('static/css/index.css') }}">
    <link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection

@section('content')
    <div><span></span></div>
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

    <!-- 列表 -->
    <div class="jobs p80 w83">
        <div class="date-container">
            <div class="n-list">
                @foreach ($data as $item)
                    <a class="item" href="{{ url("job_detail",["id"=>$item->id]) }}">
                        <div class="bg-white mb50 @if($loop->index%2 == 0) left @else right @endif">
                            <div class="top">
                                <b>{{ $item->title }}</b>
                                <b class="fr">
                                    {{ $item->salary }}
                                    @if($item->if_jp==1) <span class="button"> 急聘 </span> @endif
                                </b>
                            </div>
                            <div class="bottom">
                                {{ $item->city }} &nbsp;|&nbsp; {{ $item->jingyan }} &nbsp;|&nbsp; {{ $item->demand }}
                                <span class="time">{{ date_day($item->updated_at) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- 列表End -->
    <div class="clearfix"></div>

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
        var aid = 1;
        if (aid == 2) {
            $('.news .n-list a.item .word p').css('display', 'none');
        } else if (aid == 1) {
            $('.news .n-list a.item .word p').css('display', 'block');
        }
    </script>

    <script>
        sr.reveal('.news .n-tab', {
            delay: 100,
        });
        sr.reveal('.news .n-list a.item .word', {
            delay: 200,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.news .n-list a.item .img', {
            delay: 300,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.fy', {
            delay: 100,
        });

    </script>

@endsection
