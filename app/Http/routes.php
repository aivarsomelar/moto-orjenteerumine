<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'RiddleController@index');
Route::get('riddle/show', 'RiddleController@showRiddles');
Route::get('riddle/delete/all', 'RiddleController@deleteAllRiddles');
Route::post('riddle/save', 'RiddleController@saveRiddle');
