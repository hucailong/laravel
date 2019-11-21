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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::view('/test','tex');
//
//Route::post('/topcc',function(){
//    $post = request()->all();
//    dd($post);
//});
//
//Route::get('/ppt',function(){
//    return "hello ,laravel";
//});
//
//Route::get('/user/{user_id}','Index\Reg@user');
//
//Route::get('/usera/{u_id}/{cc_cc?}',function($aa,$bb='ccc'){
//    echo $aa;
//    echo $bb;
//})->where(['u_id'=>'\w+','cc_cc'=>'\d+']);


/**
 * 后台
 */
//子域名路由
Route::domain('laravel.adm')->group(function () {
    //路由前缀
    /**
     * 管理员
     */
    Route::prefix('user')->group(function () {
        Route::get('create','Admin\UserController@create');
        Route::post('store','Admin\UserController@store');
        Route::get('index','Admin\UserController@index');
        Route::get('destroy/{id}','Admin\UserController@destroy');
        Route::get('edit/{id}','Admin\UserController@edit');
        Route::post('update/{id}','Admin\UserController@update');
    });

    /**
     * 品牌名称
     */
    Route::prefix('brand')->group(function () {
        Route::get('create','Admin\BrandController@create');
        Route::post('store','Admin\BrandController@store');
        Route::get('index','Admin\BrandController@index');
        Route::get('destroy/{id}','Admin\BrandController@destroy');
        Route::get('edit/{id}','Admin\BrandController@edit');
        Route::post('update/{id}','Admin\BrandController@update');
    });

    /**
     * 品牌分类
     */
    Route::prefix('category')->group(function () {
        Route::get('create','Admin\CategoryController@create');
        Route::post('store','Admin\CategoryController@store');
        Route::get('index','Admin\CategoryController@index');
        Route::get('destroy/{id}','Admin\CategoryController@destroy');
        Route::get('edit/{id}','Admin\CategoryController@edit');
        Route::post('update/{id}','Admin\CategoryController@update');
    });

    /**
     * 商品
     */
    Route::prefix('goods')->group(function () {
        Route::get('create','Admin\GoodsController@create');
        Route::post('store','Admin\GoodsController@store');
        Route::get('index','Admin\GoodsController@index');
        Route::get('destroy/{id}','Admin\GoodsController@destroy');
        Route::get('edit/{id}','Admin\GoodsController@edit');
        Route::post('update/{id}','Admin\GoodsController@update');
    });

});
//登录
Route::get('/login/login','Admin\LoginController@login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
 * 前台
 */
Route::domain('laravel.ind')->group(function(){
    Route::get('/','Index\IndexController@index');
    Route::view('/index/login','index\login');
    Route::view('/index/reg','index\reg');
    Route::post('/send','Index\LoginController@send');
    Route::post('/reg','Index\LoginController@reg');

});

Route::get('/stu','Index\StudentController@index');


