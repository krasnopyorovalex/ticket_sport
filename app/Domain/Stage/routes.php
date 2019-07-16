<?php

Route::group(['prefix' => 'stages', 'as' => 'stages.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('{championship}', 'StageController@index')->name('index');
    Route::get('create/{championship}', 'StageController@create')->name('create');
    Route::post('', 'StageController@store')->name('store');
    Route::post('{id}/positions', 'StageController@positions')->name('positions');
    Route::get('{id}/edit', 'StageController@edit')->name('edit');
    Route::put('{id}', 'StageController@update')->name('update');
    Route::delete('{id}', 'StageController@destroy')->name('destroy');

});
