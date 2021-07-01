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
    Route::get('companies', 'admin\CompanyController@index')->name('companies');
    Route::get('company/create', 'admin\CompanyController@create')->name('createCompany');
    Route::post('company/store', 'admin\CompanyController@store')->name('storeCompany');
    Route::post('company/change-sts', 'admin\CompanyController@changeStatus')->name('changeStsCompany');

    //Awards
    Route::get('awards', 'admin\AwardController@index')->name('awards');
    Route::get('award/create', 'admin\AwardController@create')->name('createAward');
    Route::post('award/store', 'admin\AwardController@store')->name('storeAward');
    Route::post('award/change-sts', 'admin\AwardController@changeStatus')->name('changeStsAward');
    //Assign Award
    Route::post('assign/award', 'admin\CompanyController@assignAward')->name('assignAward');
    Route::post('assign/change-sts', 'admin\CompanyController@assignChangeStatus')->name('changeStsAssignAward');

    Route::get('assign/code-download/{assignCode}', 'admin\CompanyController@fileDownload')->name('assignCodeDownload');
});
   
