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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('showform', function () {
    return view('userinfo.info');
})->name('showform')->middleware('auth');
Route::get('views','userinfoController@index')->name('views')->middleware('auth');
Route::post('insert','userinfoController@store')->name('insert')->middleware('auth');
Route::get('edit/{id}','userinfoController@edit')->name('edit')->middleware('auth');
Route::post('updating/{id}','userinfoController@update')->name('updating')->middleware('auth');
Route::get('delete/{id}','userinfoController@destroy')->name('delete')->middleware('auth');

