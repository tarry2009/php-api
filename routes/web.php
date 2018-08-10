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

//Route::get('/{modelYear}/{manufacturer}/{model}', 'VehicleController@index');  
 

Route::get('/vehicles/{modelYear}/{manufacturer}/{model}', 'VehicleController@index');
Route::post('/vehicles', 'VehicleController@index');	
