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


Route::get('/home', function () {
    return view('home');
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

Route::group(['middleware' => ['admin']], function () {
//    Route::auth();
    /*
     * client
     */
    Route::get('/admin/users/person','BackpageController@personClient');
    Route::get('/admin/users/person/{user}','UserController@show');
    Route::get('/admin/users/societe','BackpageController@societeClient');

    //livraison地址及价格
    Route::resource('/admin/livraison','LivraisonConroller');

    /**
     * Type
     */

    Route::get('/admin/category','TypeController@index');
    Route::post('/admin/category','TypeController@store');
    Route::delete('/admin/category','TypeController@destroy');

    //产品
    Route::get('/admin/products{query?}','ProductController@index');
    Route::get('/admin/products/new','ProductController@store');
    Route::post('admin/products/new','ProductController@save');
    Route::get('/admin/products/{id}','ProductController@edit');
    Route::post('/admin/products/{id}','ProductController@update');

    //产品团购价格
    Route::post('/admin/promotion','PromotionController@store');
    Route::delete('/admin/promotion/{id}','PromotionController@destroy');
    Route::put('/admin/promotion/{id}','PromotionController@update');
	//优惠产品的运费
	Route::resource('/admin/prolivraison','ProLvPriceController');
    //产品的promotion
    Route::get('/admin/pro','ProController@index');
    Route::post('/admin/pro','ProController@store');
    Route::get('/admin/pro/{id}','ProController@edit');
    Route::post('/admin/pro/{id}','ProController@update');
    Route::delete('/admin/pro/{id}','ProController@destroy');
    //finish time
    Route::get('/admin/finish-time','TimeController@show');
    Route::get('/admin/finish-time/show','TimeController@showAll');
    Route::post('/admin/finish-time','TimeController@store');
    Route::delete('/admin/finish-time','TimeController@destroy');
    //3个完成时间
    Route::post('/admin/time','FinishtimeController@store');
    //产品价格列表
    Route::post('/admin/price-table','PricetableController@store');
    Route::post('/admin/price-table/edit','PricetableController@edit');
    Route::delete('/admin/price-table/{id}','PricetableController@destroy');
    //价格
    Route::get('/admin/products/{proid}/price/{ptlid}','PriceController@index');
    //特殊产品
    Route::post('/admin/special','SpecialPriceController@store');
    Route::delete('/admin/special/{id}','SpecialPriceController@destroy');
    //存数量和价格
    Route::post('/admin/price','PriceController@store');

    //删除
    Route::delete('/admin/price/{id}','PriceController@destroy');
    Route::put('/admin/price','PriceController@edit');
    
    //订单
    Route::get('/admin/orders','OrderController@showAll');
    //订单状态
    Route::get('/admin/status','StatusController@index');
    Route::resource('/admin/status','StatusController');
    //下载文件
    Route::post('/admin/files/download','OrderController@download');

	//产品属性
	Route::get('/admin/attribute',function(){
		return view('admin.products.attribute');
	});
//papier
	Route::get('/admin/papier','PapierController@show');
	Route::post('/admin/papier/create','PapierController@store');
	Route::delete('/admin/papier/{id}','PapierController@destroy');

//Format
	Route::put('/admin/format','FormatController@update');
	Route::get('/admin/format','FormatController@show');
	Route::post('/admin/formate/create','FormatController@store');
	Route::delete('/admin/format/{id}','FormatController@destroy');
//Pelliculage
	Route::get('/admin/pelliculage','PelliculageController@show');
	Route::post('/admin/pelliculage/create','PelliculageController@store');
	Route::delete('/admin/pelliculage/{id}','PelliculageController@destroy');
});

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/admin/login','Admin\AuthController@showLoginForm');
    Route::post('/admin/login','Admin\AuthController@login');
    Route::get('/admin/register','Admin\AuthController@showRegistrationForm');
    Route::post('/admin/register','Admin\AuthController@postRegister');
    Route::get('/admin/logout','Admin\AuthController@logout');


});




//前台页面
Route::get('/','FrontPageController@index');

Route::get('/product/{name}','FrontPageController@product');


Route::get('/home', 'HomeController@index');
//前台获取papier
Route::get('/papier','JsonController@getPapier');
//获取pelliculage
Route::get('/pelliculage','JsonController@getPelle');
Route::get('/price','JsonController@getPrice');

//获取imprimer
Route::get('/imprimer','JsonController@getImprimer');
//存储购物车
Route::post('/panier','OrderController@store');
//购物车页面
Route::get('/panier','FrontPageController@showPanier');
//删除购物车内容
Route::get('/panier/{rawid}','OrderController@destroy');

//产品的promotion
Route::get('/promotion/{id}','FrontPageController@pro');

Route::group(['middleware' => ['web']], function () {
//付款
    Route::post('/payment','PaymentController@showpayment');
    Route::post('/postpayment','PaymentController@postpayment');
    //compte

    Route::get('/compte','FrontPageController@compte');
    //登录
    Route::get('/login','FrontPageController@login');
    Route::post('/login','Auth\AuthController@login');
//注册
    Route::get('/inscription','FrontPageController@register');
    Route::post('/register/{type}','Auth\AuthController@register');
    //logout
    Route::get('/logout','Auth\AuthController@logout');

    Route::get('/pdf/{query}','PdfController@make');
});

Route::get('/phpinfo','HomeController@index');