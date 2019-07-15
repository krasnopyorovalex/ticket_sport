<?php

Route::group(['prefix' => 'championships', 'as' => 'championships.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'ChampionshipController@index')->name('index');
    Route::get('create', 'ChampionshipController@create')->name('create');
    Route::post('', 'ChampionshipController@store')->name('store');
    Route::post('positions', 'ChampionshipController@positions')->name('positions');
    Route::get('{id}/edit', 'ChampionshipController@edit')->name('edit');
    Route::put('{id}', 'ChampionshipController@update')->name('update');
    Route::delete('{id}', 'ChampionshipController@destroy')->name('destroy');

});
