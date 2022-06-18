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

<!--宽版顶部导航栏-->
<header id="head">
    <!--左侧logo-->
    <div class="logo">
        <a href="{{ route('index') }}">
            <img src="{{ $common['logo'] }}" alt="##">
        </a>
    </div>
    <!--中间菜单-->
    <ul class="menu menu_ZH">
        @foreach ($common['web_header_menu_setting'] as $menu)
            <li class="lists ">
                <div class="divxian">
                    <a class="one" href="{{$menu['url']}}" title="{{$menu['name']}}">{{$menu['name']}}</a>
                    <div class="xia"></div>
                </div>
                <div class="menu_zi @if ($menu['name'] == "产品中心") menu_zi_inventory @endif">
                    @foreach ($menu['childs'] as $menuChild)
                        <div class="zi"><a class="one ziSize" href="{{$menuChild['url']}}" title="{{$menuChild['name']}}">{{$menuChild['name']}}</a></div>
                        @if ($menu['name']=="产品中心")
                            <hr style="margin: 5px;border-color: #CCCCCC;">
                        @endif
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
    <!--右侧功能栏-->
    <div class="function">
        <!--搜索-->
        <span class="seach"><em style="font-style:normal" title="搜索">搜索</em></span>
    </div>

    <div class="head-right-img">
        <img src="{{ $common['connect_phone_img'] }}">
    </div>

    <div class="look">
        <div name="infosearch" method="post">
            <input type="hidden" name="sl" value="ZH">
            <input style="border-radius:0;" class="for" name="keyword" type="text" placeholder="产品名称">
            <input name="submitsearch" type="button" class="jiao buttonface" value="搜索" onclick="ToSearch(this);">
        </div>
    </div>

    <div class="moblie-bt"><span></span><span></span><span></span></div>
    <div class="clearfix"></div>
</header>

<!--手机版右侧菜单-->
<section class="mobile-menu">
    <ul>
        @foreach ($common['mob_header_menu_setting'] as $menu)
            <li>
                <a class="one" href="{{$menu['url']}}" title="{{$menu['name']}}">{{$menu['name']}}</a>
                <div class="xian"></div>
            </li>
        @endforeach
    </ul>
    <!--功能箱-->
    <div class="function">
        <div class="look" style="display:block; position:relative; bottom:0; margin-bottom:20px;">
            <div name="infosearch" method="post">
                <input type="hidden" name="sl" value="ZH">
                <input style="background:#E8E8E8; width:50%; border-radius:0; color:#000" id="keyword" class="for" name="keyword" type="text" placeholder="产品名称">
                <input name="submitsearch" type="button" class="jiao buttonface" value="搜索" onclick="ToSearch(this);">
            </div>
        </div>
    </div>
</section>


@yield('content')

<div class="clearfix"></div>

<footer id="footer">
    <div class="di-xin">
        <div class="di-link-ban">
            @foreach ($common['footer_menu_setting'] as $menu)
                <div class="di-link">
                    <div class="di-link-title" title="{{$menu['name']}}">{{$menu['name']}}</div>
                    @foreach ($menu['childs'] as $menuChild)
                    <a class="di-link-nei" target="_blank" href="{{$menuChild['url']}}" title="{{$menuChild['name']}}">{{$menuChild['name']}}</a>
                    @endforeach
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
        <div class="di-qrcode-fen">
            <div class="di-qrcode">
                <div class="qrcode qrcode1" style="display: block;">
                    <img src="{{ $common['public_account_img'] }}">
                    <p title="KA公众号">KA公众号</p>
                </div>
                <div class="qrcode qrcode2">
                    <img src="{{ $common['wechat_connect_img'] }}">
                    <p title="微信二维码">微信二维码</p>
                </div>
            </div>
            <div class="di-fen-ban">
                <p title="社交分享">社交分享</p>
                <div class="di-fen" data-id="S">
                    {!! $common['share_code'] !!}
                </div>
                <a href="http://www.beian.miit.gov.cn/" title="{{$common['web_copyright']}}" target="_blank" class="di-beian" > {!! $common['web_copyright'] !!} </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
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
@yield('footer_js')

<script type="text/javascript" src="{{ asset('static/home/header.js') }}"></script>
<script>
    var map;
    var default_img='{{ $common['default_img'] }}';
    var loading_img='{{ $common['loading_img'] }}';
    $(function () {
        initHeaderPage();
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
