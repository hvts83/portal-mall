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
Route::get('/', 'CaptureController@index');
Route::post("/send", "CaptureController@store");
Route::get("success", "CaptureController@success");

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/configuracion', 'HomeController@config')->name('configuracion');
Route::post('/configuracion', 'HomeController@store');
