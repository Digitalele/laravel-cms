<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {

        //Index

        Route::get('/', [
        	'uses' => 'BlogController@index',
        	'as' 	 => 'blog'
        ]);


        // /blog/id

        Route::get('/blog/{post}', [
            'uses' => 'BlogController@show',
            'as'   => 'blog.show'
        ]);


        // /category/id

        Route::get('/category/{category}', [
            'uses' => 'BlogController@category',
            'as'   => 'category'
        ]);


        // /author/id

        Route::get('/author/{author}', [
            'uses' => 'BlogController@author',
            'as'   => 'author'
        ]);


        /*
        |--------------------------------------------------------------------------
        | Application Routes
        |--------------------------------------------------------------------------
        |
        | This route group applies the "web" middleware group to every route
        | it contains. The "web" middleware group is defined in your HTTP
        | kernel and includes session state, CSRF protection, and more.
        |
        */

        // Route::group(['middleware' => ['web']], function () {
        //     //
        // });


        /*
        |--------------------------------------------------------------------------
        | Admin Routes
        |-------------------------------------------------------------------------
        */



            Route::auth();
        	Route::get('/home', 'Admin\HomeController@index');
            Route::resource('/admin/blog', 'Admin\BlogController');



        /*
        |--------------------------------------------------------------------------
        | Site Routes
        |-------------------------------------------------------------------------
        */
        Route::get('/home', [
            'uses' => 'SiteController@getIndex',
            'as'   => 'home'
        ]);

        Route::get('/about', [
            'uses' => 'SiteController@getAbout',
            'as'   => 'about'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Mailer Routes
        |-------------------------------------------------------------------------
        */

        Route::get('/contact', [
            'uses' => 'SiteController@getContact',
            'as'   => 'contact'
        ]);

         Route::post('/contact', [
            'uses' => 'SiteController@postContact',
            'as'   => 'contact'
        ]);

});














