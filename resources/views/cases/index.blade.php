@extends('layouts.frame')

@section('header_css')
    <link rel="stylesheet" href="{{ url('static/css/index.css') }}">
    <link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection

@section('content')
    <div><span></span></div>
    <!-- 内页banner -->
    @if($cate_id == 0)
        <div class="ny-banner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($cates as $cate)
                    <div class="swiper-slide">
                        <div class="img">
                            <img src="{{ $cate['img'] }}">
                        </div>
                        <div class="word1">
                            <h3>{{ $cate['name'] }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>    <!-- 如果需要导航按钮 -->
            </div>
        </div>
    @else
    <div class="ny-banner">
        <div class="img">
            <img src="{{ $data['img'] }}" class="pc">
            <img src="{{ $data['img'] }}" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">项目案例</h3>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                {{ $data['info'] }}</p>
        </div>
    </div>
    @endif
    <!-- 内页banner End -->

    <!-- 工程案例 -->
    <div class="case p80 w83">
        <div class="col-top clearfix" style=" height: auto;">
            <div class="left">
                <h3><span style="color:#A1A09E;">项目案例</span> | </h3>
            </div>
            <div class="right">
                <h3>分类筛选</h3>
                <div class="form searchCase">
                    <input name="keyword" type="text" placeholder="按案例名称搜索"/>
                    <button class="searchButton">搜索</button>
                </div>
                <div class="tab">
                    @foreach ($cates as $cate)
                        <a href="{{ url("cases") }}?cate_id={{ $cate['id'] }}" @if ($cate['id']==$cate_id) class="active" @endif>{{ $cate['name'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="date-container">
            <div class="col-bottom data-list clearfix" style="height: auto;">

            </div>

            <div class="pull-left show-more-data-btn hide" data-langkey="ShowMore" title="显示更多">显示更多</div>
        </div>
        <div class="clearfix"></div>
        <div class="case-show1">
            <div class="tit">联系我们</div>
            <a href="{{ url("/news/contact_us") }}">
                <img src="{{ $common['case_contact_us_img'] }}" style="width: 100%">
            </a>
        </div>
    </div>
    <!-- 工程案例End -->

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
        /**banner切换**/
        var myswiper = new Swiper('.ny-banner .swiper-container', {
            slidesPerView: 1,
            initialSlide: 1,
            loop: true,
            autoplay: {
                delay: 3000
            },
            pagination: {
                el: '.ny-banner .swiper-pagination',
                clickable: true,
                observer:true,//修改swiper自己或子元素时，自动初始化swiper
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
            },
        });
        /**列表展示模块*/
        var listModule = {
            page:1,       //虚拟页数
            pageSize:6,        //每页个数
            search:'',  //搜索字段
            searchFields:'',//搜索规则
            data:{},       //当前显示的数据
            delay:true,     //显示更多按钮触发延时
            ifGettingData:false,    //是否正在获取信息
            ifSearchMode:false, //是否搜索获取结果模式
            offsetTop:100,//顶部离列表距离
            setTimeoutId:{},     //setTimeout的ID
            init:function(){
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
                $('.date-container .data-list>a').remove();
                $('.date-container .data-list').append('<li class="loading"><img src="{{ $common['loading_img'] }}" style="width:20px;height:20px;"/>加载中</li>');

                this.page = 1;
                this.insertDatas();
            },

            /**搜索产品*/
            searchDatas:function(name){
                var that = this;
                that.ifGettingData = true;
                that.page = 1;
                that.pageSize = 100;
                $.when(this.ajaxGetList(name)).then(function(res){
                    that.data = res.data || [];
                    //console.log("获取到的搜索列表数据为：",that.data);
                    that.appendData(that.data);
                });
                //that.page++;
            },
            /**插入产品*/
            insertDatas:function(){
                var that = this;
                that.ifGettingData = true;
                $.when(this.ajaxGetList()).then(function(res){
                    that.data = res.data || [];
                    //console.log("获取到的列表数据为：",that.data);
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
                html.push('<a href="'+ pro['url'] +'" class="item">' +
                    '<div class="img">' +
                        '<img src="'+ pro['index_img'] +'">' +
                    '</div>' +
                    '<div class="word">' +
                        '<h3>'+ pro['name'] +'<span> 案例详解 >>> </span></h3>' +
                        '<p>'+ pro['info'] +'</p>' +
                        '<div class="adr">' +  pro['location'] + '</div>' +
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
                //显示更多产品
                $('.date-container').off('click','.show-more-data-btn').on('click','.show-more-data-btn',function(e){
                    that.page++;
                    that.insertDatas();
                });
                //显示更多产品（这里可以改造ajax加载获取更多数据）
                $('.searchCase').off('click','.searchButton').on('click','.searchButton',function(e){
                    var keyword = $('.searchCase').find('input[name="keyword"]').val();
                    if(!that.ifSearchMode){
                        that.page = 1;
                        $('.date-container .data-list>a').remove();
                    }
                    that.ifSearchMode = true;
                    that.searchDatas(keyword);
                });
                //滚动触发自动展示更多产品事件
                $(window).scroll(function() {
                        if(!$('.date-container .show-more-data-btn').hasClass('hide')) {
                            var top = document.getElementsByClassName('show-more-data-btn')[0].getBoundingClientRect().top + $('.date-container .show-more-data-btn').height(); //元素顶端到可见区域顶端的距离
                            var se = document.documentElement.clientHeight; //浏览器可见区域高度。
                            if (top <= se) {
                                if (that.delay) {
                                    if (that.ifSearchMode) {
                                        $('.searchCase .searchButton').trigger('click');
                                    } else {
                                        $('.date-container .show-more-data-btn').trigger('click');
                                    }
                                    that.delay = false;
                                    setTimeout("listModule.delay = true;", 500);
                                }
                            }
                        }
                });

            },
            //获取列表
            ajaxGetList:function(name){
                if (name){
                    this.search = 'name:'+ name +'';
                    this.searchFields = 'name:like';
                }else {
                    var cateId = {{ $cate_id }};
                    console.log("cateId",cateId);
                    if (cateId!==0){
                        this.search = 'cate_id:{{ $cate_id }};';
                        this.searchFields = 'cate_id:=;';
                    }
                }
                return $.ajax({
                    url: 'cases',
                    data: {
                        page: this.page,
                        limit: this.pageSize,
                        searchJoin: 'and',
                        search: this.search,
                        searchFields: this.searchFields,
                        orderBy: 'id',
                        sortedBy: 'desc',
                        filter: ''
                    },
                    type: 'GET',
                    dataType: 'json'
                });
            },
        };
        listModule.init();
    </script>
    <script>
        sr.reveal('.case .col-top .left', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.case .col-top .right', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
        sr.reveal('.case .col-bottom a.item', {
            delay: 100,
            interval: 300,
            origin: 'left'
        });
        sr.reveal('.case .col-bottom a.item:nth-child(2n)', {
            delay: 200,
            interval: 300,
            origin: 'right'
        });
    </script>
@endsection
