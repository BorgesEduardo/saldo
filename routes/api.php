<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/saldo/create', 'SaldoController@store');
Route::get('/saldo/edit/{id}', 'SaldoController@edit');
Route::post('/saldo/update/{id}', 'SaldoController@update');
Route::delete('/saldo/delete/{id}', 'SaldoController@delete');
Route::get('/saldo', 'SaldoController@index');