<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('article/user/{id}','ArticleController@index@2');
Route::resource('article', 'ArticleController');
Route::resource('user', 'UserController');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['admin']], function()
{
	Route::get('/', 'AdminHomeController@index');
	Route::resource('/article', 'AdminArticleController');// 注册一个指向articles控制器的资源路由：
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
