<?php

//Auth::routes(['verify' => true]);
include 'system/auth.php';

Route::group(['as' => 'system.', 'namespace' => 'System', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //AJAX
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.', 'namespace' => 'Ajax'], function () {
        Route::get('cityByStateSelect/{id}', ['as' => 'cityByStateSelect', 'uses' => 'CityController@getCityByStateSelect']);
        Route::get('citiesSelect/{state_id}/{city_id}', ['as' => 'citiesSelect', 'uses' => 'CityController@citiesSelect']);
        Route::get('addressZipCode/{zip_code}', ['as' => 'addressZipCode', 'uses' => 'AddressController@getAddressZipCode']);
    });

    //TASKS
    Route::group(['prefix' => 'task', 'as' => 'task.', 'namespace' => 'Task'], function () {

        Route::get('', ['as' => 'index', 'uses' => 'TaskController@index']);
        Route::get('calendar', ['as' => 'calendar', 'uses' => 'TaskController@calendar']);
        Route::get('create', ['as' => 'create', 'uses' => 'TaskController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TaskController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskController@destroy']);

        //USERS
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'TaskUserController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'TaskUserController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskUserController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskUserController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskUserController@destroy']);
        });

    });

    //SCHEDULES
    Route::group(['prefix' => 'schedule', 'as' => 'schedule.', 'namespace' => 'Schedule'], function () {

        Route::get('', ['as' => 'index', 'uses' => 'ScheduleController@index']);
        Route::get('calendar', ['as' => 'calendar', 'uses' => 'ScheduleController@calendar']);
        Route::get('create', ['as' => 'create', 'uses' => 'ScheduleController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ScheduleController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ScheduleController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'ScheduleController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ScheduleController@destroy']);

        //USERS
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ScheduleUserController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'ScheduleUserController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ScheduleUserController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'ScheduleUserController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ScheduleUserController@destroy']);
        });

    });

    //SOCIAL MEDIA
    Route::group(['prefix' => 'social-media', 'as' => 'social-media.', 'namespace' => 'SocialMedia'], function () {

        //POSTS
        Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SocialMediaPostController@index']);
            Route::get('all', ['as' => 'all', 'uses' => 'SocialMediaPostController@all']);
            Route::get('create', ['as' => 'create', 'uses' => 'SocialMediaPostController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'SocialMediaPostController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SocialMediaPostController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'SocialMediaPostController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SocialMediaPostController@destroy']);

            //SERVICES
            Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
                Route::get('{id}', ['as' => 'index', 'uses' => 'SocialMediaPostServiceController@index']);
                Route::post('store', ['as' => 'store', 'uses' => 'SocialMediaPostServiceController@store']);
                Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SocialMediaPostServiceController@edit']);
                Route::put('update/{id}', ['as' => 'update', 'uses' => 'SocialMediaPostServiceController@update']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SocialMediaPostServiceController@destroy']);
            });
        });

        //CLIENTS
        Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'ClientController@index']);
            Route::get('/export/{id}', ['as' => 'export', 'uses' => 'ClientController@export']);
        });

    });

    //CLIENTS
    Route::group(['prefix' => 'client', 'as' => 'client.', 'namespace' => 'Client'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ClientController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ClientController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ClientController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'ClientController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientController@destroy']);
        Route::get('destroyFile/{id?}/{name?}', ['as' => 'destroyFile', 'uses' => 'ClientController@destroyFile']);

        //CONTACTS
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'ClientContactController@index']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'ClientContactController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ClientContactController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientContactController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'ClientContactController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientContactController@destroy']);
        });

        //SERVICES
        Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ClientServiceController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'ClientServiceController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientServiceController@destroy']);
        });

        //USERS
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'ClientUserController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'ClientUserController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientUserController@destroy']);
        });

        //DOMAINS
        Route::group(['prefix' => 'domain', 'as' => 'domain.'], function () {
            Route::get('/{id}', ['as' => 'index', 'uses' => 'ClientDomainController@index']);
            Route::get('create/{id}', ['as' => 'create', 'uses' => 'ClientDomainController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ClientDomainController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ClientDomainController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'ClientDomainController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientDomainController@destroy']);

            //TEXTS
            Route::group(['prefix' => 'text', 'as' => 'text.'], function () {
                Route::get('/{client_id}/{id}', ['as' => 'index', 'uses' => 'ClientDomainTextController@index']);
                Route::get('create/{client_id}/{id}', ['as' => 'create', 'uses' => 'ClientDomainTextController@create']);
                Route::post('store', ['as' => 'store', 'uses' => 'ClientDomainTextController@store']);
                Route::get('edit/{client_id}/{id}', ['as' => 'edit', 'uses' => 'ClientDomainTextController@edit']);
                Route::put('update/{id}', ['as' => 'update', 'uses' => 'ClientDomainTextController@update']);
                Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ClientDomainTextController@destroy']);
            });
        });
    });

    include 'system/configuration.php';

});
