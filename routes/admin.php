<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix'=>'admin'],function (){
    Route::get('login', 'AuthController@index')->name('admin.login');
    Route::POST('login', 'AuthController@login')->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::get('/', function () {
        return view('Admin/index');
    })->name('adminHome');

    #### Admins ####
    Route::resource('admins','AdminController');
    Route::POST('delete_admin','AdminController@delete')->name('delete_admin');
    Route::get('my_profile','AdminController@myProfile')->name('myProfile');


    #### Sliders ####
    Route::resource('sliders','SliderController');
    Route::post('slider.delete','SliderController@delete')->name('slider.delete');

    ### Areas ####
    Route::resource('areas', 'AreaController');
    Route::POST('areaDelete','AreaController@delete')->name('area.delete');

    ### subAreas ###
    Route::get('subArea/{id}', 'GovernorateController@index')->name('subArea');
    Route::post('subAreaDelete', 'GovernorateController@delete')->name('subArea.delete');
    Route::get('subArea.create/{country_id}', 'GovernorateController@create')->name('subArea.create');
    Route::post('subArea.store', 'GovernorateController@store')->name('subArea.store');
    Route::get('subArea.edit/{id}', 'GovernorateController@edit')->name('subArea.edit');
    Route::POST('subArea.update/{id}', 'GovernorateController@update')->name('subArea.update');












    #### Auth ####
    Route::get('logout', 'AuthController@logout')->name('admin.logout');



   ### Points #######


   Route::resource('points','PointController');
    Route::POST('delete_point','PointController@delete')->name('delete_point');






});










