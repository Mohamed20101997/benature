<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//note that the prefix is admin for all file route
Route::group( ['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect',
        'localizationRedirect', 'localeViewPath' ] ], function(){

        Route::group(['namespace' => 'Dashboard', 'middleware'=>'auth:admin','prefix'=>'admin'], function () {

            Route::get('/', 'DashboardController@index')->name('admin.dashboard');

            //logout route
            Route::get('logout', 'LoginController@logout')->name('admin.logout');

            //admin route
            Route::resource('admins', 'AdminController');

            //settings route
            Route::resource('settings', 'SettingsController');

            //question and answer route
            Route::resource('question_and_answer', 'QuestionAndAnswerController');

            //categories route
            Route::resource('category', 'CategoryController');

            //Brands route
            Route::resource('brands', 'BrandController');

            //products route
            Route::resource('products', 'ProductController');
            Route::get('getCategory', 'ProductController@getSupCayegory')->name('getCategory');
            Route::post('popular', 'ProductController@popular')->name('popular');

            //materials route
            Route::resource('materials', 'MaterialController');

            //message route
            Route::resource('messages', 'MessageController');

            //country route
            Route::resource('countries', 'CountriesController');

            //city route
            Route::resource('cities', 'CitiesController');

            //shipping route
            Route::resource('shippings', 'ShippingsController');
            Route::get('getCities', 'ShippingsController@getCities')->name('getCities');

            //taxes route
            Route::resource('taxes', 'TaxesController');


        });




        Route::group(['namespace' => 'Dashboard','middleware'=>'guest:admin','prefix'=>'admin'], function () {

            Route::get('login', 'LoginController@index')->name('admin.login');
            Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
        });

    });

