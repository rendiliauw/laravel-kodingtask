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



Auth::routes();

Route::group(['middleware' => 'auth'], function(){


    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::get('/task/trash','TaskController@trash')->name('task.trash');
    Route::get('/task/{id}/restore','TaskController@restore')->name('task.restore');
    Route::get('/task/{id}/deletepermanent','TaskController@deletepermanent')->name('task.deletepermanent');


    Route::resource('task','TaskController');




});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
