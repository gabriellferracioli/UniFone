<?php

use Illuminate\Http\Request;

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

Route::get('/carregainfocli/{id}','LigacoesController@carregainfocli')->name('carregainfocli');
Route::get('/carregainfolig/{id}', 'LigacoesController@carregainfolig')->name('carregainfolig');
Route::get('/carregainfousu/{id}', 'UsuariosController@carregainfousu')->name('carregainfousu');