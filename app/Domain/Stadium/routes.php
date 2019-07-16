<?php

Route::group(['prefix' => 'stadiums', 'as' => 'stadiums.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'StadiumController@index')->name('index');
    Route::get('create', 'StadiumController@create')->name('create');
    Route::post('', 'StadiumController@store')->name('store');
    Route::get('{id}/edit', 'StadiumController@edit')->name('edit');
    Route::put('{id}', 'StadiumController@update')->name('update');
    Route::delete('{id}', 'StadiumController@destroy')->name('destroy');

});
