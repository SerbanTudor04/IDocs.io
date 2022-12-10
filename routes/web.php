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
    
    Route::get('/doc/view/{id}', 'DocumentsController@viewDoc_show')->name('documents.viewDoc_show');
    Route::post('/doc/add_comment', 'DocumentsController@add_comment')->name('documents.add_comment');
    Route::get('/doc/add_comment', 'DocumentsController@add_comment')->name('documents.add_comment');

    Route::prefix('ratings')->group(function() {
        Route::post('/add', 'RatingsController@add2doc')->name('ratings.add2doc');
    
    });

    Route::group(['middleware' => ['guest']], function() {
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });



    Route::middleware(['admin'])->prefix('/admin')->group(function () {
        Route::get('/','AdminPanelController@index')->name('admin.index');
        Route::get('/users','AdminUsersManagementController@show')->name('admin.users');
        Route::get('/users/create','AdminUsersManagementController@get_create_or_edit')->name('admin.create_users_view');
        Route::get('/users/edit/{id}','AdminUsersManagementController@get_create_or_edit')->name('admin.edit_users_view');
        Route::get('/users/delete/{id}','AdminUsersManagementController@get_delete')->name('admin.delete_users_view');
        Route::get('/documentations','AdminDocumentsController@show')->name('admin.documentations');
        Route::get('/documentations/delete/{id}','AdminDocumentsController@get_delete')->name('admin.delete_docs_view');

        Route::prefix('/api')->group(function () {
            Route::get('/users','AdminAPIController@api_getTotalUsers')->name('users.api_getTotalUsers');
            Route::get('/users_mgm','AdminAPIController@get_Users')->name('users.get_Users');
            Route::get('/users_mgm_edit/get_apps','AdminUsersManagementController@get_apps')->name('users.get_apps'); 
            Route::get('/users_mgm_edit/{id}','AdminUsersManagementController@get_users_editInfo')->name('users.get_users_editInfo'); // retruns informations of the user
            Route::get('/documents','AdminAPIController@api_getTotalDocuments')->name('docs.api_getTotalDocuments');
            Route::get('/documents_mgm','AdminAPIController@get_documents')->name('docs.get_documents');
            Route::post('/documents_mgm/delete','AdminDocumentsController@post_delete')->name('docs.delete_docs_post');

            Route::post('/users_mgm/create','AdminUsersManagementController@post_create_or_edit')->name('users.get_create_post');
            Route::post('/users_mgm/delete','AdminUsersManagementController@post_delete')->name('admin.delete_users_post');
            Route::post('/users_mgm/edit/{id}','AdminUsersManagementController@post_create_or_edit')->name('users.get_edit_post');        
        });

    });
});