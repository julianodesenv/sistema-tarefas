<?php
//CONFIGURATIONS
Route::group(['prefix' => 'configuration', 'as' => 'configuration.', 'namespace' => 'Configuration'], function () {

    //TASKS
    Route::group(['prefix' => 'task', 'as' => 'task.', 'namespace' => 'Task'], function () {

        //ACTION
        Route::group(['prefix' => 'action', 'as' => 'action.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TaskActionController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TaskActionController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TaskActionController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskActionController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskActionController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskActionController@destroy']);
        });

        //PRIORITY
        Route::group(['prefix' => 'priority', 'as' => 'priority.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TaskPriorityController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TaskPriorityController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TaskPriorityController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskPriorityController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskPriorityController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskPriorityController@destroy']);
        });

        //PROJECT TEMPLATE
        Route::group(['prefix' => 'project-template', 'as' => 'project-template.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TaskProjectTemplateController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TaskProjectTemplateController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TaskProjectTemplateController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskProjectTemplateController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskProjectTemplateController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskProjectTemplateController@destroy']);
        });

        //PROJECT
        Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'TaskProjectController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TaskProjectController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TaskProjectController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TaskProjectController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'TaskProjectController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TaskProjectController@destroy']);
        });

    });

    //SOCIAL MEDIA
    Route::group(['prefix' => 'social-media', 'as' => 'social-media.', 'namespace' => 'SocialMedia'], function () {
        Route::group(['prefix' => 'status', 'as' => 'status.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SocialMediaStatusController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'SocialMediaStatusController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'SocialMediaStatusController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SocialMediaStatusController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'SocialMediaStatusController@update']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SocialMediaStatusController@destroy']);
        });
    });

    //TYPE SERVICE
    Route::group(['prefix' => 'type-service', 'as' => 'type-service.', 'namespace' => 'TypeService'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TypeServiceController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TypeServiceController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TypeServiceController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TypeServiceController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'TypeServiceController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TypeServiceController@destroy']);
    });

    //SECTOR
    Route::group(['prefix' => 'sector', 'as' => 'sector.', 'namespace' => 'Sector'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'SectorController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'SectorController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'SectorController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SectorController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'SectorController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SectorController@destroy']);
    });

    //DEMAND
    Route::group(['prefix' => 'demand', 'as' => 'demand.', 'namespace' => 'Demand'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'DemandController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'DemandController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'DemandController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'DemandController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'DemandController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'DemandController@destroy']);
    });

    //SERVICES
    Route::group(['prefix' => 'service', 'as' => 'service.', 'namespace' => 'Service'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ServiceController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ServiceController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ServiceController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ServiceController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'ServiceController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ServiceController@destroy']);
    });

    //SEGMENT CLIENTS
    Route::group(['prefix' => 'segment-client', 'as' => 'segment-client.', 'namespace' => 'SegmentClient'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'SegmentClientController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'SegmentClientController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'SegmentClientController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SegmentClientController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'SegmentClientController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'SegmentClientController@destroy']);
    });

    //TYPE CLIENTS
    Route::group(['prefix' => 'type-client', 'as' => 'type-client.', 'namespace' => 'TypeClient'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TypeClientController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TypeClientController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'TypeClientController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'TypeClientController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'TypeClientController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'TypeClientController@destroy']);
    });

    //USER ROLE
    Route::group(['prefix' => 'user-role', 'as' => 'user-role.', 'namespace' => 'User'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'UserRoleController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'UserRoleController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'UserRoleController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserRoleController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'UserRoleController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'UserRoleController@destroy']);
    });

    //USERS
    Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'UserController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
        Route::get('active/{id}', ['as' => 'active', 'uses' => 'UserController@active']);
        Route::get('destroyFile/{id?}/{name?}', ['as' => 'destroyFile', 'uses' => 'UserController@destroyFile']);

        //PASSWORD
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::get('{id}', ['as' => 'edit', 'uses' => 'UserPasswordController@edit']);
            Route::put('update/{id}', ['as' => 'update', 'uses' => 'UserPasswordController@update']);
            Route::get('generatePassword/{id}', ['as' => 'generatePassword', 'uses' => 'UserPasswordController@generatePassword']);
        });

        //SECTOR
        Route::group(['prefix' => 'sector', 'as' => 'sector.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'UserSectorController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserSectorController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'UserSectorController@destroy']);
        });

        //MANAGER
        Route::group(['prefix' => 'manager', 'as' => 'manager.'], function () {
            Route::get('{id}', ['as' => 'index', 'uses' => 'UserManagerController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserManagerController@store']);
            Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'UserManagerController@destroy']);
        });

    });

});
