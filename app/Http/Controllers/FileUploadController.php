<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class FileUploadController extends Controller
{

    /**
     * 单文件上传
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function singleFile(Request $request)
    {
        if ($request->hasFile('file')) {
            //在源生的php代码中是使用$_FILE来查看上传文件的属性
            //但是在laravel里面有更好的封装好的方法，就是下面这个
            //显示的属性更多
            $fileCharater = $request->file('file');

            if ($fileCharater->isValid()) { //括号里面的是必须加的哦
                //如果括号里面的不加上的话，下面的方法也无法调用的

                //获取文件的扩展名
                $ext = $fileCharater->getClientOriginalExtension();

                //获取文件的绝对路径
                $path = $fileCharater->getRealPath();
                //Log::info("获取到的文件绝对路径为：{$path}");
                //定义文件名
                $filename = time() . rand(100000, 999999) . '.' . $ext;
                //Log::info("获取到的新文件名为：{$filename}");
                //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
                Storage::disk('public')->put($filename, file_get_contents($path));
                //添加水印
                $fileTypes = array('jpg','png','gif');//设置文件类型数组
                $fileType = $fileCharater->getClientOriginalExtension();//获取文件类型
                //echo "文件类型为".$fileType;
                if (in_array($fileType,$fileTypes)) {
                    $img = Image::make(public_path("uploads/" . date('Ymd') . "/" . $filename));
                    $img->insert(public_path('static/images/watermark.png'), 'bottom-right', 10, 10);
                    $img->save(public_path("uploads/" . date('Ymd') . "/" . $filename));
                }
                return response()->json([
                    'path' => '/public/uploads/'.date('Ymd')."/".$filename,
                    'url' => Storage::disk('public')->url($filename)
                ]);
            }
        }
        return response()->json([]);
    }

    public function mutiFile(Request $request)
    {

        return null;
    }

    //测试类
    public function test() {

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

    }


}
