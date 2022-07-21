<?php

namespace App\Repositories;

use App\Entities\Article;
use App\Entities\Cases;
use App\Entities\CasesCate;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HomeSettingRepository;
use App\Entities\HomeSetting;
use App\Validators\HomeSettingValidator;

/**
 * Class HomeSettingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HomeSettingRepositoryEloquent extends BaseRepository implements HomeSettingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HomeSetting::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 获取首页栏目名称和展示状态
     * @return array
     */
    public function getAllName()
    {
        $data = HomeSetting::with([])->get(['id','name','if_show']);
        $resData = [];
        foreach ($data as $k=>$v){
            $resData[$v->id]=$v->name;
        }
        return $resData;
    }

    /**
     * 根据配置获取首页案例栏目列表
     * "{\"way\":2,\"show_count\":6}"
     * @param $conf
     * @return array
     */
    public function getHomeCases($conf)
    {
        $conf = is_array($conf)?$conf:json_decode($conf,true);
        $res = [];
        switch (intval($conf['way'])) {
            case 1://发布时间
                $cases = Cases::with(['cate'])->orderBy("id","desc")->limit($conf['show_count'])->get();
                break;
            case 2://首页推荐
                $cases = Cases::with(['cate'])->orderBy("if_index","desc")->orderBy("id","desc")->limit($conf['show_count'])->get();
                break;
            case 3://排序
                $cases = Cases::with(['cate'])->orderBy("sort","desc")->limit($conf['show_count'])->get();
                break;
            default:
               return $res;
        }
        foreach ($cases as $v){
            $item = [
                'id'=>$v->id,
                'name'=>$v->name,
                'location'=>$v->location,
                'index_img'=>$v->index_img,
                'cate_name'=>$v->cate()->value("name"),
                'url' => url("case_detail",["id"=>$v->id])
            ];
            $res[] = $item;
        }
        return  $res;
    }

    /**
     * 根据配置获取首页新闻栏目列表
     * "{\"way\":2,\"show_count\":6}"
     * @param $conf
     * @return array
     */
    public function getHomeArticles($conf)
    {
        $conf = is_array($conf)?$conf:json_decode($conf,true);
        $res = [];
        switch (intval($conf['way'])) {
            case 1://发布时间
                $cases = Article::with(['cate'])->orderBy("id","desc")->limit($conf['show_count'])->get();
                break;
            case 2://首页推荐
                $cases = Article::with(['cate'])->orderBy("if_index","desc")->orderBy("id","desc")->limit($conf['show_count'])->get();
                break;
            case 3://排序
                $cases = Article::with(['cate'])->orderBy("sort","desc")->limit($conf['show_count'])->get();
                break;
            default:
                return $res;
        }
        foreach ($cases as $v){
            $item = [
                'id'=>$v->id,
                'title'=>$v->title,
                'info'=>$v->info,
                'index_img'=>$v->index_img,
                'cate_name'=>$v->cate()->value("name"),
                'd'=>date("d",strtotime($v->created_at)),
                'm'=>date("Y-m",strtotime($v->created_at)),
                'date'=>date("Y.m.d",strtotime($v->created_at)),
                'url' => url("article_detail",["id"=>$v->id])
            ];
            $res[] = $item;
        }
        return  $res;
    }

}
