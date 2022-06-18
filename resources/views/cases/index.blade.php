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
            <img src="/static/202108/ef40ebff2697f85f7408442a5c7df363.jpg" class="pc">
            <img src="/static/202108/0bf43c06d18344a1a551f1edae61e979.jpg" class="m">
        </div>
        <div class="word1">
            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">案例中心</h3>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                以责任，耀文明，WAC华格以博物馆级别的照明，点亮非凡空间！</p>
        </div>
    </div>
    <!-- 内页banner End -->

    <!-- 工程案例 -->
    <div class="case p110 w83" id="app">
        <div class="col-top clearfix" style=" height: auto;">
            <div class="left">
                <h3><b>1000+</b> 精选案例</h3>
                <p>过往经典案例<br>开启您的灵感之旅</p>
            </div>
            <div class="right">
                <h3>分类筛选</h3>
                <div class="tab">
                    <a href="1.html" class="active">博物馆&amp;美术馆&amp;科技馆</a>
                    <a href="2.html">酒店&amp;别墅</a>
                    <a href="3.html">会展空间</a>
                    <a href="4.html">商业&amp;高空间</a>
                    <a href="5.html">户外照明</a>
                </div>
                <div class="form">
                    <input type="text" placeholder="按案例名称搜索，如上海天文馆.." v-model="keyword"/>
                    <button @click="search">搜索</button>
                </div>
            </div>
        </div>

        <div class="col-bottom clearfix" style="height: auto;">
            <a href="/cases-detail/1" class="item" data-sr-id="6" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img">
                    <img src="/static/202108/79bcba04db7b6ea4178215685d8b4206.jpg"></div> <div class="word"><h3>上海天文馆</h3> <p>星辰大海，宇宙级浪漫的上海天文馆定义科普新高度</p>
                    <div class="adr">
                        中国，上海
                    </div></div></a>
            <a href="/cases-detail/3" class="item" data-sr-id="7" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/d327985ad5f1de15b35a677d2078a7b6.jpg"></div> <div class="word"><h3>景德镇御窑博物馆</h3> <p>艺术之光，灵感之“燃”</p> <div class="adr">
                        江西，景德镇
                    </div></div></a><a href="/cases-detail/7" class="item" data-sr-id="8" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/541390f5bf2ee3be2a60492595cf898b.jpg"></div> <div class="word"><h3>深圳当代艺术与城市规划馆</h3> <p>从这里走进城市的历史与未来，中国建筑工程鲁班奖</p> <div class="adr">
                        广东，深圳
                    </div></div></a><a href="/cases-detail/10" class="item" data-sr-id="9" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/e15b3183fc6087871afab89c51583d19.jpg"></div> <div class="word"><h3>浙江自然博物院安吉馆</h3> <p>亚洲单体建筑最大的自然博物馆</p> <div class="adr">
                        浙江，安吉
                    </div></div></a><a href="/cases-detail/9" class="item" data-sr-id="10" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/6ff51af9f624c32d93bc3e917e0912ea.jpg"></div> <div class="word"><h3>中国国家博物馆</h3> <p>历史与艺术并重，中国最高历史文化艺术殿堂</p> <div class="adr">
                        中国，北京
                    </div></div></a><a href="/cases-detail/8" class="item" data-sr-id="11" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/0d81c75a7a0dcfe588ce959937fac57e.jpg"></div> <div class="word"><h3>故宫博物院慈宁宫</h3> <p>文化建筑的用光之道</p> <div class="adr">
                        中国，北京
                    </div></div></a><a href="/cases-detail/11" class="item" data-sr-id="12" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/f13e42743d4bed16f9739126110ac39c.jpg"></div> <div class="word"><h3>良渚博物院</h3> <p>国际博物馆的新潮流</p> <div class="adr">
                        浙江，杭州
                    </div></div></a><a href="/cases-detail/12" class="item" data-sr-id="13" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/c512aca78f91967c9e8dfc3eec0f1d25.jpg"></div> <div class="word"><h3>尼山圣境大学堂</h3> <p>第47届IES照明奖卓越大奖</p> <div class="adr">
                        山东曲阜
                    </div></div></a><a href="/cases-detail/82" class="item" data-sr-id="14" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/67cc61e93a4a6a1bd28fe4c4ece3b84d.jpg"></div> <div class="word"><h3>宁海童衍方艺术馆</h3> <p>占地690平方米的童衍方艺术馆新馆完工。新馆由南至北，分别为前楼、中院、后堂，室内有近二层高的展览陈列厅，还有艺术鉴赏、学术交流和艺术培训等配套服务设施。</p> <div class="adr">
                        浙江，宁波
                    </div></div></a><a href="/cases-detail/75" class="item" data-sr-id="15" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/e2843975fbe00a7bd05a43a17e9e2e14.jpg"></div> <div class="word"><h3>海澜美术馆</h3> <p>海澜集团是无锡首家营收超千亿元的服装龙头企业，俨然已经是无锡的一张城市名片。在做大做强的同时，也不忘发展文化事业。传统产业与高雅艺术如何融合，海澜集团用行动证明了一切。</p> <div class="adr">
                        江苏，江阴
                    </div></div></a><a href="/cases-detail/14" class="item" data-sr-id="16" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/04c26213b9e5f2d633dfdbe49e04b07b.jpg"></div> <div class="word"><h3>徐州博物馆</h3> <p>秦唐看西安，明清看北京，两汉看徐州</p> <div class="adr">
                        江苏，徐州
                    </div></div></a><a href="/cases-detail/31" class="item" data-sr-id="17" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/dab959bbab754e693505dd826db8bd07.jpg"></div> <div class="word"><h3>中国人民革命军事博物馆</h3> <p>一场追寻历史的传承</p> <div class="adr">
                        中国，北京
                    </div></div></a><a href="/cases-detail/65" class="item" data-sr-id="18" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/2761df60e37e17bf541075d8e8c5d97a.jpg"></div> <div class="word"><h3>中国人民抗日战争纪念馆</h3> <p>中国人民抗日战争纪念馆位于中华民族全面抗战爆发的卢沟桥事变发生地——北京市丰台区宛平城内。</p> <div class="adr">
                        中国，北京
                    </div></div></a><a href="/cases-detail/66" class="item" data-sr-id="19" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/98c44b6de2919937561437f45f2989b0.jpg"></div> <div class="word"><h3>国家典籍博物馆</h3> <p>国家典籍博物馆是依托国家图书馆，并以展示中国典籍、弘扬中华文化为主旨的国家级博物馆。该馆于2014 年9月经历了长达三年的改造修缮后重新正式对外开馆，并面向个人读者开放。全新面众的国家典籍博物馆展陈 建筑面积达11,549m2，拥有9个展厅。</p> <div class="adr">
                        中国，北京
                    </div></div></a><a href="/cases-detail/26" class="item" data-sr-id="20" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/e08d03b3398638de6915c9cd0d809ff4.jpg"></div> <div class="word"><h3>南京博物院</h3> <p>南京厚重的文化底蕴和丰富的历史遗存便造就了今日“一院六馆”的南京博物院</p> <div class="adr">
                        江苏，南京
                    </div></div></a><a href="/cases-detail/29" class="item" data-sr-id="21" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/05ff429d7b3617788d043278df3e3173.jpg"></div> <div class="word"><h3>南京太平天国历史博物馆</h3> <p>南京太平天国历史博物馆位于南京市秦淮区瞻园路，地处夫子庙秦淮风光带核心地带，是中国收藏保管、陈列宣传、调查研究太平天国文物史料的专题性博物馆，也是中国国家设立的唯一太平天国史专题博物馆</p> <div class="adr">
                        江苏，南京
                    </div></div></a><a href="/cases-detail/16" class="item" data-sr-id="22" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/9a867f50a5e07d1cf21b56ea473a2fd9.jpg"></div> <div class="word"><h3>浙江乌镇北栅粮仓展厅</h3> <p>第36届国际照明设计奖（IALD International Lighting Design Awards）优秀奖</p> <div class="adr">
                        浙江，乌镇
                    </div></div></a><a href="/cases-detail/15" class="item" data-sr-id="23" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/41d29599db80ba8bf1f1d57875af50dd.jpg"></div> <div class="word"><h3>海澜美术馆</h3> <p>笔墨长江 时代华章</p> <div class="adr">
                        江苏，江阴
                    </div></div></a><a href="/cases-detail/37" class="item" data-sr-id="24" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/f46e5c5850b14afc91ece0dd0b6a2a84.jpg"></div> <div class="word"><h3>龙美术馆</h3> <p>龙美术馆是目前国内最具规模和收藏实力的私立美术馆之一</p> <div class="adr">

                    </div></div></a><a href="/cases-detail/68" class="item" data-sr-id="25" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/5d206efe1c60ac1976022cc136becd42.jpg"></div> <div class="word"><h3>南京牛首山佛顶宫</h3> <p>牛首山为佛教名山，从南朝到唐有寺庙30多座。南朝梁代佛教盛行，“南朝四百八十寺”，集中之地便为牛首山，“与西北之清凉、西南之峨嵋并为圣道场地”，为唐代最负盛名三大道场之一。</p> <div class="adr">
                        江苏，南京
                    </div></div></a><a href="/cases-detail/67" class="item" data-sr-id="26" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/72368aca6fa490fe47a7c7f03dd16339.jpg"></div> <div class="word"><h3>南京大屠杀死难同胞纪念馆</h3> <p>南京大屠杀死难同胞纪念馆依次从一期建设扩展至三期，都以庄重的灰色调为主，以示对逝者的悼念和尊重。展馆内，从史料、文物、建筑、雕塑、影视等多种手法，全面展示“南京大屠杀”特大惨案的专史，无论是农家屋、慰安所，密密地刻着300000多个遇难者的名字“哭墙”，摆放各种沉重资料的书架，还有每隔12秒一滴水落下所意味的一个人死去的“12秒”。</p> <div class="adr">
                        江苏，南京
                    </div></div></a><a href="/cases-detail/70" class="item" data-sr-id="27" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/6a9ee521bd01fbc27c6a1ccdb2f36333.jpg"></div> <div class="word"><h3>乌镇国际当代艺术邀请展</h3> <p>“乌镇国际当代艺术邀请展”是一个持久性项目，它是继“乌镇国际戏剧节”持续举办和木心美术馆开馆之后，乌镇开始探索借助视觉艺术的力量来触摸当代思维中最为活跃的部分，为希望通过引入文艺活动以保持江南古镇鲜活状态的理想平台。</p> <div class="adr">
                        浙江，乌镇
                    </div></div></a><a href="/cases-detail/69" class="item" data-sr-id="28" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/23d85803fba13e0505752efc4dc8c0b1.jpg"></div> <div class="word"><h3>嘉善博物馆</h3> <p>嘉善，历史悠远，物产丰饶，素以鱼米之乡、丝绸之府、文化之邦名扬天下。为了保护、传承与展示嘉善历史文化，嘉善县政府历时三年打造的博物馆新馆，已于2019年6月28日正式开馆，对公众开放参观, 作为这一佳作的参与者，WAC受邀出席此次新馆的开幕典礼。</p> <div class="adr">
                        浙江，嘉善
                    </div></div></a><a href="/cases-detail/71" class="item" data-sr-id="29" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/772d878d8e3e633865690944b5ded888.jpg"></div> <div class="word"><h3>大明宫遗址</h3> <p>大明宫，大唐帝国的大朝正殿，唐朝的政治中心和国家象征，位于唐京师长安（今西安）北侧的龙首原。始建于唐太宗贞观八年（634年），原名永安宫，是唐长安城三座主要宫殿“三大内”（大明宫、太极宫、兴庆宫）中规模最大的一座，称为“东内”。自唐高宗起，先后有17位唐朝皇帝在此处理朝政，历时达200余年。</p> <div class="adr">
                        陕西，西安
                    </div></div></a><a href="/cases-detail/72" class="item" data-sr-id="30" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/0c6f41f79f3460a90b6110b3aebb6423.jpg"></div> <div class="word"><h3>九华山大愿文化园</h3> <p>九华山大愿文化园位于世界公认的地藏菩萨道场的九华山风景区，是一个以地藏文化为核心、集现代科技 与传统佛教精粹为一体的主题文化公园。该园由地藏菩萨露天铜像主体和大愿广场两个部分组成。</p> <div class="adr">
                        安徽，池州
                    </div></div></a><a href="/cases-detail/73" class="item" data-sr-id="31" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/static/202108/3c78022a596f694492c7d9eb11e4fd4a.jpg"></div> <div class="word"><h3>洛阳博物馆·洛阳珍宝展</h3> <p>洛阳自古帝王州。从中国第一个王朝——夏王朝开始，先后有商、西周、东周、东汉、曹魏、西晋、北魏、隋、唐、后梁、后唐、后晋十三个王朝建都洛阳，累计建都时间长达1500余年，洛阳以建都最早、建都朝代最多、建都时间最长而在中国历史发展和城市建设史上占有十分重要的地位。</p> <div class="adr">
                        河南，洛阳
                    </div></div></a><a href="/cases-detail/74" class="item" data-sr-id="32" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/ad4fe5f8163bf5f0fdd0f3825cfd0559.jpg"></div> <div class="word"><h3>艺博美术馆（M50创意园）</h3> <p>M50创意园位于,上海市普陀区莫干山路。M50创意园的原身为上海春明粗纺厂，于2000年起开始转型为艺术创意园区。</p> <div class="adr">
                        中国，上海
                    </div></div></a><a href="/cases-detail/84" class="item" data-sr-id="33" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.2s, transform 1s ease-out 0.2s;"><div class="img"><img src="/uploads/images/202204/39ecb99066761d110671d5a52f2c0ece.jpg"></div> <div class="word"><h3>木心美术馆</h3> <p>山水木心</p> <div class="adr">
                        浙江，嘉兴
                    </div></div></a><a href="/cases-detail/56" class="item" data-sr-id="34" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s ease-out 0.1s, transform 1s ease-out 0.1s;"><div class="img"><img src="/static/202108/cc4255c92cba5552dee217cdae1c8947.jpg"></div> <div class="word"><h3>蓬莱古船博物馆</h3> <p>蓬莱古船博物馆是我国第一座原址展示古船、古港的专题性博物馆</p> <div class="adr">
                        山东，烟台
                    </div></div></a></div>
    </div>
    <!-- 工程案例End -->
    <div style="height:100px;clear: both;"></div>
    <div class="clearfix"></div>
@endsection


@section('footer_js')
    <script src="{{ asset('static/js/jquery.transit.js') }}"></script>
    <script src="{{ asset('static/js/swiper.min.js') }}"></script>
    <script src="{{ asset('static/js/swiper.animate.min.js') }}"></script>
    <script src="{{ asset('static/js/wow.min.js') }}"></script>
    <script src="{{ asset('static/js/scrollBar.js') }}"></script>
    <script src="{{ asset('static/js/main.js') }}"></script>
@endsection

@section('content_js')
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