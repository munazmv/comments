<?php

// Auth
Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function() {

    // Show login
    Route::get('login', 'AuthController@showLogin');

    // Attempt login
    Route::post('login', 'AuthController@attemptLogin')->name('auth.login');

    // Logout user
    Route::get('logout', 'AuthController@logout')->name('auth.logout');
});

// App (All unregistered and authenticated web routes will be forwarded to react router)
Route::group([
    'namespace' => 'App',
    'middleware' => 'auth'
], function() {

    // Show  app
    Route::get('/{path?}', 'AppController@showApp')
        ->where('path', '.*')
        ->name('app.show');
});
