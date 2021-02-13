<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// route if auth
Route::group(['namespace' => 'Site','middleware'=>'auth:web'], function () {

    // auth
});


// route if not auth
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@home');
    Route::get('products','SiteController@getProducts');
    Route::get('product/{id}/{slug}','SiteController@getProduct');
});


// route if not auth and guest
Route::group(['namespace' => 'Site','middleware'=>'guest:web'], function () {
/// Auth Routes
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('register', 'AuthController@getRegister');
    Route::post('register', 'AuthController@postRegister');
    Route::get('forgotPassword', 'AuthController@forgotPassword');
    Route::post('forgotPasswordPost', 'AuthController@forgotPasswordPost');
    Route::get('resetPassword/{token}','AuthController@reset_password');
    Route::post('resetPassword/{token}','AuthController@reset_password_post');




});
