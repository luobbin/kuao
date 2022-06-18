<?php

namespace App\Http\Controllers;

use App\RobinStar;
use Illuminate\Http\Request;

class RobinStarController extends Controller
{

    public function index(){
        echo "我先执行，中间件后执行";
        //$mo = new RobinStar();
        //$mo->addTest();
        //dd($mo->find(1));
        return view('robinstar.index',['title'=>'robin首页模块']); // 将使用views/robin_star/index[.blade].php
    }

    public function show($id){
        //dd($id);
        return view('robinstar.show',['title'=>'robinStar详情模块']); // 将使用views/robin_star/show[.blade].php
    }

    public function add(Request $request){
        $model = new RobinStar;
        $model->name = $request->name;
        $model->robin_id= $request->robin_id;
        $model->is_effect = 1;
        $model->description = $request->desc;

        $res = $model->save() ? 'OK' : 'fail';
        dd($res);

    }
}
