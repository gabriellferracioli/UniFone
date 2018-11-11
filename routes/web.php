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

Route::get('/', function () {
    return view('auth.login');
});

$this->group(['middleware' => 'auth'], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clientes', 'ClienteController@index')->name('menuclientes');
Route::get('/ligacoes', 'LigacoesController@index')->name('menuligacoes');
Route::get('/cadligacoes', 'LigacoesController@cadLigacao')->name('cadligacao');
Route::get('/usuarios', 'UsuariosController@index')->name('menuusuarios');
});
Auth::routes();


