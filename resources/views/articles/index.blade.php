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
            <img src="/static/202108/4932fb9df849b9eefc0880cbca468852.jpg" class="pc">
            <img src="/static/202108/207810df92d8c98439be3ae91ddd52c0.jpg" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">新闻资讯</h3>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                最新、最全{{ $common['web_name'] }}资讯平台</p>
        </div>
    </div>
    <!-- 内页banner End -->

    <!-- 新闻中心 -->
    <div class="news p110">
        <div class="w83 date-container">
            <div class="n-tab">
                @foreach ($cates as $cate)
                <a href="{{ url("articles") }}?cate_id={{ $cate['id'] }}" @if ($cate['id']==$cate_id) class="active" @endif><span>{{ $cate['name'] }}</span></a>
                @endforeach
            </div>
            <div class="n-list data-list">
                {{--@foreach ($data as $article)
                <a href="{{ url("article_detail",["id"=>$article->id]) }}" class="item c-flex">
                    <div class="word">
                        <span class="time">{{ $article->created_at }}</span>
                        <h3>{{ $article['title'] }}</h3>
                        <p>{{ $article['info'] }}
                        </p>
                        <div class="more">
                            <span>查看详情</span><i></i>
                        </div>
                    </div>
                    <div class="img">
                        <img src="{{ $article['index_img'] }}">
                    </div>
                </a>
                @endforeach--}}
            </div>

            <div class="pull-left show-more-data-btn hide" data-langkey="ShowMore" title="显示更多">显示更多</div>
        </div>
    </div>
    <!-- 新闻中心End -->
    <div class="clearfix"></div>

@endsection


@section('footer_js')
    <script src="{{ asset('static/js/jquery.transit.js') }}"></script>
    <script src="{{ asset('static/js/swiper.min.js') }}"></script>
    <script src="{{ asset('static/js/swiper.animate.min.js') }}"></script>
    <script src="{{ asset('static/js/wow.min.js') }}"></script>
    <script src="{{ asset('static/js/scrollBar.js') }}"></script>
    <script src="{{ asset('static/js/main.js') }}"></script>
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
    <script>
        var aid = 1;
        if (aid == 2) {
            $('.news .n-list a.item .word p').css('display', 'none');
        } else if (aid == 1) {
            $('.news .n-list a.item .word p').css('display', 'block');
        }
    </script>

    <script>
        /**列表展示模块*/
        var listModule = {
            page:1,       //虚拟页数
            pageSize:4,        //每页个数
            data:{},       //当前显示的数据
            delay:true,     //显示更多按钮触发延时
            ifGettingData:false,    //是否正在获取信息
            offsetTop:100,//顶部离列表距离
            setTimeoutId:{},     //setTimeout的ID
            init:function(){
                $('.news .n-list a.item .word p').css('display', 'block');
                this.bindListEvent();  //绑定列表模块事件
                this.initDatas();      //初始化右侧列表
            },

            /**初始列表*/
            initDatas:function(){
                var that = this;
                if(that.ifGettingData){
                    clearTimeout(that.setTimeoutId.listInit);
                    that.setTimeoutId.listInit = setTimeout(function() {
                        that.initDatas();
                    }, 500);
                    return false;
                }
                //隐藏更多按钮、删除原本展示的产品、显示加载中
                this.ShowMoreDataBtn(false);
                $('.date-container .n-list>a').remove();
                $('.date-container .n-list').append('<li class="loading"><img src="{{ $common['loading_img'] }}" style="width:20px;height:20px;"/>加载中</li>');

                this.page = 1;
                this.insertDatas();
            },

            /**插入产品*/
            insertDatas:function(){
                var that = this;
                that.ifGettingData = true;
                $.when(this.listArticle()).then(function(res){
                    that.data = res.data || [];
                    that.appendData(that.data);
                });
            },
            appendData:function (data) {
                //首页返回顶部
                if(this.page <= 1){
                    this.scrollToTop();
                }
                //判断并删除加载中样式
                if($('.date-container li.loading').length > 0) {
                    $('.date-container li.loading').remove();
                }
                //如果是首页删除所有产品
                if(this.page === 1 && $('.date-container .data-list>a').length > 0){
                    $('.date-container .data-list>a').remove();
                }
                //隐藏更多产品按钮
                this.ShowMoreDataBtn(false);

                for (var i = 0; i < data.length; i++) {
                    var html = this.getItemHtml(data[i]);
                    $('.date-container .data-list').append(html);
                }
                //获取到的数据比分页数量大或者相等,如果没有则显示加载更多按钮
                if (this.pageSize <= data.length) {
                    this.ShowMoreDataBtn(true);
                }else {
                    this.ShowMoreDataBtn(false);
                }
                //去掉加载中
                this.ifGettingData = false;
            },
            /**获取展示html*/
            getItemHtml:function(pro){
                pro = pro || {};
                var html = [];

                html.push('<a href="'+ pro['url'] +'" class="item c-flex">' +
                    '<div class="word">' +
                    '<span class="time">'+ pro['create_date'] +'</span>' +
                    '<h3>'+ pro['title'] +'</h3>' +
                    '<p>'+ pro['info'] +'</p>' +
                    '<div class="more">' +
                    '<span>查看详情</span><i></i>' +
                    '</div>' +
                    '</div>' +
                    '<div class="img">' +
                    '<img src="'+ pro['img'] +'">' +
                    '</div>' +
                    '</a>');
                return html.join('\n');
            },

            /**显示隐藏显示更多按钮*/
            ShowMoreDataBtn:function(show){
                if(show){
                    $('.date-container .show-more-data-btn').removeClass('hide');
                }else{
                    $('.date-container .show-more-data-btn').addClass('hide');
                }
            },


            /**返回顶部*/
            scrollToTop:function(){
                var h = $('.date-container').offset().top - document.documentElement.scrollTop;
                if(h < this.offsetTop){
                    document.documentElement.scrollTop = $('.date-container').offset().top - this.offsetTop;
                }
            },

            /**绑定列表模块事件*/
            bindListEvent:function (){
                var that = this;
                //显示更多产品（这里可以改造ajax加载获取更多数据）
                $('.date-container').off('click','.show-more-data-btn').on('click','.show-more-data-btn',function(e){
                    that.page++;
                    that.insertDatas();
                });

                //滚动触发自动展示更多产品事件
                $(window).scroll(function() {
                    if(!$('.date-container .show-more-data-btn').hasClass('hide')){
                        var top = document.getElementsByClassName('show-more-data-btn')[0].getBoundingClientRect().top + $('.date-container .show-more-data-btn').height(); //元素顶端到可见区域顶端的距离
                        var se = document.documentElement.clientHeight; //浏览器可见区域高度。
                        if(top <= se ) {
                            if(that.delay){
                                $('.date-container .show-more-data-btn').trigger('click');
                                that.delay = false;
                                setTimeout("listModule.delay = true;",500);
                            }
                        }
                    }
                });

            },
            //获取文章列表
            listArticle:function(){
                return $.ajax({
                    url:'articles',
                    data:{
                        page: this.page,
                        limit: this.pageSize,
                        searchJoin: 'and',
                        search: 'cate_id:{{ $cate_id }};',
                        searchFields: 'cate_id:=;',
                        orderBy: 'id',
                        sortedBy: 'desc',
                        filter: ''
                    },
                    type:'GET',
                    dataType:'json'
                });
            },
        };
        listModule.init();
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
