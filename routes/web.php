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
});
