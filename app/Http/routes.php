<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Products;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin','ProductController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    /**
     * Type
     */
    Route::get('/admin/category','TypeController@index');
    Route::post('/admin/category','TypeController@store');
    Route::delete('/admin/category','TypeController@destroy');
    //产品
    Route::get('/admin/products','ProductController@index');
    Route::get('/admin/products/new','ProductController@store');
    Route::post('admin/products/new','ProductController@save');
    Route::get('/admin/products/{id}','ProductController@edit');
    Route::post('/admin/products/{id}','ProductController@update');
    //finish time
    Route::get('/admin/finish-time','TimeController@show');
    Route::get('/admin/finish-time/show','TimeController@showAll');
    Route::post('/admin/finish-time','TimeController@store');
    Route::delete('/admin/finish-time','TimeController@destroy');
    //3个完成时间
    Route::post('/admin/time','FinishtimeController@store');
    //产品价格列表
    Route::post('/admin/price-table','PricetableController@store');
    //价格
    Route::get('/admin/products/{proid}/price/{ptlid}','PriceController@index');
    //存数量和价格
    Route::post('/admin/price','PriceController@store');

    //登录
    Route::get('/login','FrontPageController@login');
    Route::post('/login','Auth\AuthController@login');
    //注册
    Route::get('/register','FrontPageController@register');

});


//产品属性
Route::get('/admin/attribute',function(){
    return view('admin.products.attribute');
});
//papier
Route::get('/admin/papier','PapierController@show');
Route::post('/admin/papier/create','PapierController@store');
Route::delete('/admin/papier/{id}','PapierController@destroy');

//Format
Route::get('/admin/format','FormatController@show');
Route::post('/admin/formate/create','FormatController@store');

//Pelliculage
Route::get('/admin/pelliculage','PelliculageController@show');
Route::post('/admin/pelliculage/create','PelliculageController@store');


/**
 * user
 */
Route::get('/admin/users/create','UserController@create');

/*
 * 后台页面
 */
Route::get('/admin/users/person','BackpageController@PersonClient');
Route::get('/admin/users/societe','BackpageController@SocieteClient');


//前台页面
Route::get('/','FrontPageController@index');

Route::get('/product/{id}',function($id){
    $product=Products::find($id);
    return view('graphipro.produit_template',compact('product'));
});




Route::get('/phpinfo',function (){
    return view('home');
});

Route::get('/home', 'HomeController@index');

