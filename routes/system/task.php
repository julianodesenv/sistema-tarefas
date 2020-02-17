<?php

Route::group(['prefix' => 'task', 'as' => 'task.', 'namespace' => 'Task'], function () {

    Route::get('', ['as' => 'index', 'uses' => 'TaskUserController@index']);
    //Route::get('', ['as' => 'index', 'uses' => 'TaskController@index']);
    Route::get('calendar', ['as' => 'calendar', 'uses' => 'TaskController@calendar']);
    Route::get('create', ['as' => 'create', 'uses' => 'TaskController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'TaskController@store']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskController@edit']);
    Route::get('show/{id}/{task_user_id?}', ['as' => 'edit', 'uses' => 'TaskController@show']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskController@update']);
    Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskController@destroy']);

    Route::get('getActions/{id}', ['as' => 'getActions', 'uses' => 'TaskUserController@getActions']);

    //REPORT
    Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'TaskReportController@index']);
    });

    //USERS
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('{id}', ['as' => 'index', 'uses' => 'TaskUserController@index']);
        Route::post('store', ['as' => 'store', 'uses' => 'TaskUserController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskUserController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskUserController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskUserController@destroy']);
    });

    //TASK TIMES
    Route::group(['prefix' => 'time', 'as' => 'time.'], function () {
        Route::get('play/{id}', ['as' => 'play', 'uses' => 'TaskTimeController@play']);
        Route::post('pause', ['as' => 'pause', 'uses' => 'TaskTimeController@pause']);
        Route::post('finish', ['as' => 'finish', 'uses' => 'TaskTimeController@finish']);
        Route::get('openFinishDescription/{id}', ['as' => 'openFinishDescription', 'uses' => 'TaskTimeController@openFinishDescription']);
        Route::get('checkCalcHours/{id}', ['as' => 'checkCalcHours', 'uses' => 'TaskTimeController@checkCalcHours']);
    });

});