<?php

namespace App\Http;

use App\Http\Middleware\AfterMiddleware;
use App\Http\Middleware\CrosMiddleware;
use App\Http\Middleware\CheckToken;
use Barryvdh\Cors\HandleCors;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     * 注册的全局中间件，每个http请求都必经这里
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
        HandleCors::class
    ];

    /**应用的中间件组
     * The application's route middleware groups.
     * 中间件按客户端分组，这里分别包含可以应用到 Web 和 API 路由的通用中间件
     * 如：Route::group(['middleware' => ['web']], function () {
     * //
     * });
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'bindings',
            //HandleCors::class,
            //CrosMiddleware::class,//支持跨域请求
        ],
    ];

    /**
     * The application's route middleware.
     * 应用的路由控制的中间件，这些中间件可以分配给路由组或者单个路由
     * 中间件在 HTTP Kernel 中被定义后，可以使用 middleware 方法将其分配到路由，如：
     *  Route::get('/', function () {
     * //
     *  })->middleware('token');
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'jwt.token' => CheckToken::class,
        'after' => AfterMiddleware::class,
    ];
}
