<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/results', 'HomeController@results')->name('home.results');
    Route::get('/about', 'HomeController@about')->name('home.about');

    Route::get('/doc/add', 'DocumentsController@add_show')->name('documents.add_show');
    Route::post('/doc/add', 'DocumentsController@add_perform')->name('documents.add_perform');
    
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/doc/view/{id}', 'DocumentsController@viewDoc_show')->name('documents.viewDoc_show');
        Route::post('/doc/add_comment', 'DocumentsController@add_comment')->name('documents.add_comment');
        Route::get('/doc/add_comment', 'DocumentsController@add_comment')->name('documents.add_comment');

    });
});