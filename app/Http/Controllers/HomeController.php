<?php

namespace App\Http\Controllers;

use App\Repositories\CasesCateRepositoryEloquent;
use App\Repositories\HomeSettingRepositoryEloquent;
use App\Repositories\WebSettingRepositoryEloquent;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class HomeController extends Controller
{

    protected $commonData;
    protected $resp;
    protected $resWeb;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebSettingRepositoryEloquent $webSettingRepositoryEloquent,HomeSettingRepositoryEloquent $homeSettingRepo)
    {
        $this->commonData = $webSettingRepositoryEloquent->getCommonData();
        $this->resp = $homeSettingRepo;
        $this->resWeb = $webSettingRepositoryEloquent;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(CasesCateRepositoryEloquent $cateRep)
    {
        $block = $this->resp->find(7);
        //顶部视频
        $banner = json_decode($block->application,true);
        return view('index',[
            'common'=>$this->commonData,
            'homeNames' => $this->resp->getAllName(),
            'banner'    => $banner,
            'cates' => $cateRep->all(),
            'pageTitle'=> $this->commonData['web_name']."-"."首页"
            ]);
    }

    /**
     * 前端获取首页板块
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBlock($id)
    {
        $block = $this->resp->find($id);
        $res = [];
        switch ($id){
            case 1://轮播图
                $res = $block->application;
                break;
            case 2://案例
                $conf = json_decode($block->application,true);
                $res = json_encode($this->resp->getHomeCases($conf));
                /*$res = json_encode([
                    ['name'=>'洛阳保利林语溪','location'=>"河南洛阳",'index_img'=>'/static/home/2022042718504034159665.jpg',
                        'cate_name'=>"公寓",'url' => url("product_detail",["id"=>1])],
                    ['name'=>'尚品半岛','location'=>"浙江温州",'index_img'=>'/static/home/2022020809562697282073.jpg',
                        'cate_name'=>"公寓",'url' => url("product_detail",["id"=>2])],
                    ['name'=>'白麓城·大悦墅','location'=>"河南洛阳",'index_img'=>'/static/home/2022030713064482793660.jpg',
                        'cate_name'=>"别墅",'url' => url("product_detail",["id"=>3])],
                    ['name'=>'莫斯科私人公寓','location'=>"莫斯科",'index_img'=>'/static/home/2021110311164318974057.jpg',
                        'cate_name'=>"公寓",'url' => url("product_detail",["id"=>4])],
                    ['name'=>'Grey Lynn 别墅','location'=>"新西兰 Grey Lynn",'index_img'=>'/static/home/2021072614115558930113.png',
                        'cate_name'=>"别墅",'url' => url("product_detail",["id"=>5])],
                    ['name'=>'AMAIA公寓样板间','location'=>"新西兰",'index_img'=>'/static/home/2021072614063761205015.jpg',
                        'cate_name'=>"别墅",'url' => url("product_detail",["id"=>6])],
                ]);*/
                break;
            case 3://视频
                $res = $block->application;
                break;
            case 4://新闻
                $conf = json_decode($block->application,true);
                $res = json_encode($this->resp->getHomeArticles($conf));
                /*$res = json_encode([
                    ['id'=>1,'title'=>'长沙半岛蓝湾项目——婚房照明案例赏析','info'=>"",'img'=>'/static/home/2022051313302654584347.jpg',
                        'default_img'=>$this->commonData['default_img'],'url' => '','d'=>'20', 'ym'=>'2022-05'],
                    ['id'=>2,'title'=>'后疫情时代，提升家居生活品质从FLUA灯光开始','info'=>"",'img'=>'/static/home/2022042010034208999445.jpg',
                        'default_img'=>$this->commonData['default_img'],'url' => '','d'=>'26', 'ym'=>'2022-04'],
                    ['id'=>3,'title'=>'温州尚品半岛住宅项目','info'=>"",'img'=>'/static/home/2022020715370826645524.jpg',
                        'default_img'=>$this->commonData['default_img'],'url' => '','d'=>'18', 'ym'=>'2022-04'],
                    ['id'=>4,'title'=>'俄罗斯MARRO 办公室项目','info'=>"",'img'=>'/static/home/2021051311234746290801.jpg',
                        'default_img'=>$this->commonData['default_img'],'url' => '','d'=>'25', 'ym'=>'2022-03']
                ]);*/
                break;
            case 5://logo墙
                $res = $block->application;
                break;
            default:
                break;
        }

        return response()->json($res);
    }

    /**
     * 后台获取首页板块
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $block = $this->resp->find($id);
        $res = $block;
        switch ($id){
            case 1://轮播图
                $res->application = json_decode($block->application,true);
                break;
            case 2://案例
                $res->application = json_decode($block->application,true);
                break;
            case 3://视频
                $res->application = json_decode($block->application,true);
                break;
            case 4://新闻
                $res->application = json_decode($block->application,true);
                break;
            case 5://logo墙
                $res->application = json_decode($block->application,true);
                break;
            default:
                break;
        }

        return response()->json($res);
    }

    /**
     * 更新首页板块
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $data['application'] = json_encode($request->application);
            $res = $this->resp->update($data, $id);

            $response = [
                'message' => 'updated.',
                'data'    => $res->toArray(),
            ];

            return success($response);
        } catch (ValidatorException $e) {
            return error(204,$e->getMessageBag());
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }
}
