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
    Route::get('/login', 'admin\Login@index')->name('login');
    Route::post('/authentication','admin\Login@authentication')->name('authentication');

    Route::get('assign/logo-authentication/{assignCode}', 'admin\CompanyController@logoAuthtencation')->name('assignLogoAuthentication');
    
    Route::get('assign/page', 'admin\CompanyController@testPage');
});
Route::group(['prefix'=>'admin','middleware'=>'authLogin'],function(){
    Route::get('/', 'admin\Dashboard@index')->name('dashboard');
    Route::get('/logout', 'admin\Dashboard@logout')->name('logout');


    //Company
    Route::get('companies', 'admin\CompanyController@index')->name('companies');
    Route::get('company/create', 'admin\CompanyController@create')->name('createCompany');
    Route::post('company/store', 'admin\CompanyController@store')->name('storeCompany');
    Route::post('company/change-sts', 'admin\CompanyController@changeStatus')->name('changeStsCompany');
    Route::get('company/edit/{any}', 'admin\CompanyController@edit')->name('editCompany');
    Route::post('company/update', 'admin\CompanyController@update')->name('updateCompany');
    //Awards
    Route::get('awards', 'admin\AwardController@index')->name('awards');
    Route::get('award/create', 'admin\AwardController@create')->name('createAward');
    Route::post('award/store', 'admin\AwardController@store')->name('storeAward');
    Route::post('award/change-sts', 'admin\AwardController@changeStatus')->name('changeStsAward');
    Route::get('award/edit/{any}', 'admin\AwardController@edit')->name('editAward');
    Route::post('award/update', 'admin\AwardController@update')->name('updateAward');
    //Assign Award
    Route::post('assign/award', 'admin\CompanyController@assignAward')->name('assignAward');
    Route::post('assign/change-sts', 'admin\CompanyController@assignChangeStatus')->name('changeStsAssignAward');

    Route::get('assign/code-download/{id}', 'admin\CompanyController@fileDownload')->name('assignCodeDownload');

    

    //Entity Master
    Route::get('entities', 'admin\EntityController@index')->name('entityList');
    Route::get('entity/create', 'admin\EntityController@create')->name('entityCreate');
    Route::post('entity/store', 'admin\EntityController@store')->name('entityStore');
    Route::get('entity/edit/{id}', 'admin\EntityController@edit')->name('editEntity');
    Route::get('entity/delete/{id}', 'admin\EntityController@delete')->name('deleteEntity');

    Route::get('entity/companies/{id}', 'admin\EntityController@companyOption')->name('getEntityData');
    Route::get('entity/award/{id}', 'admin\EntityController@awardOption')->name('awardOption');
});
   
