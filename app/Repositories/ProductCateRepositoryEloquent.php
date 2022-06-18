<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductCateRepository;
use App\Entities\ProductCate;
use App\Validators\ProductCateValidator;

/**
 * Class ProductCateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductCateRepositoryEloquent extends BaseRepository implements ProductCateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductCate::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    //返回给后端的分类
    public function allCates()
    {
        $datas = [];
        $topCates  = ProductCate::with([])->where("pid",0)->orderByDesc("sort")->get();
        foreach ($topCates as $topCate){
            $topCate->info = "顶级分类";
            $topCate->pid_name = "--";
            $topCate->sub_name = $topCate->name;
            $datas[] = $topCate;
            $secondCates =  ProductCate::with([])->where("pid",$topCate->id)->orderByDesc("sort")->get();
            if (count($secondCates) > 0) {
                foreach ($secondCates as $secondCate) {
                    $secondCate->info = "二级分类";
                    $secondCate->pid_name = $topCate->name;
                    $secondCate->sub_name = "└─".$secondCate->name;
                    $datas[] = $secondCate;
                    $thirdCates =  ProductCate::with([])->where("pid",$secondCate->id)->orderByDesc("sort")->get();
                    if (count($thirdCates) > 0){
                        foreach ($thirdCates as $thirdCate) {
                            $thirdCate->info = "三级分类";
                            $thirdCate->pid_name = $secondCate->name;
                            $thirdCate->sub_name = "└───".$thirdCate->name;
                            $datas[] = $thirdCate;
                        }
                    }
                }
            }
        }
        return $datas;
    }

    //返回给前端的分类
    public function allFontCates()
    {
        $datas = [];
        $topCates  = ProductCate::with([])->where("pid",0)->orderByDesc("sort")->get();
        foreach ($topCates as $l=>$topCate){
            $item = [
                'typecode'=>sprintf("%04d",$topCate->id),
                'field'=>'pf110',
                'typepid'=>'',
                'id'=>$topCate->id,
                'typename'=>$topCate->name,
                'iconpath'=>''
            ];
            $secondCates =  ProductCate::with([])->where("pid",$topCate->id)->orderByDesc("sort")->get();
            if (count($secondCates) > 0) {
                foreach ($secondCates as $i=>$secondCate) {
                    $item['list'][$i]=[
                        'typecode'=>sprintf("%04d",$secondCate->id),
                        'field'=>'pf141',
                        'typepid'=>$topCate->id,
                        'id'=>$secondCate->id,
                        'typename'=>$secondCate->name,
                        'iconpath'=>''
                    ];
                    $thirdCates =  ProductCate::with([])->where("pid",$secondCate->id)->orderByDesc("sort")->get();
                    if (count($thirdCates) > 0){
                        foreach ($thirdCates as $thirdCate) {
                            $item['list'][$i]['list'][]=[
                                'typecode'=>sprintf("%04d",$thirdCate->id),
                                'field'=>'pf173',
                                'typepid'=>$secondCate->id,
                                'id'=>$thirdCate->id,
                                'typename'=>$thirdCate->name,
                                'iconpath'=>''
                            ];
                        }
                    }
                }
            }
            $datas[] = $item;
        }
        return $datas;
    }

}
