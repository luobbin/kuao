<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| 若需要添加跨域的中间件可设成['middleware' => ['api','cors'],'prefix' => 'admin-user']
| 我的这些中间件在 app/Providers/RouteServiceProvider.php 中已设置，
| 所以在当前文件不需要添加
|
*/
Route::group(['prefix' => 'admin'], function () {
    // 当前为不要验证TOKEN的路由
    Route::post('login', 'UserController@login');
    //上传文件
    Route::post('single_upload', 'FileUploadController@singleFile');
    Route::post('muti_upload', 'FileUploadController@mutiFile');

    // 需要验证token的路由可在下方添加
    Route::group(['middleware' => 'jwt.token'], function () {
        Route::post('user_add', 'UserController@register');//添加账号
        Route::get('me', 'UserController@userInfo');//查询账号
        Route::any('logout', 'UserController@logout');//账号退出
        Route::get('get_qiniu_token', 'UserController@getQiniuToken');//查询账号
        Route::resource('product', 'ProductsController');//产品管理
        Route::resource('product_cate', 'ProductCatesController');//产品分类管理
        Route::resource('article', 'ArticlesController');//新闻管理
        Route::resource('article_cate', 'ArticleCatesController');//新闻分类管理
        Route::resource('case', 'CasesController');//新闻管理
        Route::resource('webset', 'WebSettingController');//配置管理
        Route::resource('case_cate', 'CasesCatesController');//新闻分类管理
        Route::get('home/{id}', 'HomeController@show');//首页栏目获取
        Route::put('home/{id}', 'HomeController@update');//首页栏目修改
        Route::resource('job', 'JobsController');//招聘管理

        Route::resource('admin_handle', 'AdminHandleController');//后台管理员管理
    });
});
