<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Owners;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/owners', 'API\\Owners@index')->middleware('auth:api');
Route::get('/owners/{owner}', 'API\\Owners@show')->middleware('auth:api');

Route::delete('/owners/{owner}', 'API\\Owners@destroy')->middleware('auth:api');

Route::post('/owners', 'API\\Owners@store')->middleware('auth:api');

Route::put('/owners/{owner}', 'API\\Owners@update')->middleware('auth:api');

Route::get('/animals', 'API\\Animals@index')->middleware('auth:api');
Route::get('/animals/{animal}', 'API\\Animals@show')->middleware('auth:api');

Route::delete('/animals/{animal}', 'API\\Animals@destroy')->middleware('auth:api');

Route::post('/animals', 'API\\Animals@store')->middleware('auth:api');

Route::put('/animals/{animal}', 'API\\Animals@update')->middleware('auth:api');

Route::get('/owners/{owner}/animals', 'API\\Owners\\Animals@show')->middleware('auth:api');
Route::post('/owners/{owner}/animals', 'API\\Owners\\Animals@store')->middleware('auth:api');
