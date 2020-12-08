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
/*
 * Perfil
 */
Route::post('perfil/inserir', 'PerfilController@store');
Route::get('perfil', 'PerfilController@index');
Route::get('perfil/list', 'PerfilController@list');
Route::get('perfil/editar/{id}', 'PerfilController@edit');
Route::post('perfil/update/{id}', 'PerfilController@update');

/*
 * Escola
 */
Route::get('escola', 'EscolaController@index');
Route::post('escola/inserir', 'EscolaController@store');
Route::get('escola/list', 'EscolaController@list');
Route::get('escola/editar/{id}', 'EscolaController@edit');
Route::post('escola/update/{id}', 'EscolaController@update');

/*
 * Rede
 */
Route::get('rede', 'RedeController@index');
Route::post('rede/inserir', 'RedeController@store');
Route::get('rede/list', 'RedeController@list');
Route::get('rede/editar/{id}', 'RedeController@edit');
Route::post('rede/update/{id}', 'RedeController@update');

