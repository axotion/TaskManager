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

Route::get('/', 'TasksController@index')->name('home');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store');
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');
Route::get('/logout', 'UserController@destroy');
Route::get('/profile', 'UserController@index');
Route::post('/token', 'ApiKeysController@store');
Route::get('/create', 'TasksController@create');
Route::post('/create', 'TasksController@store')->middleware('can:tasks.create');
Route::delete('/delete/{id}', 'TasksController@destroy')->middleware('can:tasks.delete,id');
Route::patch('/mark/{task}', 'TasksController@update')->middleware('can:tasks.update,task');