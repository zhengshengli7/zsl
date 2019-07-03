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

});

//模板继承,后台搭建后台
Route::resource("/admin","Admin\AdminController");
//后台用户模块的搭建
Route::resource("/adminusers","Admin\UsersController");
// 会员地址
Route::get("/adminaddress/{id}","Admin\UsersController@address");
//自定义的函数
Route::get("/a","Admin\UsersController@a");
// 自定义的类

Route::get("/b","Admin\UsersController@b");
