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
    echo phpinfo();
});
Route::get('/test','TestController@test');
Route::get('/redis','TestController@redis');

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
Route::post('/login/loginDo','LoginController@loginDo');
Route::get('/login/index','LoginController@index');


Route::prefix('user')->group(function(){
    Route::get('create','UserController@create');
    Route::post('save','UserController@save');
    Route::get('list','UserController@list');
    Route::get('destroy/{id}','UserController@destroy');
    Route::get('edit/{id}','UserController@edit');
    Route::post('update/{id}','UserController@update');
    Route::post('logindo','UserController@logindo');
    Route::get('index','UserController@index');
});