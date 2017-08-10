<?php

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
| These routes can be accessed only if users is not logged in 
|
*/
Route::group(['middleware' => ['guest']], function () {
    Route::get('register', 'Auth\RegisterController@register')->name('register');
    Route::post('register', 'Auth\RegisterController@postRegister')->name('post-register');

    Route::get('activate/{email}/{code}', 'Auth\ActivationController@activate')->name('activate');
    
    Route::get('login', 'Auth\LoginController@login')->name('login');
    Route::post('login', 'Auth\LoginController@postLogin')->name('post-login');

    Route::get('forgot-password', 'Auth\ForgotPasswordController@forgotPassword')->name('forgot-password');
    Route::post('forgot-password', 'Auth\ForgotPasswordController@postForgotPassword')->name('post-forgot-password');
    Route::get('password-reset/{email}/{code}', 'Auth\ForgotPasswordController@passwordReset')->name('password-reset');
    Route::post('password-reset/{email}/{code}', 'Auth\ForgotPasswordController@postPasswordReset')->name('post-password-reset');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');    

Route::get('/', function(){
    return view('home');
})->name('home');

//Test route for experimentation
Route::get('test', function(){
    
});