<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{$pageTitle}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$pageTitle}}">
    <meta name="description" content="{{$pageTitle}}">
    <meta name="author" content="{{$common['web_name']}}">
    <meta name="renderer" content="webkit">
    <link rel="shortcut icon" href="{{ url('static/images/logo.ico') }}">
    @yield('header_css')
    <link rel="stylesheet" href="{{ url('static/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('static/home/style.css') }}">
</head>
<body class="Home-body">
<!-- pc头部 -->
<header class="fix">
    <div class="left">
        <div class="nav-ico"></div>
    </div>

    <a href="{{ route('index') }}" class="logo">
        <img src="{{ $common['logo'] }}" alt="{{$common['web_name']}}" height="100%">
    </a>

    <div class="right">
        <div class="ser1"></div>
    </div>
    <div id="siteHeaderSearch">
        <div class="search-box">
            <div class="search-box-cover"></div>
            <form action="{{ url('product_search') }}" method="get" class="search-form">
                <span class="search-btn"></span>
                <input type="text" name="name" placeholder="请输入您想搜索的内容" class="search-input">
                <span class="close-btn"></span>
            </form>
        </div>
    </div>
</header>
<!-- pc头部End -->

<!-- PC目录弹出 -->
<div class="menu-tc">
    <div class="nav">
        <div class="col-top">
            <img src="{{ url('static/images/menu-close.png') }}">
            目录
        </div>

        <div class="col-middle">
            @foreach ($common['web_header_menu_setting'] as $menu)
                <dl>
                    <dt>
                        <a href="{{$menu['url']}}" title="{{$menu['name']}}">{{$menu['name']}}</a>
                        <i></i>
                    </dt>
                    @if ($menu['childs'])
                    <dd>
                        @foreach ($menu['childs'] as $menuChild)
                            <a href="{{$menuChild['url']}}" title="{{$menuChild['name']}}">{{$menuChild['name']}}</a>
                        @endforeach
                    </dd>
                    @endif
                </dl>
            @endforeach
        </div>
        <div class="col-bottom">
            <p class="time">{{ $common['connect_time'] }}</p>
            <p class="tel">{{ $common['connect_phone'] }}</p>
<!--            <div class="fx">
				<span>
					<img src="{{ $common['wechat_connect_img'] }}">
				</span>
            </div>-->
        </div>

    </div>
    <div class="bg"></div>
</div>
<!-- 目录弹出End -->


<!-- 手机头部 -->
<div class="search-bg1"></div>
<div class="header2">
    <div class="main-wrap f-cb">
        <h1 class="logo fl">
            <a href="{{ route('index') }}">
                <img src="{{ $common['logo'] }}">
            </a>
        </h1>
        <div class="ser">
            <a href="{{ url('product_search') }}"><img src="{{ url('static/images/ser-ico2.png') }}"></a>
        </div>
        <div class="nav-btn fr">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
    </div>
    <div class="sub-menu">
        <ul>
            @foreach ($common['web_header_menu_setting'] as $menu)
                <li>
                    @if ($menu['childs'])
                        <div class="tit sub-tit" title="{{ $menu['name'] }}"><a href="javascript:void(0)">{{ $menu['name'] }}</a><i></i></div>
                        <div class="sec-list">
                            @foreach ($menu['childs'] as $menuChild)
                                <p><a href="{{$menuChild['url']}}" title="{{$menuChild['name']}}">{{$menuChild['name']}}</a></p>
                            @endforeach
                        </div>
                    @else
                        <a class="tit" href="{{$menu['url']}}" title="{{$menu['name']}}">{{$menu['name']}}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- 手机头部End -->

@yield('content')

<div class="clearfix"></div>

<footer id="footer">
    <div class="di-xin w83 p40">
        <div class="di-link-ban">
            {!! $common['footer_menu_setting'] !!}
        </div>
        <div class="di-qrcode-fen">
            <div class="di-fen-ban share">
                <p title="社交分享">社交分享</p>
                <div class="di-fen">
                    {!! $common['share_code'] !!}
                </div>
            </div>
            <div class="di-fen-ban gzh">
                <p title="公众号"> &nbsp;</p>
                <div class="di-fen">
                    <div class="qrcode" >
                        <img src="{{ $common['public_account_img'] }}">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="di-foot w83">
        <div class="img"><img src="{{ url('static/images/logo2.png') }}"></div>
        <div class="address">{!! $common['connect_address'] !!}</div>
        <div class="clearfix"></div>
        <hr style="margin: 10px 0; border: 1px solid; border-color:#9E9F9F;">
        <div class="clearfix"></div>
        <a href="http://www.beian.miit.gov.cn/" title="{{$common['web_copyright']}}" target="_blank" class="di-beian" > {!! $common['web_copyright'] !!} </a>
    </div>
    <div class="clearfix"></div>
</footer>

<!-- 置顶按钮 -->
<div class="right_zd">
    <ul>
        @foreach ($common['right_account_list'] as $connect)
        <li>
            <div class="ico">
                <img src="{{ $connect['ico1'] }}" class="pp">
                <img src="{{ $connect['ico2'] }}" class="pa">
            </div>
            <div class="ewm">
                <img src="{{ $connect['img'] }}">
            </div>
        </li>
        @endforeach
        <li>
            <div class="ico">
                <img src="{{ url('static/images/fr-ico6-1.png') }}" class="pp">
                <img src="{{ url('static/images/fr-ico6-2.png') }}" class="pa">
            </div>
        </li>
    </ul>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('static/home/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('static/js/scrollBar.js') }}"></script>
<script src="{{ asset('static/js/main.js') }}"></script>
<script src="{{ asset('static/js/jquery.transit.js') }}"></script>
<script src="{{ asset('static/js/swiper.min.js') }}"></script>
<script src="{{ asset('static/js/swiper.animate.min.js') }}"></script>
<script src="{{ asset('static/js/wow.min.js') }}"></script>
<script src="{{ asset('static/js/scrollBar.js') }}"></script>
<script src="{{ asset('static/js/scrollreveal.min.js') }}"></script>
@yield('footer_js')

<script>
    var map;
    var default_img='{{ $common['default_img'] }}';
    var loading_img='{{ $common['loading_img'] }}';
    $(function () {
        $('#footer .di-link-ban .di-link.hide').each(function (index, element) {
            if ($(this).find('a.di-link-nei').length == 0) {
                $(this).remove();
            } else {
                $(this).removeClass('hide');
            }
        });
    });
</script>

@yield('content_js')

</body>
</html>
