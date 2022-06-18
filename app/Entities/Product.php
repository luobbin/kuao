<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name','description','info','cate_id','index_img','imgs','features','videos','scenes',
        'specification','documents','created_at','updated_at','sort','if_hot'];

    //商品---分类
    public function cate()
    {
        return $this->belongsTo(ProductCate::class,'cate_id','id')->select(['id','name']);
    }

}
