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
        Route::get('/admin/dashboard', 'Admin\HomeController@index');
        Route::resource('/admin/blog', 'Admin\BlogController');

        //Restore
        Route::put('/admin/blog/restore/{blog}', [
            'uses' => 'Admin\BlogController@restore',
            'as'   => 'admin.blog.restore'
        ]);

        Route::delete('/admin/blog/force-destroy/{blog}', [
            'uses' => 'Admin\BlogController@forceDestroy',
            'as'   => 'admin.blog.force-destroy'
        ]);


        /*
        |--------------------------------------------------------------------------
        | Site Routes
        |-------------------------------------------------------------------------
        */
        Route::get('/index', [
            'uses' => 'SiteController@getIndex',
            'as'   => 'index'
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














