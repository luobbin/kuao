<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class WebSetting.
 *
 * @package namespace App\Entities;
 */
class WebSetting extends Model implements Transformable
{
    use TransformableTrait;
    public  $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','location','name_attr','name','type','content'];


    public static function valByNameAttr($key)
    {
        return parent::getModel()->where('name_attr',strtolower($key))->value("content");
    }

}
