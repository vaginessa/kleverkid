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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/academies/new','AcademyController@create');
Route::post('/academies','AcademyController@store');
Route::get('/academies','AcademyController@index');
Route::get('/academy/details/{id}','AcademyController@details');