<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 * 1.账号名可不用name，但密码必须要用password字段
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements JWTSubject
{
    protected $fillable = ['name', 'password'];
    protected $hidden = ['password', 'remember_token'];

    /**
     *  新增方法
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     *  新增方法
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
