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

Route::get('/owners', 'API\\Owners@index');
Route::get('/owners/{owner}', 'API\\Owners@show');

Route::delete('/owners/{owner}', 'API\\Owners@destroy');

Route::post('/owners', 'API\\Owners@store');

Route::put('/owners/{owner}', 'API\\Owners@update');

Route::get('/animals', 'API\\Animals@index');
Route::get('/animals/{animal}', 'API\\Animals@show');

Route::delete('/animals/{animal}', 'API\\Animals@destroy');

Route::post('/animals', 'API\\Animals@store');

Route::put('/animals/{animal}', 'API\\Animals@update');

Route::get('/owners/{owner}/animals', 'API\\Owners\\Animals@show');
Route::post('/owners/{owner}/animals', 'API\\Owners\\Animals@store');
