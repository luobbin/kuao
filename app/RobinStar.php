<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RobinStar extends Model
{
    public function addTest(){
        $model = new RobinStar();
        $model->name = "星星1";
        $model->robin_id= 121;
        $model->is_effect = 1;
        $model->description = '我就看看，不说哈1';
        return $model->save() ? 'OK' : 'fail';
    }
}
