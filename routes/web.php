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

// Ligação
Route::get('/ligacoes', 'LigacoesController@index')->name('menuligacoes');
Route::get('/cadligacoes', 'LigacoesController@cadLigacao')->name('cadligacao');
Route::get('/inserirlig', 'LigacoesController@store')->name('inserirlig');
Route::get('/altligacoes', 'LigacoesController@altligacao')->name('altligacao');
Route::get('/alterarlig', 'LigacoesController@update')->name('alterarlig');
Route::get('/delligacoes', 'LigacoesController@destroy')->name('delligacao');


//Cliente
Route::get('/clientes',   'ClienteController@index')->name('menuclientes');
Route::get('/cadclientes','ClienteController@cadcliente')->name('cadcliente');
Route::get('/inserircli', 'ClienteController@store')->name('inserircli');
Route::get('/altcliente','ClienteController@altcliente')->name('altcliente');
Route::get('/alterarcli', 'ClienteController@update')->name('alterarcli');
Route::get('/delclientes','ClienteController@destroy')->name('delcliente');



//Usuarios
Route::get('/usuarios', 'UsuariosController@index')->name('menuusuarios');
Route::get('/cadusuario', 'UsuariosController@cadusuario')->name('cadusuario');
Route::get('/inserirusu', 'UsuariosController@store')->name('inserirusu');
Route::get('/altusuario', 'UsuariosController@altusuario')->name('altusuario');
Route::get('/alterarusu', 'UsuariosController@update')->name('alterarusu');
Route::get('/delusuario', 'UsuariosController@update')->name('delusuario');

//perfil
Route::get('/perfil','UsuariosController@perfil')->name('perfil');
Route::get('/alterarper','UsuariosController@alterarper')->name('alterarper');
});
Auth::routes();
