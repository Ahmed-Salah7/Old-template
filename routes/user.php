<?php
Auth::routes();

Route::namespace('User')->group(function () {
    Route::get('/dashboard', 'DesignController@index');
});


Route::get('/home', 'HomeController@index')->name('home');
