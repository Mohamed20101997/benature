<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//note that the prefix is admin for all file route
Route::group( ['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){

        Route::group(['namespace' => 'Dashboard', 'middleware'=>'auth:admin','prefix'=>'admin'], function () {

            Route::get('/', 'DashboardController@index')->name('admin.dashboard');

            //logout route
            Route::get('logout', 'LoginController@logout')->name('admin.logout');

            //categories route
            Route::resource('category', 'CategoryController');

            //Brands route
            Route::resource('brands', 'BrandController');

            //products route
            Route::resource('products', 'ProductController');
            Route::get('getCategory', 'ProductController@getSupCayegory')->name('getCategory');

            //materials route
            Route::resource('materials', 'MaterialController');
            //message route
            Route::resource('messages', 'MessageController');


        });




        Route::group(['namespace' => 'Dashboard','middleware'=>'guest:admin','prefix'=>'admin'], function () {

            Route::get('login', 'LoginController@index')->name('admin.login');
            Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
        });

    });

