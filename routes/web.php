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

Route::get('/', "Home@index");

Route::get('/owners', "Owners@index");

Route::get('/owners/create', "Owners@create");
Route::post('/owners/create', "Owners@createOwner");

Route::get('/owners/edit/{owner}', "Owners@showEdit");
Route::post('/owners/edit/{owner}', "Owners@editOwner");
//show
Route::get('/owners/{owner}', "Owners@show");
Route::post('/owners/{owner}', 'Owners@addAnimal');


