<?php

namespace App\Repositories;

use App\Entities\ProductCate;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductRepository;
use App\Entities\Product;
use App\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'=>'like',
        'cate_id'
    ];

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getHots()
    {
        return Product::with([])->orderBy("if_hot","desc")->orderBy("id","desc")->limit(4)->get();;
    }

    /**
     * 产品搜索
     * @param $name
     * @param $page
     * @return Product[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function searchByName($name, $page)
    {
        return Product::with([])->whereRaw("name like '%{$name}%'")->forPage($page)->get();
    }

    /**
     * 根据ids查询产品列表
     * @param $ids string 逗号分隔的产品ID数据 如：1,2,3
     * @return Product[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findByIds($ids)
    {
        return Product::with([])->whereIn("id",explode(",",$ids))->get();
    }

    /**
     * 获取所有产品及分类
     * @return array
     */
    public function listFontItems(){
        $datas = [];
        $products = $this->all();
        $cateRep = app(ProductCateRepositoryEloquent::class);
        $cates = $cateRep->allFontCates();
        foreach ($products as $product){
            $item = [
                'id'=>"{$product->id}",
                'title'=>$product->name,
                'index_img'=>$product->index_img,
                'url'=>url("product_detail",["id"=>$product->id])
            ];
            $cateArr = $this->getCateArrByCateId($product->cate_id,$cates);
            $datas[] = array_merge($item,$cateArr);
        }
        return $datas;
    }

    public function getCateArrByCateId($cate_id,$cates){
        foreach ($cates as $cateTop){
            foreach ($cateTop['list'] as $cateSecond){
                if ($cateSecond['id']==$cate_id){
                    return [
                        $cateTop['field'] => $cateTop['typecode'],
                        $cateSecond['field'] => $cateSecond['typecode']
                    ];
                }
                if (isset($cateSecond['list']) && count($cateSecond['list'])>0) {
                    foreach ($cateSecond['list'] as $cateThird) {
                        if ($cateThird['id'] == $cate_id) {
                            return [
                                $cateTop['field'] => $cateTop['typecode'],
                                $cateSecond['field'] => $cateSecond['typecode'],
                                $cateThird['field'] => $cateThird['typecode']
                            ];
                        }
                    }
                }
            }
        }
        return [];
    }

}
