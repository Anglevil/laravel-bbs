<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/demo','HomeController@demo');

Route::get('/','HomeController@index');

Route::get('/post/create','HomeController@create');

Route::post('/post/store','HomeController@store');

Route::get('/post/{id}','HomeController@post');

Route::get('/user/{id}','HomeController@member');

// Authentication Routes...

Route::get('/login', 'Auth\LoginController@showLoginForm');

Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');

// Registration Routes...

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');

Route::post('/register', 'Auth\RegisterController@register');

//comment

Route::post('/comment/store','CommentController@store');

/*
|--------------------------------------------------------------------------
| member Routes
|--------------------------------------------------------------------------
|
| member Route list
|
*/
Route::group(['prefix' => 'member','middleware' => 'auth','namespace' => 'Member'],function (){

    Route::get('/',['uses'=>'HomeController@index','as'=>'member.index']);

    Route::get('/comment',['uses'=>'HomeController@comment','as'=>'member.comment']);

    Route::get('/edit',['uses'=>'EditController@edit','as'=>'member.edit.edit']);

    Route::post('/edit','EditController@edit_store');

    Route::get('/edit_avatar',['uses'=>'EditController@edit_avatar','as'=>'member.edit.avatar']);

    Route::post('/edit_avatar','EditController@edit_avatar_store');

    Route::get('/edit_password',['uses'=>'EditController@edit_password','as'=>'member.edit.password']);

    Route::get('/edit_binding',['uses'=>'EditController@edit_binding','as'=>'member.edit.binding']);

});

/*
|--------------------------------------------------------------------------
| common Routes
|--------------------------------------------------------------------------
|
| common Route list
|
*/
Route::group(['prefix' => 'common','namespace' => 'Common'],function (){
    #上传
    Route::post('/upload','PictureController@upload');
});
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| admin Route list
|
*/
Route::group(['prefix' => 'admin','middleware' => 'web','namespace'=>'Admin'],function(){
    #登录
    Route::get('/login','HomeController@login');
    #主页
    Route::get('/','HomeController@index');
});