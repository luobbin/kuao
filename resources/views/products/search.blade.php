@extends('layouts.frame')

@section('header_css')
<link rel="stylesheet" href="{{ url('static/css/index.css') }}">
<link rel="stylesheet" href="{{ url('static/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ url('static/css/animate.min.css') }}">
@endsection


@section('content')

    <div class="search content">
        <form action="https://www.waclighting.com.cn/search" method="get" class="f_18 ss">
            <input type="text" class="" name="title" value="" placeholder="请输入搜索内容...">
            <button class="iconfont iconsousuo">
                <img src="{{ url('static/images/icon-search-h.png') }}" alt="">
            </button>
        </form>
        <div class="product" style="background-color: #fff;">
            <dl>
                <dd>
                    <a href="product-detail/10.html" class="item">
                        <div class="tip">VOLTA</div>
                        <div class="img">
                            <img src="/static/202108/c85b93b11a5459f8685b6e73fdb3adeb.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形</h3>
                            <p>DLT41/DLT51/DLT61 4/5/6寸</p>
                        </div>
                    </a>
                    <a href="product-detail/6.html" class="item">
                        <div class="tip">VOLTA</div>
                        <div class="img">
                            <img src="/static/202108/afecf47d97a7809d28a86c453f6e0bf4.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 圆形</h3>
                            <p>DDT41/DDT51/DDT61 4/5/6寸圆形窄边调角筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/1.html" class="item">
                        <div class="tip">RUYI WINDOWS LIGHT</div>
                        <div class="img">
                            <img src="/static/202108/fa25d9471d847afbb1fbf335fae3d953.jpg">
                        </div>
                        <div class="word">
                            <h3>RUYI</h3>
                            <p>EDW1 RUYI 窗台灯/重塑你的想象，Reinvent Your Imagination of Windows</p>
                        </div>
                    </a>
                    <a href="product-detail/258.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202204/8090da8bc00736814a4687eb9abb67ad.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO MINI</h3>
                            <p>EF3N01 小功率方形投光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/46.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202112/547396631dc1fceacaf117ece9011298.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 多头 方形 窄边</h3>
                            <p>MTN25/MTN35/MTN45 2/3/4寸</p>
                        </div>
                    </a>
                    <a href="product-detail/37.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/0dd84f415b4e5f1dc4e9876735877b13.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 单色</h3>
                            <p>DLP13/DLP23/DLP33/DLP43/DLP53 1/2/3/4/5寸嵌入式筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/38.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/2b11e84ddfcd3c23473fa68ef3b3b326.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 RGBW</h3>
                            <p>DLP33/DLP43 3/4寸嵌入式下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/228.html" class="item">
                        <div class="tip">ULTRA TUNABLE</div>
                        <div class="img">
                            <img src="uploads/images/202112/85af0f292a22ad0812b1e772b811f15a.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 圆形 无边</h3>
                            <p>DLN32/DLN42 3/4寸可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/24.html" class="item">
                        <div class="tip">SLANA</div>
                        <div class="img">
                            <img src="/static/202108/43354fa4e6819a2f8d757b1e2b37a02d.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR 线性</h3>
                            <p>ES301G 核心技术迭代更新，带来全新突破</p>
                        </div>
                    </a>
                    <a href="product-detail/220.html" class="item">
                        <div class="tip">PLANA Pro 消防应急筒灯</div>
                        <div class="img">
                            <img src="/static/202111/d54c68f8a3da91ff407ed77425b3042a.jpg">
                        </div>
                        <div class="word">
                            <h3>DLP33 消防应急筒灯</h3>
                            <p>DLP33 PLANA Pro 消防应急筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/221.html" class="item">
                        <div class="tip">PLANA Pro 消防应急筒灯</div>
                        <div class="img">
                            <img src="/static/202111/51d28bd6ed41d98b0a35e13f4f9d9415.jpg">
                        </div>
                        <div class="word">
                            <h3>DDP31 消防应急筒灯</h3>
                            <p>DDP31 PLANA Pro 消防应急筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/28.html" class="item">
                        <div class="tip">LANNE</div>
                        <div class="img">
                            <img src="/static/202111/047406ba627a4724441dbe9d711c2dad.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR 线性</h3>
                            <p>ER3 IP65超舒适嵌入式线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/141.html" class="item">
                        <div class="tip">SLANA</div>
                        <div class="img">
                            <img src="/static/202111/b8bc4680690bcd489aeec48074408f8e.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 双头</h3>
                            <p>EW1N/EW1S/EW1M Ø90/Ø125/Ø160双头壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/29.html" class="item">
                        <div class="tip">FALCON SQUARE</div>
                        <div class="img">
                            <img src="uploads/images/202110/fde04e70530931d9cc754d65c8b83a50.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 方形</h3>
                            <p>TL65S/TL66S/TL67S/高度集成，优雅简洁，拥有无限才能，却又不露锋芒</p>
                        </div>
                    </a>
                    <a href="product-detail/65.html" class="item">
                        <div class="tip">FALCON ROUND</div>
                        <div class="img">
                            <img src="uploads/images/202110/d732e9120497768edb47d0ccc673bf2f.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 圆形</h3>
                            <p>TL71S/TL72S/TL73S/高度集成，优雅简洁，拥有无限才能，却又不露锋芒</p>
                        </div>
                    </a>
                    <a href="product-detail/71.html" class="item">
                        <div class="tip">PALOMA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/8f2cabf8ae47cf9e514c9c2947ab9585.jpg">
                        </div>
                        <div class="word">
                            <h3>ON-OFF</h3>
                            <p>TL51S/TL52S/TL54S/TL55S/TL56S/PALOMA PRO轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/30.html" class="item">
                        <div class="tip">SLANA PRO</div>
                        <div class="img">
                            <img src="/static/202111/7c25425718bef47a23786564ba750120.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体化 圆形</h3>
                            <p>ES3N/ES3S/ES3M IP65下照调角一体化明装筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/127.html" class="item">
                        <div class="tip">SLANA</div>
                        <div class="img">
                            <img src="/static/202111/de0aeba243a1cf1e22c3014048accaa9.jpg">
                        </div>
                        <div class="word">
                            <h3>SQUARE 方形</h3>
                            <p>ES2S/ES2M IP65方形明装筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/36.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202109/7c4280a8f683a2adf24ef6d9a756c337.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 嵌入式</h3>
                            <p>LWAR5 嵌入式线性洗墙灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/33.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/1b40d076defbe53d63220f161159ff51.jpg">
                        </div>
                        <div class="word">
                            <h3>擦墙 嵌入式</h3>
                            <p>LGAR5 嵌入式线性擦墙灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/34.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="/static/202111/8c404399d59a390e5180ebcb30217e26.jpg">
                        </div>
                        <div class="word">
                            <h3>擦墙 明装式</h3>
                            <p>LGAS6 线性擦墙灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/35.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202109/7160e0665103ddbe29ea49aff4ad7e09.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 嵌入式</h3>
                            <p>LLAR5 嵌入式线性下照灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/39.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/0c9e216b42f49218d2f3690a11b52e07.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 圆形 单色</h3>
                            <p>DWP21/DWP31/DWP41/DWP51，2/3/4/5 寸</p>
                        </div>
                    </a>
                    <a href="product-detail/227.html" class="item">
                        <div class="tip">ULTRA TUNABLE</div>
                        <div class="img">
                            <img src="uploads/images/202112/e38e46aef8161697a6d1b9d6f38b7c92.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 圆形 窄边</h3>
                            <p>DLN31/DLN41 3/4寸可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/40.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/3e4810b9c116e8376d6be7031d35091d.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 圆形 RGBW</h3>
                            <p>DWP31/DWP41 3/4寸嵌入式洗墙筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/41.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/48e247b065e794df1eab146894b03d72.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 圆形 单色</h3>
                            <p>DDP11/DDP21/DDP31/DDP41/DDP51 经典之作, 1/2/3/4/5寸</p>
                        </div>
                    </a>
                    <a href="product-detail/42.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202109/4d6b0297018f69d2b6193674b1a5ba93.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 圆形 窄边</h3>
                            <p>DLN21/DLN31/DLN41 2/3/4寸</p>
                        </div>
                    </a>
                    <a href="product-detail/43.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202109/d32255d5542d24c68eec79237e50787c.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 圆形 无边</h3>
                            <p>DLN22/DLN32/DLN42 2/3/4寸</p>
                        </div>
                    </a>
                    <a href="product-detail/44.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202109/02d9edf3654ceb4e15b2fc9781adc6ef.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 方形 窄边</h3>
                            <p>DLN25/DLN35/DLN45 2/3/4寸</p>
                        </div>
                    </a>
                    <a href="product-detail/45.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202109/0c72817615cb4fdba8af79eb0c180f2b.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 方形 无边</h3>
                            <p>DLN26/DLN36/DLN46 2/3/4寸</p>
                        </div>
                    </a>
                    <a href="product-detail/47.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202112/80a252cd17476c19586ad19e85ad628d.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 多头 方形 无边</h3>
                            <p>MTN26/MTN36/MTN46 2/3/4寸</p>
                        </div>
                    </a>
                    <a href="product-detail/48.html" class="item">
                        <div class="tip">PLANA SMART</div>
                        <div class="img">
                            <img src="uploads/images/202110/74865c37fec6ef9f90d184a2d0949eff.jpg">
                        </div>
                        <div class="word">
                            <h3>智能遥控筒灯</h3>
                            <p>DDP81 8寸智能遥控筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/49.html" class="item">
                        <div class="tip">ELANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/d3dcb3380b1dbe3ed37743130725e0b3.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 圆形</h3>
                            <p>DLH31/DLH32 3寸圆形下照调角一体化筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/50.html" class="item">
                        <div class="tip">ELANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202203/86b8d060c05cea52c28ed6f3c5d1a413.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 方形</h3>
                            <p>DLH35/DLH36 3寸</p>
                        </div>
                    </a>
                    <a href="product-detail/254.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="uploads/images/202203/8d357069c049f5f5dd1bd2d840acc983.jpg">
                        </div>
                        <div class="word">
                            <h3>方形 弹片安装 ▢41</h3>
                            <p>EIS2N/方形埋地灯/▢41/弹片安装</p>
                        </div>
                    </a>
                    <a href="product-detail/255.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="uploads/images/202203/a653cceeec4f218886d3d79073b41c80.jpg">
                        </div>
                        <div class="word">
                            <h3>方形 预埋筒安装 ▢41</h3>
                            <p>EIS4N/方形埋地灯/▢41/预埋筒安装</p>
                        </div>
                    </a>
                    <a href="product-detail/256.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="/static/202111/20a6393fe81ba726e2adc63adf3999e3.jpg">
                        </div>
                        <div class="word">
                            <h3>方形 弹片安装 ▢70</h3>
                            <p>EIS2S/方形埋地灯/▢70/弹片安装</p>
                        </div>
                    </a>
                    <a href="product-detail/257.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="/static/202111/21450615efbec6f8c14b53e863682aba.jpg">
                        </div>
                        <div class="word">
                            <h3>方形 预埋筒安装 ▢70</h3>
                            <p>EIS4S/方形埋地灯/▢70/预埋筒安装</p>
                        </div>
                    </a>
                    <a href="product-detail/54.html" class="item">
                        <div class="tip">ELANA II</div>
                        <div class="img">
                            <img src="uploads/images/202110/451288331ad1ecd7b5a475e00d789278.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 多面框</h3>
                            <p>DLF31/DLF33/DLF35/DLF3P 3寸</p>
                        </div>
                    </a>
                    <a href="product-detail/55.html" class="item">
                        <div class="tip">ELANA II</div>
                        <div class="img">
                            <img src="uploads/images/202110/c7a61f221fe010f71d7dad63cae189d9.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 多面框</h3>
                            <p>DDF31/DDF35/DDF3E/DDF3P 3寸调角筒灯/多面框选择</p>
                        </div>
                    </a>
                    <a href="product-detail/56.html" class="item">
                        <div class="tip">ELANA II</div>
                        <div class="img">
                            <img src="uploads/images/202110/781faf5d8c1d3e4fa052462a5570a37d.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 多面框</h3>
                            <p>DWF31/DWF35 3寸洗墙筒灯/多面框选择</p>
                        </div>
                    </a>
                    <a href="product-detail/57.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202110/ec5c883181d3cd5fb0fa77198abc1bb1.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形</h3>
                            <p>SLN32 3寸明装圆形筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/58.html" class="item">
                        <div class="tip">ULTRA</div>
                        <div class="img">
                            <img src="uploads/images/202110/a29d8571f0dae8561683b12bcd6c51d4.jpg">
                        </div>
                        <div class="word">
                            <h3>方形</h3>
                            <p>SLN36 3寸明装方形筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/59.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/f1154222b14a3961fa123abf22bab851.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 2寸</h3>
                            <p>SDL22 2寸明装圆形筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/60.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/54513f8b4a43cda32d8781aecaa6a046.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 3寸</h3>
                            <p>SDL32 3寸明装圆形筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/61.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/3f36f80c86277faebf29af0ea36dbc72.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 4寸</h3>
                            <p>SDL42 4寸明装圆形筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/63.html" class="item">
                        <div class="tip">PLANA SMART</div>
                        <div class="img">
                            <img src="uploads/images/202110/cb92e0b0a59112a3a5531b801c5e8577.jpg">
                        </div>
                        <div class="word">
                            <h3>智能遥控筒灯</h3>
                            <p>SDL82 8寸明装智能遥控筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/62.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/0ab59dd9c47f9936cb58b549babbe53d.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 5寸</h3>
                            <p>SDL52 5寸明装圆形筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/64.html" class="item">
                        <div class="tip">FALCON SQUARE</div>
                        <div class="img">
                            <img src="uploads/images/202110/cec53c083dd58b520cefda0ad625e92f.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 方形</h3>
                            <p>TL65W/TL66W/TL67W/高度集成，优雅简洁，拥有无限才能，却又不露锋芒</p>
                        </div>
                    </a>
                    <a href="product-detail/67.html" class="item">
                        <div class="tip">FALCON ROUND</div>
                        <div class="img">
                            <img src="uploads/images/202110/85b4e839e8313e16475c2f01cf28996d.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 洗墙</h3>
                            <p>TL71W/TL72W/TL73W/高度集成，优雅简洁，拥有无限才能，却又不露锋芒</p>
                        </div>
                    </a>
                    <a href="product-detail/68.html" class="item">
                        <div class="tip">PALOMA</div>
                        <div class="img">
                            <img src="uploads/images/202110/ed6242a0ba882eb1d559e9f568b5141d.jpg">
                        </div>
                        <div class="word">
                            <h3>CCT TUNABLE 可调色温</h3>
                            <p>TL51F/TL53F/TL54F/PALOMA可调色温可调焦轨道摄灯</p>
                        </div>
                    </a>
                    <a href="product-detail/70.html" class="item">
                        <div class="tip">PALOMA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/6b5b042bbfa2307d4f90e3735cb83dfa.jpg">
                        </div>
                        <div class="word">
                            <h3>DIMMING 可调光</h3>
                            <p>TL51S/TL52C/TL52S/TL54S/TL55S/TL56S/PALOMA PRO可调光轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/69.html" class="item">
                        <div class="tip">PALOMA</div>
                        <div class="img">
                            <img src="uploads/images/202110/39aec40f4d329ba32a47cc6c3f084034.jpg">
                        </div>
                        <div class="word">
                            <h3>可调焦</h3>
                            <p>TL51F/TL53F/TL54F/PALOMA可调焦轨道摄灯</p>
                        </div>
                    </a>
                    <a href="product-detail/72.html" class="item">
                        <div class="tip">PALOMA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/df5175f8345903b0211c8120ea06a1aa.jpg">
                        </div>
                        <div class="word">
                            <h3>WALL WASHER 洗墙</h3>
                            <p>TL52C/TL52S/TL54S/TL55S/PALOMA PRO 洗墙轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/73.html" class="item">
                        <div class="tip">PALOMA SMART</div>
                        <div class="img">
                            <img src="uploads/images/202110/1e533f0678c813986cc48ad33acd7d12.jpg">
                        </div>
                        <div class="word">
                            <h3>定角 智能遥控</h3>
                            <p>TL58S/智能遥控轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/74.html" class="item">
                        <div class="tip">PALOMA SMART</div>
                        <div class="img">
                            <img src="uploads/images/202110/9b66c743cac4f5d74f99419a8be9a767.jpg">
                        </div>
                        <div class="word">
                            <h3>可调焦 智能遥控</h3>
                            <p>TL58F/智能遥控轨道射灯/色温光束角可调</p>
                        </div>
                    </a>
                    <a href="product-detail/75.html" class="item">
                        <div class="tip">SWALLOW PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/042fd0b2de1278d4be3cb445ef054ded.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射</h3>
                            <p>TL21H/TL22H/SWALLOW PRO三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/76.html" class="item">
                        <div class="tip">SWALLOW II</div>
                        <div class="img">
                            <img src="uploads/images/202110/744d29de010f7fa5218913f1775f8d53.jpg">
                        </div>
                        <div class="word">
                            <h3>SWALLOW II</h3>
                            <p>TL25S/TL26S/TL27S/SWALLOW II三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/77.html" class="item">
                        <div class="tip">SWALLOW WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/be7a775754dbc4ffd7b040a916b62ef9.jpg">
                        </div>
                        <div class="word">
                            <h3>WALL WASHER 洗墙</h3>
                            <p>TL21W/TL22W SWALLOW WALL WASHER三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/78.html" class="item">
                        <div class="tip">SWALLOW</div>
                        <div class="img">
                            <img src="uploads/images/202110/0c43dd07c3615561016d439d9116c0dd.jpg">
                        </div>
                        <div class="word">
                            <h3>TUNABLE 可调色温</h3>
                            <p>TL25H/TL26H/TL27H SWALLOW TUNABLE三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/79.html" class="item">
                        <div class="tip">SILO 三回路</div>
                        <div class="img">
                            <img src="uploads/images/202110/61530b212af128f2d95022821cedb302.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 定角</h3>
                            <p>TL15S/TL16S/TL17S/SILO三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/80.html" class="item">
                        <div class="tip">SILO 三回路</div>
                        <div class="img">
                            <img src="uploads/images/202110/03ae542365e86cc7a05aa3a05e05cdb2.jpg">
                        </div>
                        <div class="word">
                            <h3>FOCUS 可调焦</h3>
                            <p>TL15F/TL16F/TL17F/SILO FOCUS三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/81.html" class="item">
                        <div class="tip">SILO 三回路</div>
                        <div class="img">
                            <img src="uploads/images/202110/be9b682f225dd09b61530b708427accd.jpg">
                        </div>
                        <div class="word">
                            <h3>WALL WASHER 洗墙</h3>
                            <p>TL201/SILO WALL WASHER三回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/82.html" class="item">
                        <div class="tip">LEDme II Showcase</div>
                        <div class="img">
                            <img src="/static/202111/3325bcebda98e301b859e5f4cc062b6b.jpg">
                        </div>
                        <div class="word">
                            <h3>前后可调焦</h3>
                            <p>SLIR5F 前后可调焦展柜灯</p>
                        </div>
                    </a>
                    <a href="product-detail/85.html" class="item">
                        <div class="tip">LEDme BAR</div>
                        <div class="img">
                            <img src="uploads/images/202110/df8f87ca4055f297a4b3a8c9eb8e76ad.jpg">
                        </div>
                        <div class="word">
                            <h3>LEDme BAR</h3>
                            <p>SLP1/SLP2 /LEDme Bar展柜灯</p>
                        </div>
                    </a>
                    <a href="product-detail/83.html" class="item">
                        <div class="tip">LEDme II Showcase</div>
                        <div class="img">
                            <img src="uploads/images/202110/6711a7e251793d4175559f3e7634b6c5.jpg">
                        </div>
                        <div class="word">
                            <h3>前置可调焦</h3>
                            <p>SLIR4F 前调展柜灯</p>
                        </div>
                    </a>
                    <a href="product-detail/84.html" class="item">
                        <div class="tip">LEDme II Showcase</div>
                        <div class="img">
                            <img src="uploads/images/202110/32bd459828174575a04461c020bc1244.jpg">
                        </div>
                        <div class="word">
                            <h3>后置可调焦</h3>
                            <p>SLIR3F 后调展柜灯</p>
                        </div>
                    </a>
                    <a href="product-detail/86.html" class="item">
                        <div class="tip">LEDme WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/c5c307163b7606fafc64889d184d8ceb.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 嵌入式 前后可调</h3>
                            <p>SR52W /柜内前后可调洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/87.html" class="item">
                        <div class="tip">LEDme WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/0427a04105dea225349717ab168fd477.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 嵌入式 前置调节</h3>
                            <p>SR51W 柜内前调洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/88.html" class="item">
                        <div class="tip">LEDme SHOWCASE</div>
                        <div class="img">
                            <img src="uploads/images/202110/6a763c23e00b67be184ef63b12c5aeb7.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 表面安装</h3>
                            <p>SLS1/LEDme SHOWCASE 表面安装柜内洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/89.html" class="item">
                        <div class="tip">OCULARC FOCUS</div>
                        <div class="img">
                            <img src="uploads/images/202110/41b66241398706bbbc041d93cc11b9ae.jpg">
                        </div>
                        <div class="word">
                            <h3>可调焦 轨道式</h3>
                            <p>SL45F/SL46F/SL47F/迷你调焦轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/90.html" class="item">
                        <div class="tip">OCULARC WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/28cf185c6b386e3c0e7ba9017f7a466c.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 轨道式</h3>
                            <p>SL46W 迷你洗墙轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/91.html" class="item">
                        <div class="tip">OCULARC WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/b2248773e50f2e23b53c3480da4fcc67.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 轨道式 线性</h3>
                            <p>SL48W 迷你线性洗墙轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/92.html" class="item">
                        <div class="tip">OCULARC FOCUS</div>
                        <div class="img">
                            <img src="uploads/images/202110/fc6cdc47b18a76ec28427a40648daa91.jpg">
                        </div>
                        <div class="word">
                            <h3>可调焦 表面安装</h3>
                            <p>ME45F/ME46F/ME47F 迷你调焦表面安装射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/93.html" class="item">
                        <div class="tip">OCULARC WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/e91f34e92af39200a9a98b3e1f76de21.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 表面安装</h3>
                            <p>ME46W/SR46W 迷你洗墙表面安装射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/95.html" class="item">
                        <div class="tip">OCULARC FOCUS</div>
                        <div class="img">
                            <img src="uploads/images/202110/53b11c8621c67f4231bb69a17c50101e.jpg">
                        </div>
                        <div class="word">
                            <h3>可调焦 立杆式</h3>
                            <p>PL45F/PL46F 迷你立杆式柜内射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/94.html" class="item">
                        <div class="tip">OCULARC WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202110/9cc6c012c19871a4d86601ca16304f7b.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 表面安装 线性</h3>
                            <p>ME48W/SR48W 迷你线性洗墙表面安装射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/96.html" class="item">
                        <div class="tip">PLANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202110/cac02d5a5c6e5e21a214e6dfc47adb72.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 悬吊</h3>
                            <p>PDL22/PDL32/PDL42 悬吊式筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/97.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="/static/202111/aee5647f7f8d7917109d16d51d8fc0c5.jpg">
                        </div>
                        <div class="word">
                            <h3>上下出光 防眩面板 64W</h3>
                            <p>LLBPE/上下出光/ 64W/支持无线调控/防眩面板</p>
                        </div>
                    </a>
                    <a href="product-detail/98.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="/static/202111/2e93ef1d2b8ffeb00327778b386dbb10.jpg">
                        </div>
                        <div class="word">
                            <h3>上下出光 防眩格栅 64W</h3>
                            <p>LLBPE/上下出光/64W/支持无线调控/防眩格栅</p>
                        </div>
                    </a>
                    <a href="product-detail/99.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="/static/202111/af16ec6fb3e28deea67c68c0397906ad.jpg">
                        </div>
                        <div class="word">
                            <h3>上下出光 防眩面板 50W</h3>
                            <p>LLBPX 上下出光/50W/防眩面板</p>
                        </div>
                    </a>
                    <a href="product-detail/100.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="/static/202111/936dcfeebafad7dd0b4c07b25bd358be.jpg">
                        </div>
                        <div class="word">
                            <h3>上下出光 防眩格栅 50W</h3>
                            <p>LLBPX/上下出光/50W/防眩格栅</p>
                        </div>
                    </a>
                    <a href="product-detail/101.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/54625656daa91481eb186fb767f17036.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C1</h3>
                            <p>ELC103/ELC105/ELC110 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/102.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/5d12deee7ed4df459bb9a801f9bcbb88.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C2</h3>
                            <p>ELC203/ELC205/ELC210 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/103.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/0008d4a6bb595cd744d28c25de462b36.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C3</h3>
                            <p>ELC303/ELC305/ELC310 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/104.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/44319219706caf53d0cb225c92f5918e.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C4</h3>
                            <p>ELC403/ELC405/ELC410 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/105.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/0cd960ddf2acef6cc2df801e06637b68.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C5</h3>
                            <p>ELC503/ELC505/ELC510 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/106.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/1b33c3eba989f50b1e8141a51f6def6a.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C7 FROSTED</h3>
                            <p>ELC703/ELC705/ELC710 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/288.html" class="item">
                        <div class="tip">FALCON II</div>
                        <div class="img">
                            <img src="uploads/images/202205/7d04eba51af617433fb5f67ac7ca58d0.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 方形</h3>
                            <p>TL64H 大功率方形轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/107.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="uploads/images/202110/0932a4940a3b5873484df862677f3a48.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT C7 OPTICAL</h3>
                            <p>ELC703/ELC705/ELC710 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/108.html" class="item">
                        <div class="tip">BEACON X3</div>
                        <div class="img">
                            <img src="/static/202111/9b0f9b03e00a26ab745a2c0d8c08b3c2.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT D1</h3>
                            <p>ELD103/ELD105/ELD110 小功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/109.html" class="item">
                        <div class="tip">BEACON X5</div>
                        <div class="img">
                            <img src="/static/202111/8330455e7b2aee22d13b245fa05861f7.jpg">
                        </div>
                        <div class="word">
                            <h3>MINI FLOOD III</h3>
                            <p>ELF505/ELF510 中功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/110.html" class="item">
                        <div class="tip">BEACON X5</div>
                        <div class="img">
                            <img src="/static/202111/3abbfaf0f9d4dab431871374d45ae2db.jpg">
                        </div>
                        <div class="word">
                            <h3>MINI FLOOD II COLOR CHANGING</h3>
                            <p>ELF405/ELF410 中功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/111.html" class="item">
                        <div class="tip">BEACON X7</div>
                        <div class="img">
                            <img src="/static/202111/39f42efdb43bbe33e2e9510edd898072.jpg">
                        </div>
                        <div class="word">
                            <h3>GRAZE II</h3>
                            <p>ELS205/ELS210 大功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/112.html" class="item">
                        <div class="tip">BEACON X7</div>
                        <div class="img">
                            <img src="/static/202111/53ae4a4b5d285abdd630c2b97e10ee14.jpg">
                        </div>
                        <div class="word">
                            <h3>GRAZE LARGE</h3>
                            <p>ELS305/ELS310 大功率线性灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/116.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/a458cc9193b2ffa105c3400a31918afe.jpg">
                        </div>
                        <div class="word">
                            <h3>CANOPY</h3>
                            <p>EBA106 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/117.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/c83fee12704066ecaa73f0636874b4af.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR</h3>
                            <p>EBA206 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/118.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/502efec61bae6d0b95414b63f4b81f2b.jpg">
                        </div>
                        <div class="word">
                            <h3>QUAD</h3>
                            <p>EBA306 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/119.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/17b695b6e6495e2c0cc57b7075b4d579.jpg">
                        </div>
                        <div class="word">
                            <h3>GATE</h3>
                            <p>EBA406 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/120.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/8db36b50497d286d4416fa9b82deac2c.jpg">
                        </div>
                        <div class="word">
                            <h3>CHAMBER</h3>
                            <p>EBA508 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/121.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/8e76344d4da2528b7fc4c55db5808ade.jpg">
                        </div>
                        <div class="word">
                            <h3>TOWER</h3>
                            <p>EBA608 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/122.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/5d8de2401ed3f5bb7fb6f10ea6eb3980.jpg">
                        </div>
                        <div class="word">
                            <h3>PARK</h3>
                            <p>EBA708 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/123.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/e4729d34fdd1db4fa781c892bd1ade9b.jpg">
                        </div>
                        <div class="word">
                            <h3>SCOOP</h3>
                            <p>EBA808 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/124.html" class="item">
                        <div class="tip">BOLLARD</div>
                        <div class="img">
                            <img src="/static/202111/41214d1e63b2d657d91d4b018dc296ee.jpg">
                        </div>
                        <div class="word">
                            <h3>MUSHROOM</h3>
                            <p>EBM104/EBM106 矮柱灯</p>
                        </div>
                    </a>
                    <a href="product-detail/140.html" class="item">
                        <div class="tip">SLANA</div>
                        <div class="img">
                            <img src="/static/202111/27b196670782b0aa110fb71cdfc4e2c6.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 单头</h3>
                            <p>EW1N/EW1S/EW1M/ Ø90/Ø125/Ø160单头壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/125.html" class="item">
                        <div class="tip">LANNE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202203/3658fb03484e4e8a0bbb1cb96bd5b9af.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形</h3>
                            <p>ER22/ER23/ER24/ER25 IP65嵌入式圆形灯具</p>
                        </div>
                    </a>
                    <a href="product-detail/128.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/df64debb9fa53f1705304b5a85c613a1.jpg">
                        </div>
                        <div class="word">
                            <h3>24V SINGLE DIODE LEDs</h3>
                            <p>EP1TI/EP1NIEP1SI/EP1MI/EP1LI 24V DC/Φ50/Φ80/Φ100/Φ130/Φ160</p>
                        </div>
                    </a>
                    <a href="product-detail/129.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/84b86c9b1ccc5b42a3194bc64a1a4609.jpg">
                        </div>
                        <div class="word">
                            <h3>220V SINGLE DIODE LEDs</h3>
                            <p>EP5SI/EP5LI/220V AC/Φ290/Φ335</p>
                        </div>
                    </a>
                    <a href="product-detail/130.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/5d7cbecdfdaf16a6fa306444e90506fe.jpg">
                        </div>
                        <div class="word">
                            <h3>24V RGBW</h3>
                            <p>EP3NI/EP3MI/EP3LI/24V DC/Φ80/Φ130/Φ160</p>
                        </div>
                    </a>
                    <a href="product-detail/131.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/20448692c090bf15b592299f80c91487.jpg">
                        </div>
                        <div class="word">
                            <h3>220V RGBW</h3>
                            <p>EP7SI/EP7LI/220V AC/Φ290/Φ335</p>
                        </div>
                    </a>
                    <a href="product-detail/132.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/b67de0b7b96dcb651da6f2c0119031d7.jpg">
                        </div>
                        <div class="word">
                            <h3>220V COB</h3>
                            <p>EP4NI/EP4SI/EP4MI/EP4LI/EP6SI/EP6LI/220V AC/Φ80/Φ100/Φ130/Φ160/Φ290/Φ335</p>
                        </div>
                    </a>
                    <a href="product-detail/133.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/355864cec4fa78fd9a541d4134660a8b.jpg">
                        </div>
                        <div class="word">
                            <h3>ACCENT</h3>
                            <p>EP2NI/EP2SI/EP2MI Φ58/Φ72/Φ90多变投光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/135.html" class="item">
                        <div class="tip">PANTHER</div>
                        <div class="img">
                            <img src="/static/202111/c691694da63ae34dbbb56ab84e3c17f8.jpg">
                        </div>
                        <div class="word">
                            <h3>ADJUSTABLE WASH</h3>
                            <p>EP8MI 机械调节+光学调节+功率调节</p>
                        </div>
                    </a>
                    <a href="product-detail/136.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="/static/202111/3063e0442329cbcca8ab52322b6cdee0.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO MONO</h3>
                            <p>EF2SI/EF2LI 大功率泛光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/137.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="/static/202111/2b679dc3950674394d225cc7ae89e0a6.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO RGBW</h3>
                            <p>EF3SI/EF3LI 大功率泛光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/138.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="/static/202111/d170f46c5667c77691eaf71e4d0fb9ef.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO FLOOD</h3>
                            <p>EF1S24/EF1L48/ 56W/112W 大功率泛光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/139.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="/static/202111/68b6a60fd195263389da269533ed6fa4.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO SPOT</h3>
                            <p>EF1S12/EF1L24 超窄4°光束角/大功率投光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/142.html" class="item">
                        <div class="tip">SLANA</div>
                        <div class="img">
                            <img src="/static/202111/78cd146a8037a935b4d3097801172c39.jpg">
                        </div>
                        <div class="word">
                            <h3>SQUARE 方形 单头</h3>
                            <p>EW2S/EW2M ▢115/▢140 SLANA 方形单头壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/143.html" class="item">
                        <div class="tip">SLANA</div>
                        <div class="img">
                            <img src="/static/202111/dc92315bc412e2dab1c185cc69ccad96.jpg">
                        </div>
                        <div class="word">
                            <h3>SQUARE 方形 双头</h3>
                            <p>EW2S/EW2M ▢115/▢140 SLANA 方形双头壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/144.html" class="item">
                        <div class="tip">TOWER</div>
                        <div class="img">
                            <img src="/static/202111/af6bbd46b3cb2955555ca8ef63b17a07.jpg">
                        </div>
                        <div class="word">
                            <h3>TOWER</h3>
                            <p>EWA602 高品质LED壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/145.html" class="item">
                        <div class="tip">MUSHROOM</div>
                        <div class="img">
                            <img src="/static/202111/993fb3abd6e29784d576525ee8335358.jpg">
                        </div>
                        <div class="word">
                            <h3>MUSHROOM</h3>
                            <p>EWM102 高品质LED壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/146.html" class="item">
                        <div class="tip">MUSHROOM WALL</div>
                        <div class="img">
                            <img src="/static/202111/9c5e86d59ae4c215cdb540ae434d65f1.jpg">
                        </div>
                        <div class="word">
                            <h3>MUSHROOM WALL</h3>
                            <p>EWM202 高品质LED壁灯</p>
                        </div>
                    </a>
                    <a href="product-detail/147.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/2e0954a1a6ee232ffd20819361ae5543.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 HP Φ40</h3>
                            <p>EIR9T/Up Light/High Power LEDs/Φ40</p>
                        </div>
                    </a>
                    <a href="product-detail/148.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/57ff8de7722fee695a13b4836b71b907.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 HP Φ65</h3>
                            <p>EIR9N/Up Light/ High Power LEDs/Φ65</p>
                        </div>
                    </a>
                    <a href="product-detail/149.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/3e27fff44b4862f512b7e3ad25b18b16.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 HP Φ110</h3>
                            <p>EIR5T/EIR6T/Up Light/High Power LEDs/Φ110</p>
                        </div>
                    </a>
                    <a href="product-detail/150.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/9c0eaa8092640a3151a02820e9b924ef.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 HP Φ180</h3>
                            <p>EIR5N/EIR6N/Up Light/High Power LEDs/Φ180</p>
                        </div>
                    </a>
                    <a href="product-detail/152.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/aec4091d36fd10b7c1d626354ec573fb.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 HP Φ245</h3>
                            <p>EIR5M/EIR6M/Up Light/High Power LEDs/Φ245</p>
                        </div>
                    </a>
                    <a href="product-detail/151.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/fd031b4f0cfd5e9c5db39484ef51939f.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 HP Φ205</h3>
                            <p>EIR5S/EIR6S Up Light/High Power LEDs/Φ205</p>
                        </div>
                    </a>
                    <a href="product-detail/153.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/823a311d2554418b82a67d61a928cdfa.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 COB Φ110</h3>
                            <p>EIR7T/EIR8T/Up Light/COB/Φ110</p>
                        </div>
                    </a>
                    <a href="product-detail/154.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/4888e2deb7ea928ab8685841867c8b9a.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 COB Φ180</h3>
                            <p>EIR7N/EIR8N/Up Light/COB/Φ180</p>
                        </div>
                    </a>
                    <a href="product-detail/155.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/310bc6357d1e864ccd9ccd1e2f2e3b68.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 COB Φ205</h3>
                            <p>EIR7S/EIR8S/Up Light/COB/Φ205</p>
                        </div>
                    </a>
                    <a href="product-detail/156.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/3e7ef03a6e602ffe4dad9b95d47455cc.jpg">
                        </div>
                        <div class="word">
                            <h3>上照 COB Φ245</h3>
                            <p>EIR7M/EIR8M/Up Light/COB/Φ245</p>
                        </div>
                    </a>
                    <a href="product-detail/157.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/8d231ece6d0406b34487d48327bf3461.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 COB Φ110</h3>
                            <p>EIR7T/Wall Washer/COB/Φ110</p>
                        </div>
                    </a>
                    <a href="product-detail/158.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/b3a0ff878234f56de1be4f3f10c6aaf0.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 COB Φ180</h3>
                            <p>EIR7N/Wall Washer/COB/Φ180</p>
                        </div>
                    </a>
                    <a href="product-detail/165.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/ca35cb10aa0443fc372f64d24386a6d9.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR EIL1</h3>
                            <p>EIL1 线性埋地洗墙</p>
                        </div>
                    </a>
                    <a href="product-detail/159.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/9314f127a370dce1a3c6c17b5e0685f2.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 COB Φ205</h3>
                            <p>EIR7S/Wall Washer/COB/Φ205</p>
                        </div>
                    </a>
                    <a href="product-detail/161.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/dab12f86fd4264c06217a4a4a0207439.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 HP Φ110</h3>
                            <p>EIR5T/EIR6T/Adjustable/High Power LEDs/Φ110</p>
                        </div>
                    </a>
                    <a href="product-detail/160.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/dc61a304ad989c84760b55defb066a8d.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 COB Φ245</h3>
                            <p>EIR7M/Wall Washer/COB/Φ245</p>
                        </div>
                    </a>
                    <a href="product-detail/162.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/e2ccbeacdaf30610b77689a8b13bd1fe.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 HP Φ180</h3>
                            <p>EIR5NA/EIR6NA/Adjustable/High Power LEDs/Φ180</p>
                        </div>
                    </a>
                    <a href="product-detail/163.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/4ff4702099d5dab655c06dfd7fe9ee35.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 HP Φ205</h3>
                            <p>EIR5SA/EIR6SA/Adjustable/High Power LEDs/Φ205</p>
                        </div>
                    </a>
                    <a href="product-detail/164.html" class="item">
                        <div class="tip">FUEGO COMPACT</div>
                        <div class="img">
                            <img src="/static/202111/6c2065078e1059028f89e3c8276e4c69.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 HP Φ245</h3>
                            <p>EIR5MA/EIR6MA/Adjustable/High Power LEDs/Φ245</p>
                        </div>
                    </a>
                    <a href="product-detail/166.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/8adfa4ac3c2b39c427edad710b14883d.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR EIL2</h3>
                            <p>EIL2 面出光性洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/167.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="uploads/images/202112/968185df9393272eecb10596ee471dc9.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR EIL2</h3>
                            <p>EIL2 定角线性洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/168.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/07595173e9d35dfa7044d7909cfb150d.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR EIL3</h3>
                            <p>EIL3 线性洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/169.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/fc061d71d8ed139c57d80e379bfde533.jpg">
                        </div>
                        <div class="word">
                            <h3>LINEAR EIL4</h3>
                            <p>EIL4 线性洗墙灯</p>
                        </div>
                    </a>
                    <a href="product-detail/170.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/aceb22537fdc43a73c9d8cc225b8fcba.jpg">
                        </div>
                        <div class="word">
                            <h3>ROUND 圆形 3W</h3>
                            <p>EIR1N 圆形埋地灯 3W</p>
                        </div>
                    </a>
                    <a href="product-detail/171.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/2970d6764d56784f436f0f87733fb3f3.jpg">
                        </div>
                        <div class="word">
                            <h3>ROUND 圆形 7W</h3>
                            <p>EIR1S/圆形埋地灯 7W</p>
                        </div>
                    </a>
                    <a href="product-detail/172.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/45fb469a1ece259ea36cbf4a380002a1.jpg">
                        </div>
                        <div class="word">
                            <h3>ROUND 圆形 14W</h3>
                            <p>EIR1M 圆形埋地灯 14W</p>
                        </div>
                    </a>
                    <a href="product-detail/173.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/3e61cca2d15746a085098659a1a868c6.jpg">
                        </div>
                        <div class="word">
                            <h3>ROUND 圆形 21W</h3>
                            <p>EIR1M/圆形埋地灯 21W</p>
                        </div>
                    </a>
                    <a href="product-detail/174.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/0d482b08bec7be7dfc0f29095a919138.jpg">
                        </div>
                        <div class="word">
                            <h3>SQUARE 3W</h3>
                            <p>EIS1N/方形埋地灯</p>
                        </div>
                    </a>
                    <a href="product-detail/175.html" class="item">
                        <div class="tip">FUEGO PRO</div>
                        <div class="img">
                            <img src="/static/202111/a6b8b2a6034aed3172f84536e9713066.jpg">
                        </div>
                        <div class="word">
                            <h3>SQUARE 7W</h3>
                            <p>EIS1S 方形埋地灯</p>
                        </div>
                    </a>
                    <a href="product-detail/176.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="/static/202111/707fcb606cd088a6961dd39916f981f5.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 弹片安装 Ø41</h3>
                            <p>EIR2N/圆形埋地灯/Ø41/弹片安装</p>
                        </div>
                    </a>
                    <a href="product-detail/177.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="/static/202111/67addc5f956452a50cea739a228984d0.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 预埋筒安装 Ø41</h3>
                            <p>EIR4N/圆形埋地灯/Ø41/预埋筒安装</p>
                        </div>
                    </a>
                    <a href="product-detail/178.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="/static/202111/20a6393fe81ba726e2adc63adf3999e3.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 弹片安装 Ø70</h3>
                            <p>EIR2S/圆形埋地灯/Ø70/弹片安装</p>
                        </div>
                    </a>
                    <a href="product-detail/179.html" class="item">
                        <div class="tip">FUEGO INDICATOR</div>
                        <div class="img">
                            <img src="/static/202111/21450615efbec6f8c14b53e863682aba.jpg">
                        </div>
                        <div class="word">
                            <h3>圆形 预埋筒安装 Ø70</h3>
                            <p>EIR4S/圆形埋地灯/Ø70/预埋筒安装</p>
                        </div>
                    </a>
                    <a href="product-detail/180.html" class="item">
                        <div class="tip">FUEGO</div>
                        <div class="img">
                            <img src="/static/202111/184cbca7db3add4e2d20274af80e3d19.jpg">
                        </div>
                        <div class="word">
                            <h3>24V</h3>
                            <p>EIR3S 圆形埋地灯</p>
                        </div>
                    </a>
                    <a href="product-detail/181.html" class="item">
                        <div class="tip">FUEGO</div>
                        <div class="img">
                            <img src="/static/202111/184cbca7db3add4e2d20274af80e3d19.jpg">
                        </div>
                        <div class="word">
                            <h3>220V</h3>
                            <p>EIR3S 圆形埋地灯</p>
                        </div>
                    </a>
                    <a href="product-detail/182.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/c72cc06374239b575bb1b42164c9e385.jpg">
                        </div>
                        <div class="word">
                            <h3>VERTICAL 6MM MONO</h3>
                            <p>FLSV/VERTICAL/6MM/MONO</p>
                        </div>
                    </a>
                    <a href="product-detail/183.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/00fef77382121f94bb84e4254699beb8.jpg">
                        </div>
                        <div class="word">
                            <h3>VERTICAL 10MM MONO</h3>
                            <p>FLSV/VERTICAL/10MM/MONO</p>
                        </div>
                    </a>
                    <a href="product-detail/184.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/00fef77382121f94bb84e4254699beb8.jpg">
                        </div>
                        <div class="word">
                            <h3>VERTICAL 10MM RGBW</h3>
                            <p>FLSV/VERTICAL/10MM/RGBW</p>
                        </div>
                    </a>
                    <a href="product-detail/185.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/e8b8da265781590dc3c87fdd92490db1.jpg">
                        </div>
                        <div class="word">
                            <h3>HORIZONTAL 13MM</h3>
                            <p>FLSH/HORIZONTAL/13MM</p>
                        </div>
                    </a>
                    <a href="product-detail/186.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/57f820cdc3b2388675331d40f51a7a5e.jpg">
                        </div>
                        <div class="word">
                            <h3>HORIZONTAL 16MM</h3>
                            <p>FLSH/HORIZONTAL/16MM</p>
                        </div>
                    </a>
                    <a href="product-detail/187.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/57f820cdc3b2388675331d40f51a7a5e.jpg">
                        </div>
                        <div class="word">
                            <h3>HORIZONTAL 20MM MONO</h3>
                            <p>FLSH/HORIZONTAL/20MM/MONO</p>
                        </div>
                    </a>
                    <a href="product-detail/188.html" class="item">
                        <div class="tip">invisiLED NEON</div>
                        <div class="img">
                            <img src="/static/202111/57f820cdc3b2388675331d40f51a7a5e.jpg">
                        </div>
                        <div class="word">
                            <h3>HORIZONTAL 20MM RGBW</h3>
                            <p>FLSH/HORIZONTAL/20MM/RGBW</p>
                        </div>
                    </a>
                    <a href="product-detail/189.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/cb0b2d9a2170071819a324ce3596be46.jpg">
                        </div>
                        <div class="word">
                            <h3>12V 户外防水灯带</h3>
                            <p>FLSU/12V 户外防水灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/190.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/94aaef6e4096fa6ee1c642c214e891d4.jpg">
                        </div>
                        <div class="word">
                            <h3>DMX 户外防水灯带</h3>
                            <p>FLSG/DMX 户外防水灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/191.html" class="item">
                        <div class="tip">InvisiLED E</div>
                        <div class="img">
                            <img src="/static/202111/ff26b38fa042d37c617573b4cd9f0c6b.jpg">
                        </div>
                        <div class="word">
                            <h3>IP65 户外防水灯带</h3>
                            <p>FLSE/IP65 户外防水灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/193.html" class="item">
                        <div class="tip">LANNE II</div>
                        <div class="img">
                            <img src="/static/202111/64483315fdc8287a899e7878857c68b7.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 4寸 6LEDs</h3>
                            <p>ER1SF/嵌入式筒灯/4寸/FIXED</p>
                        </div>
                    </a>
                    <a href="product-detail/194.html" class="item">
                        <div class="tip">LANNE II</div>
                        <div class="img">
                            <img src="/static/202111/e9fd6480ca674c2e8d77851569fe3a49.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 4寸 9LEDs</h3>
                            <p>ER1SF/嵌入式筒灯/4寸/9LEDs/FIXED</p>
                        </div>
                    </a>
                    <a href="product-detail/195.html" class="item">
                        <div class="tip">LANNE II</div>
                        <div class="img">
                            <img src="/static/202111/e9f52993cde63dfca91682b49f668075.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 4寸</h3>
                            <p>ER1SA/嵌入式筒灯/4寸/ADJUSTABLE</p>
                        </div>
                    </a>
                    <a href="product-detail/196.html" class="item">
                        <div class="tip">LANNE II</div>
                        <div class="img">
                            <img src="/static/202111/5a9c123d0fa2129d11640f8d9147b310.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 6寸</h3>
                            <p>ER1MF/嵌入式筒灯/6寸/FIXED</p>
                        </div>
                    </a>
                    <a href="product-detail/197.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/e4d16ddc46d6bfc482b3994ded890303.jpg">
                        </div>
                        <div class="word">
                            <h3>WL100</h3>
                            <p>WL100/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/247.html" class="item">
                        <div class="tip">3-CIRCUIT TRACK SYSTEM</div>
                        <div class="img">
                            <img src="uploads/images/202203/6fc587bd6fe403f9588fa1883be08fb9.jpg">
                        </div>
                        <div class="word">
                            <h3>三回路轨道系统</h3>
                            <p>W系列/表面安装</p>
                        </div>
                    </a>
                    <a href="product-detail/198.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/0cdda68b3c2d37b9a90e2cebca085f16.jpg">
                        </div>
                        <div class="word">
                            <h3>WL110</h3>
                            <p>WL110/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/199.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/a8e9efc71c823434afe85cc49feedb33.jpg">
                        </div>
                        <div class="word">
                            <h3>WL120</h3>
                            <p>WL120/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/200.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/dd1cb7405d7311558d100d0d38dfa773.jpg">
                        </div>
                        <div class="word">
                            <h3>WL130</h3>
                            <p>WL130/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/201.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/4e4a8ca211485a46bf8f56a2b88c188d.jpg">
                        </div>
                        <div class="word">
                            <h3>WL200</h3>
                            <p>WL200/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/202.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/a33dcd0f589f8aac62216eb8d4e4f513.jpg">
                        </div>
                        <div class="word">
                            <h3>WL210</h3>
                            <p>WL210/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/203.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/99116700eaa5d22e8b27fc6f71d2966a.jpg">
                        </div>
                        <div class="word">
                            <h3>WL220</h3>
                            <p>WL220 户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/204.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/a54a1820286e5d6f620970412cb4ba46.jpg">
                        </div>
                        <div class="word">
                            <h3>WL300</h3>
                            <p>WL300/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/205.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/7ff79d13c083a024009f84f51850684e.jpg">
                        </div>
                        <div class="word">
                            <h3>WL310</h3>
                            <p>WL310/户外踢脚灯</p>
                        </div>
                    </a>
                    <a href="product-detail/206.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/297e164873150cb8c79fa5812bc9b816.jpg">
                        </div>
                        <div class="word">
                            <h3>WL5205</h3>
                            <p>WL5205/户外踢脚灯/Louver</p>
                        </div>
                    </a>
                    <a href="product-detail/207.html" class="item">
                        <div class="tip">LEDme STEP AND WALL</div>
                        <div class="img">
                            <img src="/static/202111/8657a81c38e7f48139f01fc7567b28c0.jpg">
                        </div>
                        <div class="word">
                            <h3>WL5105</h3>
                            <p>WL5105/户外踢脚灯/Opal</p>
                        </div>
                    </a>
                    <a href="product-detail/208.html" class="item">
                        <div class="tip">GLITTER</div>
                        <div class="img">
                            <img src="/static/202111/60ceb4d8c0b3f434b5301a6e18602d9b.jpg">
                        </div>
                        <div class="word">
                            <h3>GLITTER</h3>
                            <p>ED3/点光源</p>
                        </div>
                    </a>
                    <a href="product-detail/209.html" class="item">
                        <div class="tip">AQUASTAR</div>
                        <div class="img">
                            <img src="/static/202111/eb96c8f6d10ff9823bdaaef9b908ee77.jpg">
                        </div>
                        <div class="word">
                            <h3>12V 水下灯</h3>
                            <p>EU1S/水下灯/12V 输入</p>
                        </div>
                    </a>
                    <a href="product-detail/210.html" class="item">
                        <div class="tip">LED PIXELS</div>
                        <div class="img">
                            <img src="/static/202111/0886bb87374ae104f8c5033b5e146857.jpg">
                        </div>
                        <div class="word">
                            <h3>单颗剪裁</h3>
                            <p>LED-P/像素灯/单颗剪裁</p>
                        </div>
                    </a>
                    <a href="product-detail/211.html" class="item">
                        <div class="tip">LED PIXELS</div>
                        <div class="img">
                            <img src="/static/202111/8830e9b5d61c7263199d30ee56b18832.jpg">
                        </div>
                        <div class="word">
                            <h3>每组剪裁 单色</h3>
                            <p>LED-P/像素灯/每组剪裁/单色</p>
                        </div>
                    </a>
                    <a href="product-detail/212.html" class="item">
                        <div class="tip">LED PIXELS</div>
                        <div class="img">
                            <img src="/static/202111/640f368d064cac36470e5ac06502de6b.jpg">
                        </div>
                        <div class="word">
                            <h3>每组剪裁 可调色温</h3>
                            <p>LED-P/像素灯/每组剪裁/可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/213.html" class="item">
                        <div class="tip">LED PIXELS</div>
                        <div class="img">
                            <img src="/static/202111/0c29fa43f73d0e49f01a17c590cbd43e.jpg">
                        </div>
                        <div class="word">
                            <h3>每组剪裁 RGB</h3>
                            <p>LED-P/像素灯/每组剪裁/RGB</p>
                        </div>
                    </a>
                    <a href="product-detail/214.html" class="item">
                        <div class="tip">LED PIXELS</div>
                        <div class="img">
                            <img src="/static/202111/606ceaf0803578559b2c1a0469483c8a.jpg">
                        </div>
                        <div class="word">
                            <h3>每组剪裁 RGBW</h3>
                            <p>LED-P/像素灯/每组剪裁/RGBW</p>
                        </div>
                    </a>
                    <a href="product-detail/215.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/af968efb9ed2790ad513f72fc332b9b4.jpg">
                        </div>
                        <div class="word">
                            <h3>S系列</h3>
                            <p>LED-TCE/InvisiLED S灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/216.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/92c4d841dfadd2b8795fd09b75004b17.jpg">
                        </div>
                        <div class="word">
                            <h3>G系列</h3>
                            <p>LED-TCE/InvisiLED G灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/217.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/92c4d841dfadd2b8795fd09b75004b17.jpg">
                        </div>
                        <div class="word">
                            <h3>RGB系列</h3>
                            <p>LED-TCE/InvisiLED RGB灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/218.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/28ca7bde1709a5efbfab1a870336f44b.jpg">
                        </div>
                        <div class="word">
                            <h3>RGBW系列</h3>
                            <p>LED-TCE/InvisiLED RGBW灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/219.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="/static/202111/28ca7bde1709a5efbfab1a870336f44b.jpg">
                        </div>
                        <div class="word">
                            <h3>可调色温系列</h3>
                            <p>LED-TCE/InvisiLED SUNLIGHT 可调色温灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/237.html" class="item">
                        <div class="tip">ULTRA TUNABLE 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/915a4486315aab6d404df9fa9ddc921c.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 方形 窄边</h3>
                            <p>DLN37 方形有边防雾极矮下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/222.html" class="item">
                        <div class="tip">VIVISTAR</div>
                        <div class="img">
                            <img src="/static/202111/91215a7afe975397fbbbfc1dc1cc7dd5.png">
                        </div>
                        <div class="word">
                            <h3>光纤系统</h3>
                            <p>FO-I01LED 光纤照明系统</p>
                        </div>
                    </a>
                    <a href="product-detail/223.html" class="item">
                        <div class="tip">ULTRA 消防应急筒灯</div>
                        <div class="img">
                            <img src="/static/202111/8cf188d1b07109cf72cefd19a927d03b.jpg">
                        </div>
                        <div class="word">
                            <h3>DLN31 消防应急筒灯</h3>
                            <p>DLN31 Ultra 消防应急筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/224.html" class="item">
                        <div class="tip">ULTRA 消防应急筒灯</div>
                        <div class="img">
                            <img src="/static/202111/6d6165875507885d63f422fcb6af100f.png">
                        </div>
                        <div class="word">
                            <h3>DLN35 消防应急筒灯</h3>
                            <p>DLN35 ULTRA 消防应急筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/225.html" class="item">
                        <div class="tip">LEDme Pro 消防应急筒灯</div>
                        <div class="img">
                            <img src="/static/202111/1a139e7539ff843af64c1300c7e0a045.png">
                        </div>
                        <div class="word">
                            <h3>DLK33 消防应急筒灯</h3>
                            <p>DLK33 LEDme Pro 消防应急筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/226.html" class="item">
                        <div class="tip">LEDme Pro 消防应急筒灯</div>
                        <div class="img">
                            <img src="/static/202111/8b17c4034b551c7a5c5ee1e4867f7ba4.png">
                        </div>
                        <div class="word">
                            <h3>DDK33 消防应急筒灯</h3>
                            <p>DDK33 Ledme Pro 消防应急筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/234.html" class="item">
                        <div class="tip">ULTRA TUNABLE 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/0c3df4942cc2644c7c1b519a854f3fa2.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 窄边</h3>
                            <p>DLN33 圆形有边防雾极矮下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/236.html" class="item">
                        <div class="tip">ULTRA TUNABLE 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/c95305275e8254c2ba77773fdae1564f.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 无边</h3>
                            <p>DLN34 圆形无边防雾极矮下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/235.html" class="item">
                        <div class="tip">ULTRA 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/3eac761e64f8d431b142a360f39cc9c7.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 无边</h3>
                            <p>DLN34 圆形无边防雾极矮下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/229.html" class="item">
                        <div class="tip">ULTRA TUNABLE</div>
                        <div class="img">
                            <img src="uploads/images/202112/147f33f6d3529bbaaf58c46c60b51bd2.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 方形 窄边</h3>
                            <p>DLN35/DLN45 3/4寸可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/230.html" class="item">
                        <div class="tip">ULTRA TUNABLE</div>
                        <div class="img">
                            <img src="uploads/images/202112/40ea756af739fe7eef729ab2c8395296.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 方形 无边</h3>
                            <p>DLN36/DLN46 3/4寸可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/231.html" class="item">
                        <div class="tip">ULTRA TUNABLE</div>
                        <div class="img">
                            <img src="uploads/images/202112/26c671a12c1d1dd6034d1d98508b9f39.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 多头 方形 窄边</h3>
                            <p>MTN35/MTN45 3/4寸可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/232.html" class="item">
                        <div class="tip">ULTRA TUNABLE</div>
                        <div class="img">
                            <img src="uploads/images/202112/2b7f95de7d0b9e1173601087c59eae7a.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 多头 方形 无边</h3>
                            <p>MTN36/MTN46 3/4寸可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/233.html" class="item">
                        <div class="tip">ULTRA 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/3727cb61f298e26c0a88bfb1262e07b7.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 窄边</h3>
                            <p>DLN33 圆形防雾极矮下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/238.html" class="item">
                        <div class="tip">ULTRA TUNABLE 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/98c6178d5ee6e7b96f434da95d8c38e8.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 方形 窄边</h3>
                            <p>DLN37 方形有边防雾极矮下照筒灯 可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/239.html" class="item">
                        <div class="tip">ULTRA 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202112/8d8d23b8facff8be73809266395c711a.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 方形 无边</h3>
                            <p>DLN38 方形无边防雾极矮下照筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/240.html" class="item">
                        <div class="tip">ULTRA TUNABLE 防雾极矮</div>
                        <div class="img">
                            <img src="uploads/images/202203/78e53a68f39e38a3ee61cf25fda4b3c9.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 方形 无边</h3>
                            <p>DLN38 方形无边防雾极矮下照筒灯 可调色温</p>
                        </div>
                    </a>
                    <a href="product-detail/241.html" class="item">
                        <div class="tip">ELANA</div>
                        <div class="img">
                            <img src="uploads/images/202112/8544e0c26c594c6b971cb2a0ca289edf.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 圆形 窄边</h3>
                            <p>DLG21/DLG31 2/3寸</p>
                        </div>
                    </a>
                    <a href="product-detail/242.html" class="item">
                        <div class="tip">ELANA</div>
                        <div class="img">
                            <img src="uploads/images/202112/b9bc01658fc63356c4be43ef02245e98.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 圆形 窄边</h3>
                            <p>DDG21/DDG31 2/3寸圆形调角筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/245.html" class="item">
                        <div class="tip">ELANA</div>
                        <div class="img">
                            <img src="uploads/images/202203/6023156a1bea9bbee2c0f9a9ba5e5de2.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 方形 窄边</h3>
                            <p>DDG25/DDG35 2/3寸方形窄边调角筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/246.html" class="item">
                        <div class="tip">GOBO PRO</div>
                        <div class="img">
                            <img src="uploads/images/202203/6161298ba1edeff5c54eb79fb14b7129.jpg">
                        </div>
                        <div class="word">
                            <h3>投影灯</h3>
                            <p>TL57F LED投影灯</p>
                        </div>
                    </a>
                    <a href="product-detail/248.html" class="item">
                        <div class="tip">3-CIRCUIT TRACK SYSTEM</div>
                        <div class="img">
                            <img src="uploads/images/202203/21765d405319c3ec39f0e4212042f0dc.jpg">
                        </div>
                        <div class="word">
                            <h3>三回路轨道系统</h3>
                            <p>W系列/嵌入式安装</p>
                        </div>
                    </a>
                    <a href="product-detail/249.html" class="item">
                        <div class="tip">J-CIRCUIT TRACK SYSTEM</div>
                        <div class="img">
                            <img src="uploads/images/202203/cbaae64d8e8129c92453d77c601e1f44.jpg">
                        </div>
                        <div class="word">
                            <h3>单回路轨道系统</h3>
                            <p>J系列/表面安装</p>
                        </div>
                    </a>
                    <a href="product-detail/250.html" class="item">
                        <div class="tip">SILO 单回路</div>
                        <div class="img">
                            <img src="uploads/images/202203/aaa9210e7edf9677a7241659f1bc6541.jpg">
                        </div>
                        <div class="word">
                            <h3>FOCUS 可调焦</h3>
                            <p>JL15F/JL16F/JL17F 单回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/251.html" class="item">
                        <div class="tip">SILO 单回路</div>
                        <div class="img">
                            <img src="uploads/images/202203/8278de7ffac24ccd741c5b55ff28168f.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 定角</h3>
                            <p>JL15S/JL16S/JL17S 单回路轨道射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/252.html" class="item">
                        <div class="tip">ELANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202203/44e4849f7b0142fe1a5615de3fe32c59.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 多头 方形 窄边</h3>
                            <p>MTH35 3寸方形窄边多头射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/253.html" class="item">
                        <div class="tip">ELANA PRO</div>
                        <div class="img">
                            <img src="uploads/images/202203/af0e17087770bb5eb7c2d137a27f419e.jpg">
                        </div>
                        <div class="word">
                            <h3>下照调角一体 多头 方形 无边</h3>
                            <p>MTH36 3寸方形无边多头射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/259.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202204/94e9c8b61084062665914296d3acd83a.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO SMALL</h3>
                            <p>EF3S03/EF3S04 小功率方形投光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/260.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202204/8cab17d605178ae1e62bba4a18e4c64f.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO MEDIUM</h3>
                            <p>EF3M04/EF3M09 小功率方形投光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/261.html" class="item">
                        <div class="tip">SHINE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202204/4c841887c2574a82a2329eafd30e3063.jpg">
                        </div>
                        <div class="word">
                            <h3>SHINE PRO LARGE</h3>
                            <p>EF3L09/EF3L16 小功率方形投光灯</p>
                        </div>
                    </a>
                    <a href="product-detail/262.html" class="item">
                        <div class="tip">VOLTA</div>
                        <div class="img">
                            <img src="uploads/images/202204/c1ef4b45ee5b8a9f994ab274bb7d974d.jpg">
                        </div>
                        <div class="word">
                            <h3>下照 方形</h3>
                            <p>DLT45/DLT55/DLT65 4/5/6寸</p>
                        </div>
                    </a>
                    <a href="product-detail/263.html" class="item">
                        <div class="tip">VOLTA</div>
                        <div class="img">
                            <img src="uploads/images/202204/a8f61ed15bba4f880f6bbbe36497404b.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 方形</h3>
                            <p>DDT45/DDT55/DDT65 4/5/6寸方形窄边调角筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/264.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/b796af7129e1266bd9f911d7e666965c.jpg">
                        </div>
                        <div class="word">
                            <h3>上下出光 悬吊式 40</h3>
                            <p>OP4012D 上下出光吊线灯</p>
                        </div>
                    </a>
                    <a href="product-detail/265.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/e561f7a75a95cd66d5d28b03eaba5e06.jpg">
                        </div>
                        <div class="word">
                            <h3>下出光 悬吊式 40</h3>
                            <p>OP4012S 下出光吊线灯</p>
                        </div>
                    </a>
                    <a href="product-detail/266.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/fafb99828e9dee8ee034e26f91c84fe0.jpg">
                        </div>
                        <div class="word">
                            <h3>上下出光 悬吊式 55</h3>
                            <p>OP5512D 上下出光吊线灯</p>
                        </div>
                    </a>
                    <a href="product-detail/267.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/0e8d1ca14154a8d9ef404d948f90adbe.jpg">
                        </div>
                        <div class="word">
                            <h3>下出光 悬吊式 55</h3>
                            <p>OP5512S 下出光吊线灯</p>
                        </div>
                    </a>
                    <a href="product-detail/268.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/a028f4780546ca7b67859fc75ef7014a.jpg">
                        </div>
                        <div class="word">
                            <h3>下出光 明装式 40</h3>
                            <p>OC4012 明装式线性灯</p>
                        </div>
                    </a>
                    <a href="product-detail/269.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/7a9d492378f36d39b1473d9a2e8cf8f4.jpg">
                        </div>
                        <div class="word">
                            <h3>下出光 明装式 55</h3>
                            <p>OC5512 明装式线性灯</p>
                        </div>
                    </a>
                    <a href="product-detail/270.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/7a7d1e6c546bcb5fd86bc6eb0e2370bb.jpg">
                        </div>
                        <div class="word">
                            <h3>下出光 嵌入式 40</h3>
                            <p>OR4012 嵌入式线性灯</p>
                        </div>
                    </a>
                    <a href="product-detail/271.html" class="item">
                        <div class="tip">LIGNE II</div>
                        <div class="img">
                            <img src="uploads/images/202204/4f2626e6e735735e8c5e91d54eec94d5.jpg">
                        </div>
                        <div class="word">
                            <h3>下出光 嵌入式 55</h3>
                            <p>OR5512 嵌入式线性灯</p>
                        </div>
                    </a>
                    <a href="product-detail/272.html" class="item">
                        <div class="tip">LANNE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202205/efd029e1ae75a3ac5402dbf426d12f67.jpg">
                        </div>
                        <div class="word">
                            <h3>调角 圆形</h3>
                            <p>ER44A/ER45A/ER46A 调角嵌入式筒灯</p>
                        </div>
                    </a>
                    <a href="product-detail/293.html" class="item">
                        <div class="tip">STRUT</div>
                        <div class="img">
                            <img src="uploads/images/202205/98d348d9df3606f15613ce6ea9c9c7af.jpg">
                        </div>
                        <div class="word">
                            <h3>REMOTE CPU</h3>
                            <p>OS2CPU-R</p>
                        </div>
                    </a>
                    <a href="product-detail/273.html" class="item">
                        <div class="tip">LIGNE PRO</div>
                        <div class="img">
                            <img src="uploads/images/202205/9ff997f330f0c46400671aaf591ce275.jpg">
                        </div>
                        <div class="word">
                            <h3>LED 面板</h3>
                            <p>LP301</p>
                        </div>
                    </a>
                    <a href="product-detail/274.html" class="item">
                        <div class="tip">STRUT 轨道灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/2c381d408ae62ef9c0ef535856804a7e.jpg">
                        </div>
                        <div class="word">
                            <h3>FOLLOWME SILO</h3>
                            <p>OS2FM</p>
                        </div>
                    </a>
                    <a href="product-detail/275.html" class="item">
                        <div class="tip">STRUT 轨道灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/9931f7093dadbd459b80d365b8100048.jpg">
                        </div>
                        <div class="word">
                            <h3>SILO</h3>
                            <p>OS2SA</p>
                        </div>
                    </a>
                    <a href="product-detail/276.html" class="item">
                        <div class="tip">STRUT 轨道灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/1939de806f9c27f6335e3da98e5040a2.jpg">
                        </div>
                        <div class="word">
                            <h3>STEALTH SILO</h3>
                            <p>OS2SS</p>
                        </div>
                    </a>
                    <a href="product-detail/277.html" class="item">
                        <div class="tip">STRUT 线性灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/f1f27fed4690141fa69333947f691acd.jpg">
                        </div>
                        <div class="word">
                            <h3>DIRECT 下照</h3>
                            <p>OS2DH/OS2DR</p>
                        </div>
                    </a>
                    <a href="product-detail/278.html" class="item">
                        <div class="tip">STRUT 线性灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/bcc1a35bb9258758798d2bd5ee151371.jpg">
                        </div>
                        <div class="word">
                            <h3>INDIRECT 上照</h3>
                            <p>OS2ID</p>
                        </div>
                    </a>
                    <a href="product-detail/279.html" class="item">
                        <div class="tip">STRUT 线性灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/89c0b924462f48ee303f585a40f393b2.jpg">
                        </div>
                        <div class="word">
                            <h3>MULTI STEANTH 下照</h3>
                            <p>OS2MD</p>
                        </div>
                    </a>
                    <a href="product-detail/280.html" class="item">
                        <div class="tip">STRUT 线性灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/bb989c07d91168f2d5b068a9605a09ec.jpg">
                        </div>
                        <div class="word">
                            <h3>STEANTH 下照</h3>
                            <p>OS2SD</p>
                        </div>
                    </a>
                    <a href="product-detail/281.html" class="item">
                        <div class="tip">STRUT 线性灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/0684b5424f06f377507949b299141eda.jpg">
                        </div>
                        <div class="word">
                            <h3>STEANTH WALL WASH 洗墙</h3>
                            <p>OS2WW</p>
                        </div>
                    </a>
                    <a href="product-detail/282.html" class="item">
                        <div class="tip">STRUT 装饰灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/605ee85230bcdb3e0d081002954e245c.jpg">
                        </div>
                        <div class="word">
                            <h3>SILO PENDANTS</h3>
                            <p>OS2PD01</p>
                        </div>
                    </a>
                    <a href="product-detail/283.html" class="item">
                        <div class="tip">STRUT 装饰灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/e2c19c2ac9e4a681f0b8531633ee2378.jpg">
                        </div>
                        <div class="word">
                            <h3>NIVEOUS PENDANTS</h3>
                            <p>OS2PD02</p>
                        </div>
                    </a>
                    <a href="product-detail/284.html" class="item">
                        <div class="tip">STRUT 装饰灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/173d52f760ff0468e8a6b25b52a29fef.jpg">
                        </div>
                        <div class="word">
                            <h3>ELEMENTUM PENDANTS</h3>
                            <p>OS2PD03</p>
                        </div>
                    </a>
                    <a href="product-detail/285.html" class="item">
                        <div class="tip">STRUT 装饰灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/cd5ff1264776dfe28688f079d2c103f4.jpg">
                        </div>
                        <div class="word">
                            <h3>FLARE PENDANTS</h3>
                            <p>OS2PD04</p>
                        </div>
                    </a>
                    <a href="product-detail/286.html" class="item">
                        <div class="tip">STRUT 装饰灯具</div>
                        <div class="img">
                            <img src="uploads/images/202205/83451d7f4802bd93f12852a3f73dc781.jpg">
                        </div>
                        <div class="word">
                            <h3>VOLO PENDANTS</h3>
                            <p>OS2PD05</p>
                        </div>
                    </a>
                    <a href="product-detail/287.html" class="item">
                        <div class="tip">InvisiLED TAPE</div>
                        <div class="img">
                            <img src="uploads/images/202205/93251f0c747bfddd1c46e89494606caf.jpg">
                        </div>
                        <div class="word">
                            <h3>W系列</h3>
                            <p>LED-TCE/InvisiLED W灯带</p>
                        </div>
                    </a>
                    <a href="product-detail/289.html" class="item">
                        <div class="tip">FALCON WALL WASHER</div>
                        <div class="img">
                            <img src="uploads/images/202205/4a1ed1e2f4b10674e4840a69b110c3c8.jpg">
                        </div>
                        <div class="word">
                            <h3>洗墙 方形</h3>
                            <p>TL64W</p>
                        </div>
                    </a>
                    <a href="product-detail/290.html" class="item">
                        <div class="tip">HLSE</div>
                        <div class="img">
                            <img src="uploads/images/202205/af66e1803743cc633614d1d2015b6476.jpg">
                        </div>
                        <div class="word">
                            <h3>A 系列</h3>
                            <p>HLSE</p>
                        </div>
                    </a>
                    <a href="product-detail/291.html" class="item">
                        <div class="tip">SILO 吸顶式</div>
                        <div class="img">
                            <img src="uploads/images/202205/c1cf60deb5a222a224098b3ea899bc33.jpg">
                        </div>
                        <div class="word">
                            <h3>重点投射 定角</h3>
                            <p>ME15S/ME16S/ME17S SILO吸顶式射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/292.html" class="item">
                        <div class="tip">SILO 吸顶式</div>
                        <div class="img">
                            <img src="uploads/images/202205/5314f13d26c7bb66f2fa93cafd308839.jpg">
                        </div>
                        <div class="word">
                            <h3>FOCUS 可调焦</h3>
                            <p>ME15F/ME16F/ME17F SILO 吸顶式射灯</p>
                        </div>
                    </a>
                    <a href="product-detail/294.html" class="item">
                        <div class="tip">STRUT</div>
                        <div class="img">
                            <img src="uploads/images/202205/31b16b0e20a7c2e5011f51f3fae687f4.jpg">
                        </div>
                        <div class="word">
                            <h3>SURFACE MOUNT CPU</h3>
                            <p>OS2CPU-S</p>
                        </div>
                    </a>
                    <a href="product-detail/295.html" class="item">
                        <div class="tip">STRUT低压轨道</div>
                        <div class="img">
                            <img src="uploads/images/202205/ce4b4cf120caa734d1522d7037b0960d.jpg">
                        </div>
                        <div class="word">
                            <h3>嵌入式窄边</h3>
                            <p>OS2CT</p>
                        </div>
                    </a>
                    <a href="product-detail/296.html" class="item">
                        <div class="tip">STRUT低压轨道</div>
                        <div class="img">
                            <img src="uploads/images/202205/a4a9cbabc95951422513f10779c3539d.jpg">
                        </div>
                        <div class="word">
                            <h3>嵌入式无边</h3>
                            <p>OS2CL</p>
                        </div>
                    </a>
                    <a href="product-detail/297.html" class="item">
                        <div class="tip">STRUT低压轨道</div>
                        <div class="img">
                            <img src="uploads/images/202205/c58fc1d0f8e05c1edb08ffd0e1ada242.jpg">
                        </div>
                        <div class="word">
                            <h3>明装式</h3>
                            <p>OS2CPS</p>
                        </div>
                    </a>
                    <a href="product-detail/298.html" class="item">
                        <div class="tip">STRUT低压轨道</div>
                        <div class="img">
                            <img src="uploads/images/202205/89c17e3d84c0dd329505e3a06e2ededf.jpg">
                        </div>
                        <div class="word">
                            <h3>悬吊式</h3>
                            <p>OS2CPS</p>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </dd>
            </dl>
        </div>
    </div>

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

@endsection