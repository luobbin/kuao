<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $data=null)
    {
        try {
            /**
             *TODO 获取用户信息的方法可封装起来
             *对应的放回参数可根据个人习惯进行自定义
             */
            $token = JWTAuth::getToken();
            if ($token) JWTAuth::setToken($token);
            if (!JWTAuth::toUser()){
                return response()->json(['error' => '无此用户,请重新登录'], 407);
                //return error(203,"无此用户,请重新登录");
            }

        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'token 过期,请重新登录'], 406);
            //return error($e->getCode(),"token 过期,请重新登录");

        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'token 失效,请重新登录'], 404);
            //return error($e->getCode(),"token 失效,请重新登录");

        } catch (JWTException $e) {
            return response()->json(['error' => 'token 参数错误,请重新登录'], 408);
            //return error($e->getCode(),"token 参数错误,请重新登录");

        }
        return $next($request);
    }
}
