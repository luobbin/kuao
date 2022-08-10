<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Job.
 *
 * @package namespace App\Entities;
 */
class Job extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','title','city','salary','demand','cate_name','content','created_at','updated_at','link_addr','jingyan','if_jp'];


}
