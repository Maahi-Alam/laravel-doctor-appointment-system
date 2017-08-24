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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','hospital'],'prefix'=>'hospital'],function(){
    //............hospital basic info
    Route::get('basicinfo','Hospital\BasicInfoController@index')->name('hosBasicInfo.index');
    Route::get('basicinfo/edit','Hospital\BasicInfoController@edit')->name('hosBasicInfo.edit');
    Route::post('basicinfo/store','Hospital\BasicInfoController@store')->name('hosBasicInfo.store');
});
