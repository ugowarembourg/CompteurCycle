<?php
/**
 * Created by PhpStorm.
 * User: ugo
 * Date: 16/11/18
 * Time: 09:19
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('/widget/infos/{id}', 'UgoWarembourg\Compteurcycle\Controllers\CompteurcycleController@index');
    Route::post('/widget/infos/{id}', 'UgoWarembourg\Compteurcycle\Controllers\CompteurcycleController@postInfo');

});