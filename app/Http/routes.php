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
Route::get('/', 'WelcomeController@index');

Route::get('/riddle/insert', 'RiddleController@index');
Route::get('/riddle/show/all', 'RiddleController@showRiddles');
Route::get('/riddle/show/{id}', 'RiddleController@showRiddle');
Route::get('/riddle/delete/all', 'RiddleController@deleteAllRiddles');
Route::post('/riddle/save', 'RiddleController@saveRiddle');

Route::get('/team/all', 'PublicController@allTeams');
Route::get('/team/description', 'PublicController@teamDescription');

Route::get('/picture/cover/form', 'UploadController@getCoverUploadForm');
Route::post('/picture/cover/save', 'UploadController@saveCoverPicture');
Route::get('/picture/profile/form', 'UploadController@getProfileUploadForm');
Route::post('/picture/profile/save', 'UploadController@saveProfilePicture');
Route::get('/picture/profile/all', 'PictureController@getAllProfilePictures');
Route::get('/picture/profile/set/{id}', 'PictureController@setProfilePicture');
Route::get('/picture/moments/form', 'UploadController@getMomentsUploadForm');

Route::get('/home', 'HomeController@index');
Route::get('/home/addTeamMember', 'HomeController@getTeamMemberAddForm');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);