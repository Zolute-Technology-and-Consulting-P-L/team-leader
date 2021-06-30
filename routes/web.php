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
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/login', 'admin\login@index')->name('login');
    Route::post('/authentication','admin\login@authentication')->name('authentication');
});
Route::group(['prefix'=>'admin','middleware'=>'authLogin'],function(){
    Route::get('/', 'admin\dashboard@index')->name('dashboard');
    Route::get('/logout', 'admin\dashboard@logout')->name('logout');


    //Company
    Route::get('companies', 'admin\company@index')->name('companies');
    Route::get('company/create', 'admin\company@create')->name('createCompany');
    Route::post('company/store', 'admin\company@store')->name('storeCompany');

    //Awards
    Route::get('awards', 'admin\award@index')->name('awards');
    Route::get('award/create', 'admin\award@create')->name('createAward');
    Route::post('award/store', 'admin\award@store')->name('storeAward');
});
   
