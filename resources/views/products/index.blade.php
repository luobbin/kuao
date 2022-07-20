@extends('layouts.frame')

@section('header_css')
    <link href="{{ url('static/home/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('static/home/jquery-ui.css') }}" rel="stylesheet">
@endsection

@section('content')

    <section id="slider" class="block-1 css3">
        <div class="ban">
            <ul class="slider"></ul>
            <div class="clearfix"></div>
        </div>
        <div class="xxx">
            <a class="banner_left"><img src="{{ url('static/home/left.png') }}"></a>
            <a class="banner_right"><img src="{{ url('static/home/right.png') }}"></a>
        </div>
        <div class="point"></div>
        <div class="clearfix"></div>
    </section>
    <div class="clearfix" style="margin-top: 80px;"></div>
    <section class="pin-1 css3">
        <div class="pro-left css5">

            <div class="pro-left-fixed-btn"><span></span><span></span><span></span></div>

            <div class="pro-block panel-group pro-lvl-group pro-lvl-group-1" id="pro-lvl-group">
            </div>

            <div class="pro-left-title2 text-ellipsis" title="热销新品推荐">热销新品推荐</div>
            <div class="pro-block sell-well">
                <div class="sell-well-selects">
                    <div class="selected" style="width: 100%;">
                        <span class="text-ellipsis" data-field="po16" data-value="HOT" title="HOT">HOT</span>
                    </div>
                </div>
                <ul class="pro-promotion-well">
                    @foreach ($hot_products as $product)
                    <a href="{{$product['url']}}">
                    <li title="{{ $product['name'] }}" class="pro-left-pro" data-pid="{{ $product['cate_id'] }}" data-diy="N">
                        <img src="{{ $product['index_img'] }}" data-src="{{ $product['index_img'] }}">
                        <div class="text">
                            <div class="name text-ellipsis" title="{{ $product['name'] }}">{{ $product['name'] }}</div>
                        </div>
                    </li>
                    </a>
                    @endforeach
                </ul>
                <div class="more-promotion-well">
                    <a href="{{ url("products") }}" class="more-promotion-well-text text-ellipsis" title="查看更多">查看更多 <span>>>></span></a>
                </div>
            </div>

            <div class="pro-left-title2 text-ellipsis" title="目录申请">目录申请</div>
            <div class="pro-block pro-left-catalog">
                <ul>
                    @foreach($common['catalog_apply_imgs'] as $catalog_img)
                    <li><img src="{{ $catalog_img }}"></li>
                    @endforeach
                </ul>
                <div class="pro-left-catalog-btn" title="申请">申请</div>
            </div>
        </div>

        <div class="pro-right series">

            <div class="pull-left pro-list-tool">
                <div>
                    <div id="pro-list-filter" class="pull-left pro-list-filter">
                        <ul class="breadcrumb">

                        </ul>
                    </div>

                    <div id="more-filters-list" class="pull-right more-filters-list"></div>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="pull-right pro-right-btn" onselectstart="return false;">
                        <div class="map-list map selected"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="pull-left pro-right-list-container">
                <ul class="pull-left pro-right-list"></ul>

                <div class="pull-left show-more-pro-btn hide" data-langkey="ShowMore" title="显示更多">显示更多</div>


                <div class="pro-list-top-right" style="top: 422.859px; max-height: 802px;">

                    <div id="pro-list-more-filter" class="pro-list-more-filter hide">
                        <div class="pro-more-filter-btn"></div>
                        <div class="pro-more-filter-fields">
                            <table style="width: 100%;">
                                <tbody id="pro-list-more-filter-list"></tbody>
                            </table>
                            <div class="btn-group">
                                <div>
                                    <div class="text-ellipsis btn cancel" data-langkey="btn.cancel" title="取消">取消</div>
                                </div>
                                <div>
                                    <div class="text-ellipsis btn reset" data-langkey="btn.reset" title="重置">重置</div>
                                </div>
                                <div>
                                    <div class="text-ellipsis btn ok" data-langkey="btn.ok" title="确认">确认</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul id="pro-list-index" class="nav pro-list-index hide"></ul>
                </div>


            </div>
            <div class="clearfix"></div>
        </div>
    </section>


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
    <script src="{{ asset('static/home/InventoryProLvl.js') }}"></script>
    <script src="{{ asset('static/home/InventoryBanner.js') }}"></script>
    <script src="{{ asset('static/home/InventoryConf.js') }}"></script>
    <script src="{{ asset('static/home/Inventory.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            var option = {
                typecode: "{{ $cid }}",
                typename: "{{ $cname }}"
            }
            initInventory(option);
        });

    </script>

    <div class="modal fade catalog-modal" id="InventoryCatalogModal" tabindex="-1" role="dialog" aria-hidden="true"
         data-backdrop="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="pull-left catalog-modal-title" title="{{ $common['web_name'] }}">{{ $common['web_name'] }}</div>
                    <div class="pull-left catalog-modal-subtitle" title="{{ $common['web_name'] }} LOOKBOOK">{{ $common['web_name'] }} LOOKBOOK</div>
                    <div class="pull-left catalog-modal-year" title="2022">2022</div>
                    <div class="pull-left catalog-modal-text">
                        <span title="微信扫描二维码添加库奥客户可获取目录">微信扫描二维码<br>添加{{ $common['web_name'] }}客户<br>可获取目录</span>
                    </div>
                    <div class="pull-left catalog-modal-QRcode">
                        <img src="{{ $common['wechat_connect_img'] }}">
                    </div>
                    <div class="pull-left catalog-modal-phone" title="拨打服务热线:{{ $common['connect_phone'] }}">拨打服务热线:{{ $common['connect_phone'] }}
                    </div>
                    <div class="clearfix"></div>
                    <div class="close" data-dismiss="modal" aria-hidden="true">×</div>
                </div>
            </div>
        </div>
    </div>
@endsection
