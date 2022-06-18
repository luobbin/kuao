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
                <a href="{{ url("articles",["cate_id"=>$cate['id']]) }}}" @if ($loop->first) class="active" @endif><span>{{ $cate['name'] }}</span></a>
                @endforeach
            </div>
            <div class="n-list data-list">
                @foreach ($data as $article)
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
                @endforeach
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
            page:0,       //虚拟页数
            pageSize:4,        //每页个数
            data:{},       //当前显示的数据
            delay:true,     //显示更多按钮触发延时
            ifGettingData:true,    //是否正在获取信息
            offsetTop:100,//顶部离列表距离
            setTimeoutId:{},     //setTimeout的ID
            init:function(){
                $('.news .n-list a.item .word p').css('display', 'block');
                this.bindListEvent();  //绑定列表模块事件
                this.initDatas();      //初始化右侧列表
            },

            /**初始化右侧产品列表*/
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
                $('.date-container .n-list').append('<li class="loading"><img src="https://www.flua.com/puri-plug/Images/loading.gif" style="width:20px;height:20px;"/>加载中</li>');

                this.page = 0;
                this.insertDatas();
            },

            /**插入产品*/
            insertDatas:function(){
                var jsonText = '[' +
                    '{"title":"浙江乌镇北栅粮仓展厅及工作室项目获IALD优秀奖","info":"热烈祝贺浙江乌镇北栅粮仓展厅及工作室项目在刚刚结束的第36届国际照明设计奖（IALD International Lightin...",' +
                    '"url":"#","create_date":"2019-06-03","img":"./static/202108/532286b232934a82047a55953b7a8ef6.jpg","id":1},' +
                    '{"title":"收购拥有150年历史的豪华水晶照明品牌Schonbek","info":"Lighting 宣布从Swarovski Lighting, Ltd.（施华洛世奇照明有限公司）手中收购与Schonbek品牌有关的所...",' +
                    '"url":"#","create_date":"2019-06-01","img":"./static/202108/b2ab97b92cdbcff21619182d3ff09889.jpg","id":2},' +
                    '{"title":"四川美术学院美术馆外立面泛光照明工程荣获2021年亚洲照明设计大奖光艺术类特别之光奖！","info":"2021年6月1日， 亚洲照明设计师协会正式宣布由深圳市紫墨设计咨询有限公司、四川美术学院照明艺术研究所、...",' +
                    '"url":"#","create_date":"2019-05-29","img":"./static/202108/532286b232934a82047a55953b7a8ef6.jpg","id":3},' +
                    '{"title":"祝贺！THE LIT AWARD 2021公布！","info":"近日，THE LIT AWARD 2021名单公布，南通大剧院、上海天文馆、景德镇御窑博物馆等多个中国项目榜上有名，WA...",' +
                    '"url":"#","create_date":"2019-05-21","img":"./static/202108/4a29c6086e8386757c459103d2b10513.jpg","id":4}]';
                this.data = $.parseJSON(jsonText);
                //首页返回顶部
                if(this.page <= 0){
                    this.scrollToTop();
                }

                //判断并删除加载中样式
                if($('.date-container li.loading').length > 0) {
                    $('.date-container li.loading').remove();
                }
                //如果是首页删除所有产品
                if(this.page === 0 && $('.date-container .data-list>a').length > 0){
                    $('.date-container .data-list>a').remove();
                }


                //隐藏更多产品按钮
                this.ShowMoreDataBtn(false);

                for (var i = 0; i < this.data.length; i++) {
                    var html = this.getItemHtml(this.data[i]);
                    $('.date-container .data-list').append(html);
                }

                //判断是否加载所有产品,如果没有则显示加载更多按钮
                if (this.pageSize <= this.data.length) {
                    this.ShowMoreDataBtn(true);
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
                    //if(!$('.date-container .show-more-data-btn').hasClass('hide')){
                    var top = document.getElementsByClassName('show-more-data-btn')[0].getBoundingClientRect().top + $('.date-container .show-more-data-btn').height(); //元素顶端到可见区域顶端的距离
                    var se = document.documentElement.clientHeight; //浏览器可见区域高度。
                    if(top <= se ) {
                        if(that.delay){
                            $('.date-container .show-more-data-btn').trigger('click');
                            that.delay = false;
                            setTimeout("listModule.delay = true;",500);
                        }
                    }
                    //}
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
