<?php

// Api v1
Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:api'
], function () {

    // Authenticated user
    Route::group([
        'prefix' => 'my',
        'namespace' => 'Auth'
    ], function () {

        // Get Auth user
        Route::get('/', 'AuthController@getUser');
    });
});


