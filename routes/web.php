<?php

Route::group(['prefix' => '/', 'middleware' => 'data'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('service', 'HomeController@service');
    Route::get('news', 'HomeController@news');
    Route::get('work', 'HomeController@work');
    Route::get('about', 'HomeController@about');
    Route::get('contact', 'HomeController@contact');
    Route::get('address', 'HomeController@map');
    Route::get('employee', 'HomeController@employee');
});

Route::get('login', 'AdminController@login');
Route::post('login', 'AdminController@checkLogin');

Route::group(['middleware' => ['admin', 'data'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::group(['prefix' => 'page-setting'], function () {
        Route::group(['prefix' => 'news'], function () {
            Route::get('/', 'Admin\PageController@news');
            Route::any('add', 'Admin\PageController@newsAdd');
            Route::get('delete/{id}', 'Admin\PageController@newsDelete');
            Route::any('update/{id}', 'Admin\PageController@newsUpdate');
        });
        Route::group(['prefix' => 'work'], function () {
            Route::get('/', 'Admin\PageController@work');
            Route::any('add', 'Admin\PageController@workAdd');
            Route::get('delete/{id}', 'Admin\PageController@workDelete');
            Route::any('update/{id}', 'Admin\PageController@workUpdate');
        });
        Route::group(['prefix' => 'employee'], function () {
            Route::get('/', 'Admin\PageController@employee');
            Route::any('add', 'Admin\PageController@employeeAdd');
            Route::get('delete/{id}', 'Admin\PageController@employeeDelete');
            Route::any('update/{id}', 'Admin\PageController@employeeUpdate');
        });
        Route::group(['prefix' => 'urls'], function () {
            Route::get('/', 'Admin\PageController@urls');
            Route::any('add', 'Admin\PageController@urlsAdd');
            Route::get('delete/{id}/{uid}', 'Admin\PageController@urlsDelete');
            Route::any('update/{id}', 'Admin\PageController@urlsUpdate');
        });
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', 'Admin\PageController@page');
            Route::get('index', 'Admin\PageController@indexPage');
            Route::get('service', 'Admin\PageController@servicePage');
            Route::get('news', 'Admin\PageController@newsPage');
            Route::get('work', 'Admin\PageController@workPage');
            Route::get('employee', 'Admin\PageController@employeePage');
            Route::get('about', 'Admin\PageController@aboutPage');
            Route::get('contact', 'Admin\PageController@contactPage');
            Route::post('update/{page}', 'Admin\PageController@update');
        });
        Route::group(['prefix' => 'service'], function () {
            Route::get('/', 'Admin\PageController@service');
            Route::any('update/{id}', 'Admin\PageController@serviceUpdate');
            Route::get('delete/{id}', 'Admin\PageController@serviceDelete');
        });
    });
    Route::group(['prefix' => 'user-setting'], function () {
        Route::group(['prefix' => 'list'], function () {
            Route::get('/', 'Admin\UserController@list');
            Route::post('update/{id}', 'Admin\UserController@userUpdate');
        });
        Route::group(['prefix' => 'add'], function () {
            Route::get('/', 'Admin\UserController@add');
            Route::post('insert', 'Admin\UserController@userInsert');
        });
        Route::get('update/{id}', 'Admin\UserController@update');
    });
    Route::group(['prefix' => 'system'], function () {
        Route::get('data', 'Admin\SystemController@data');
        Route::get('getData', 'Admin\SystemController@getData');
        Route::group(['prefix' => 'log'], function () {
            Route::get('/', 'Admin\SystemController@log');
            Route::get('delete/{id}', 'Admin\SystemController@logDelete');
        });
    });
    Route::get('logout', 'AdminController@logout');
});
