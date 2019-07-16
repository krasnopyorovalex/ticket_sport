<?php

Route::group(['prefix' => 'matches', 'as' => 'matches.'], static function () {
    Route::pattern('id', '[0-9]+');

    Route::get('{stage}', 'MatchController@index')->name('index');
    Route::get('create/{stage}', 'MatchController@create')->name('create');
    Route::post('', 'MatchController@store')->name('store');
    Route::get('{id}/edit', 'MatchController@edit')->name('edit');
    Route::put('{id}', 'MatchController@update')->name('update');
    Route::delete('{id}', 'MatchController@destroy')->name('destroy');

});
