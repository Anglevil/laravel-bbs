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

    Route::get('/','HomeController@index');

    Route::get('/edit',['uses'=>'HomeController@edit','as'=>'member.edit.edit']);

    Route::get('/edit_avatar',['uses'=>'HomeController@edit_avatar','as'=>'member.edit.avatar']);

    Route::get('/edit_password',['uses'=>'HomeController@edit_password','as'=>'member.edit.password']);

    Route::get('/edit_binding',['uses'=>'HomeController@edit_binding','as'=>'member.edit.binding']);

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