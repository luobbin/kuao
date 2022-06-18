<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Article.
 *
 * @package namespace App\Entities;
 */
class Article extends Model implements Transformable
{
    use TransformableTrait;

    //public  $timestamps = false;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['id','title','info','index_img','cate_id','content','created_at','updated_at','sort','if_index'];

    //新闻---分类
    public function cate()
    {
        return $this->belongsTo(ArticleCate::class,'cate_id','id')->select(['id','name']);
    }

}
