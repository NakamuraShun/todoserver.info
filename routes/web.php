<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TodoController@index');
Route::post('/todos/create', 'TodoController@create');
Route::post('/todos/search', 'TodoController@search');
Route::get('/todos/show/{id}', 'TodoController@show');
Route::get('/todos/edit/{id}', 'TodoController@edit');
Route::post('/todos/update', 'TodoController@update');
Route::get('/todos/delete/{id}', 'TodoController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
