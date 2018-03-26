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

Route::get('/', function(){
    return view('form');
});
Route::get('success', function(){
    return view('success');
});
Route::get('fail', function(){
    return view('fail');
});


Route::resource('calendar', 'FormController');
Route::get('oauth', 'FormController@oauth')->name('oauthCallBack');
