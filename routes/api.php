<?php


Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');

Route::resource('feedback', 'FeedbackController')->only(['index', 'show']);

Route::group(['middleware' => 'auth:api'], function(){

    Route::resource('feedback', 'FeedbackController')->only(['store', 'update', 'delete']);

    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('feedback/{id}/reply', 'FeedbackController@reply');
    });

    Route::post('user-info', 'UserController@userInfo');
});
