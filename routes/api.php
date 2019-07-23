<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'throttle:30,1', 'namespace' => 'Api', 'as' => 'api.'], static function () {

    Route::get('matches', 'MatchController@index')->name('matches');
    Route::get('matches/{id}', 'MatchController@show')->where(['id' => '[0-9]+'])->name('match');
    Route::get('stage/{stage}/team/{team}', 'StageController@show')->where(['stage' => '[0-9]+', 'team' => '[0-9]+'])->name('stage.matches');

    Route::post('search', 'SearchController@search')->name('search');
});
