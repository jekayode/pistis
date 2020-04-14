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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('upload', 'ImportController@importExportView')->name('upload');
Route::get('export', 'ImportController@export')->name('export');
Route::post('import', 'ImportController@import')->name('import');
Route::get('/phones', 'HomeController@phones')->name('phones');