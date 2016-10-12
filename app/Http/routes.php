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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','Admin\AuthController@showLoginForm');
    Route::post('/admin/login','Admin\AuthController@login');
    Route::get('/admin/logout','Admin\AuthController@logout');
    // Registration Routes...
    Route::get('admin/register', 'Admin\AuthController@showRegistrationForm');
    Route::post('admin/register', 'Admin\AuthController@register');
    Route::post('admin/password/email','Admin\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','Admin\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','Admin\PasswordController@showResetForm');
    Route::get('/admin', 'Backend\AdminController@index');
});  
