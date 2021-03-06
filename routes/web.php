<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', 'HomeController@index')->name('index');
Route::get('/getBlock/{id}', 'HomeController@getBlock');//首页模块加载
Route::get('/products', 'ProductsController@index');
Route::get('/product_search', 'ProductsController@search');
Route::get('/product_detail/{id}', 'ProductsController@show');
Route::get('/cases', 'CasesController@index');
Route::get("/case_detail/{id}",'CasesController@show');
Route::get('/articles', 'ArticlesController@index');
Route::get("/article_detail/{id}",'ArticlesController@show');
Route::get("/news/{id}",'ArticlesController@news');
Route::get('/listFontCate', 'ProductCatesController@listFontCate');//产品分类
Route::get('/listFontItems', 'ProductsController@listFontItems');//产品所有


Route::get('/home', 'HomeController@home')->name('home');

Route::get('/test', 'TestController@index');//->middleware("token:111222333");//中间件传参应用

/*
下例指: 当用GET方式访问 xx.com/yy 这个地址时,用XxController中的reg()方法去响应.
*/
Route::get('/star', 'RobinStarController@index');//->middleware("after");//后执行的中间件
Route::get('/star/{id}', 'RobinStarController@show');

/*
当用POST方式访问 xx.com/zz 这个地址时,用XxController中的pay()方法去响应.
*/
Route::post('/star', 'RobinStarController@add');

