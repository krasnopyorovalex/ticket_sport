<?php

Route::group(['prefix' => 'stadium-places', 'as' => 'stadium_places.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('{stadium}', 'StadiumPlaceController@index')->name('index');
    Route::get('create/{stadium}', 'StadiumPlaceController@create')->name('create');
    Route::post('', 'StadiumPlaceController@store')->name('store');
    Route::post('{id}/positions', 'StadiumPlaceController@positions')->name('positions');
    Route::get('{id}/edit', 'StadiumPlaceController@edit')->name('edit');
    Route::put('{id}', 'StadiumPlaceController@update')->name('update');
    Route::delete('{id}', 'StadiumPlaceController@destroy')->name('destroy');

});
