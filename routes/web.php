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

Route::get('/', function () {
    return view('welcome');
});

Route::get('rede', 'RedeController@index');
Route::post('rede/inserir', 'RedeController@store');
Route::get('rede/list', 'RedeController@list');
Route::get('rede/editar/{id}', 'RedeController@edit');
Route::post('rede/update/{id}', 'RedeController@update');

