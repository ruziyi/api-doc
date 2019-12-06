<?php
Route::group(['middleware' => ['web', Weiwei\LaravelApiDoc\Http\Middleware\LoginAuth::class]], function () {
    Route::get('doc', 'DocController@index');
    Route::get('doc/search', 'DocController@search');
    Route::get('doc/list', "DocController@getList");
    Route::get('doc/info', "DocController@getInfo");
    Route::any('doc/debug', "DocController@debug");
});

Route::any('doc/login', "DocController@login")->name('doc/login')->middleware('web');
