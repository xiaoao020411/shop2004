<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test','TestController@test');


Route::get('/student','StudentController@index');
Route::post('/save','StudentController@save');
Route::get('/list','StudentController@list');
Route::get('/destroy/{id}','StudentController@destroy');
Route::get('/edit/{id}','StudentController@edit');
Route::post('/update/{id}','StudentController@update');




Route::get('/login/create','LoginController@create');
Route::post('/login/save','LoginController@save');
Route::get('/login/list','LoginController@list');
Route::get('/login/destroy/{id}','LoginController@destroy');
Route::get('/login/edit/{id}','LoginController@edit');
Route::post('/login/update/{id}','LoginController@update');
