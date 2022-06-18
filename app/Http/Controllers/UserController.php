<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Qiniu\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        //$this->middleware('jwt.token', ['except' => ['register', 'login']]);
    }

    /**
     * 用户注册/添加账号
     */
    public function register(Request $request)
    {
        // jwt token
        $credentials = [
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ];
        $user = User::create($credentials);
        if($user){
            $token =JWTAuth::fromUser($user);
            // JWTFactory::setTTL(80);// 设置TOKEN缓存时间
            return $this->responseWithToken($token);
        }
    }

    /**
     * 用户登录
     */
    public function login(Request $request)
    {
        // todo 用户登录逻辑
/*
        header('Content-Type: application/json;charset=UTF-8');
        header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
        header('Access-Control-Allow-Methods:GET, POST, PATCH, PUT, OPTIONS'); // 允许请求的类型
        header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
        header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段*/


        // jwt token
        $credentials = $request->only('name', 'password');
        // $credentials['status'] = 1; // 需要在验证登录的时候，需要验证其他参数，可这样加
        if (!$token = JWTAuth::attempt($credentials)) {
            return error(201,"用户登录失败");
        }

        // JWTFactory::setTTL(80);// 设置TOKEN缓存时间
        return $this->responseWithToken($token);
    }

    /**
     * 刷新token
     */
    public function refresh()
    {
        return $this->responseWithToken(JWTAuth::refresh());
    }

    /**
     * 退出登录
     */
    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken()); // 即把当前token加入黑名单
        //auth()->logout();
        return success("退出成功");
    }

    /**
     * 获取用户信息
     */
    public function userInfo(Request $request)
    {
        $user = [];
        try {
            $token = JWTAuth::getToken();
            if($token){
                JWTAuth::setToken($token);
                $user = JWTAuth::toUser();
            }
        } catch (\Exception $exception) {
            return error(201,"token已过期，请重新登录");
        }

        return response()->json($user);
    }

    /**
     * 响应
     */
    private function responseWithToken(string $token)
    {
        $response = [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'lastlogin_at' => date("Y-m-d H:i:s"),
            'user'  =>  \Auth::user(),
            'navs'  => [],
            'expires_in' => JWTFactory::getTTL() * 60
        ];

        return response()->json($response);
    }

    //获取千牛云token
    public function getQiniuToken(Request $request){
        $file_ext = $request->input('file_ext','');
        Log::debug(__METHOD__.' file_ext:'.$file_ext);
        $auth = new Auth(env('QINIU_ACCESSKEY'),env('QINIU_SECRETKEY'));
        $token = $auth->uploadToken(env('QINIU_BUCKET'));
        $file_name = date("YmdHis").rand(10000,99999);
        if (!empty($file_ext)){
            $file_name.='.'.$file_ext;
        }
        return response()->json([
            'qiniu_token' => $token,
            'qiniu_key'   =>  $file_name,
            'qiniu_url'   => 'http://avatar.xfz178.com/'.$file_name,
            'qiniu_url2'   => 'http://shmmsns.qpic.cn.xfz178.com/'.$file_name,
        ]);
    }
}
