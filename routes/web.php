<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');



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
