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


Route::get('/', 'HomeController@index');
Route::get('/members', 'MembersController@index');
Route::post('/input', 'InputController@form_submission')->name('form_submission');
Route::post('/check-image', 'ImageController@checkImage')->name('checkImage');
Route::post('/validate-email', 'EmailController@checkEmail')->name('checkEmail');



