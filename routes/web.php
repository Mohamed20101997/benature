<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Site' ,'middleware'=>'auth'], function () {
    Route::get('getFavorite','SiteController@getFavorite');
//    user account route
    Route::get('account','UserInformationController@account');
    Route::post('account','UserInformationController@postAccount');

    //    user password route
    Route::get('password','UserInformationController@password');
    Route::post('password','UserInformationController@postPassword');

    //    user order history
    Route::get('order/history','UserInformationController@orderHistory')->name('orderHistory');

    //    user profile
    Route::get('profile','UserInformationController@profile');

    Route::get('logout','UserInformationController@logout');
});

// route if not auth
Route::group(['namespace' => 'Site'], function () {
    Route::get ('/', 'SiteController@home');
    Route::get ('products/{cat_id?}/{slug?}','SiteController@getProducts')->name('products');
    Route::get ('country/{name}/{id}','SiteController@productCountry');
    Route::get ('product/{id}/{slug}','SiteController@getProduct')->name('products');

    Route::post('reviews','SiteController@postReviews')->name('reviews');

    Route::get('in_basket','SiteController@inBasket')->name('basket');

    Route::post('message','SiteController@message');
    Route::post('/products/{product}/toggle_favorite','SiteController@toggle_favorite')->name('products.toggle_favorite');


//    information routes
    Route::get ('about-us','SiteInformationController@aboutUs')->name('about-us');
    Route::get ('delivery-information','SiteInformationController@deliveryInformation')->name('delivery-information');
    Route::get ('privacy-policy','SiteInformationController@privacyPolicy')->name('privacy-policy');
    Route::get ('term-and-conditions','SiteInformationController@termAndConditions')->name('term-and-conditions');


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
    Route::get('login', 'AuthController@getLogin')->name('login');
    Route::post('login', 'AuthController@postLogin');
    Route::get('register', 'AuthController@getRegister');
    Route::post('register', 'AuthController@postRegister');
    Route::get('forgotPassword', 'AuthController@forgotPassword');
    Route::post('forgotPasswordPost', 'AuthController@forgotPasswordPost');
    Route::get('resetPassword/{token}','AuthController@reset_password');
    Route::post('resetPassword/{token}','AuthController@reset_password_post');




});
