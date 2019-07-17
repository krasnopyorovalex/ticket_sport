<?php

Route::group(['prefix' => 'orders', 'as' => 'orders.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'OrderController@index')->name('index');
    Route::get('{id}/edit', 'OrderController@edit')->name('edit');
    Route::put('{id}', 'OrderController@update')->name('update');
    Route::delete('{id}', 'OrderController@destroy')->name('destroy');
});
