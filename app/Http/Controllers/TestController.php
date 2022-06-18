<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mgdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use RedisCluster;


class TestController extends Controller
{
    //测试类
    /*public function index(){
        //Mgdb::test();

        dd("文件手动是否");
        echo "asasfdasd";
    }*/
    public function index() {

        /*
         * Redis使用
         */
        #默认redis测试
        Redis::set('bbb',107);
        //dd(Redis::get('bbb'));

        #只读例子测试成功
        //Redis::connection('read')->set('test','robin_test_1');
        //dd(Redis::connection('read')->get('test'));

        #写测试
        //$rds = Redis::connection('default');
        //$rds->set('test','robin_test');
        //$test = $rds->get('test');
        //dd($test);

        #测试调取环境变量
        //dd(env('REDIS_CLUSTER_HOST'));

        #集群测试-->未成功，只能在线上环境用
        //$rds_cls = new RedisCluster(null,['120.77.255.171:7001']);
        //$rds_cls->set('test','my_test');
        //dd($rds_cls->get('test'));


        /*
         * DB使用
         */
//        $res = DB::table('robin')->select('mobile', 'name')->get();
//        dd($res);
//        $robins = DB::table("robin")->select()->first();
//        dd($robins);

        /*
         * mongoDB使用
         */
        $users = Mgdb::test();//Mgdb::connectionMongodb('users');

        //dd($users->insert(['name' => 'email', 'mobile' => 1391393965458]));
        //dd($users->get());
        //dd($tb->where('table_main', 'mx_taobao')->get());

        #添加一条数据 ture 添加成功
        //dd($users->insert(['title' => 'email', 'article' => 'john@example.com','time' => time()]));
        #添加多条数据 ture 添加成功
        /*dd($users->insert([
        ['title' => 'email', 'article' => 'john@example.com','time' => time()],
        ['title' => 'title1', 'article' => 'lichuang@example.com','time' => time()],
        ['title' => 'title2', 'article' => 'lili@example.com','time' => time()]
        ]));*/
        #修改一条数据 0 修改成功
           //dd($users->where('title', 'new2')->update(['article' => 'lichuang']));
        #删除一条数据 1 为删除成功
        //dd($users->where('title', 'new1')->delete());
        #删除集合所有数据 返回几删除几条
        //dd($users->delete());
        #查询集合所有数据
        //dd($users->get());
        #按条件查询
        //dd($users->where('title', 'title1')->get());
        #模糊查询 dd($users->where('title', 'like', 'ti%')->get());
        #按条件排序
        //dd($users->orderBy('time', 'desc')->get());
    }


}
