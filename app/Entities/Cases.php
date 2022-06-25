<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Case.
 *
 * @package namespace App\Entities;
 */
class Cases extends Model implements Transformable
{
    use TransformableTrait;
    //public  $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','cate_id','index_img','imgs','location','info','product_ids','video_img','video_url','created_at','updated_at','sort','if_index'];

    //案例---分类
    public function cate()
    {
        return $this->belongsTo(CasesCate::class,'cate_id','id')->select(['id','name']);
    }

}
