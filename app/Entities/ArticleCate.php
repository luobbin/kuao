<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ArticleCate.
 *
 * @package namespace App\Entities;
 */
class ArticleCate extends Model implements Transformable
{
    use TransformableTrait;
    public  $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'pid', 'sort'];

}
