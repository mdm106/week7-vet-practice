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

Route::get('/', 'Home@index');

Route::group(['prefix' => 'owners'], function () {
    //put behind the auth middleware
    //need to be logged in to use
    Route::group(['middleware' => 'auth'], function () {
        
        Route::get('/create', 'Owners@create');
        Route::post('/create', 'Owners@createOwner');
        //owner/edit/id
        Route::get('/edit/{owner}', 'Owners@showEdit');
        Route::post('/edit/{owner}', 'Owners@editOwner');
    });
    //don't need to be logged in to view
    Route::get('/', 'Owners@index');
    Route::get('/search', 'Owners@search');
    //show owner/id
    Route::get('/{owner}', 'Owners@show');
    Route::post('/{owner}', 'Owners@addAnimal');
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
