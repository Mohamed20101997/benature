<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// route if not auth
Route::group(['namespace' => 'Site'], function () {
    Route::get ('/', 'SiteController@home');
    Route::get ('products/{cat_id?}/{slug?}','SiteController@getProducts')->name('products');
    Route::get ('product/{id}/{slug}','SiteController@getProduct')->name('products');
    Route::post('reviews','SiteController@postReviews')->name('reviews');
    Route::post('message','SiteController@message');
    Route::post('/products/{product}/toggle_favorite','SiteController@toggle_favorite')->name('products.toggle_favorite');
    Route::get('getFavorite','SiteController@getFavorite');

    Route::prefix('cart')->group(function () {

        Route::get('/','CartController@getIndex')->name('site.cart.index');
        Route::post('/cart/add/{slug?}','CartController@postAdd')->name('site.cart.add');
        Route::post('/update{slug?}','CartController@postUpdate')->name('site.cart.update');
        Route::post('/update-all','CartController@postUpdateAll')->name('site.cart.update-all');

    });

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
