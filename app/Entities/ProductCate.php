<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductCate.
 *
 * @package namespace App\Entities;
 */
class ProductCate extends Model implements Transformable
{
    use TransformableTrait;
    public  $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'img', 'pid', 'sort'];

}
