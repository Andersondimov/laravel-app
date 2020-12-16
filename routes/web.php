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
* AlunoCompra
 */
Route::post('alunocompra/inserir', 'AlunoCompraController@store');
Route::get('alunocompra', 'AlunoCompraController@index');
Route::get('alunocompra/list', 'AlunoCompraController@list');
Route::get('alunocompra/editar/{id}', 'AlunoCompraController@edit');
Route::post('alunocompra/update/{id}', 'AlunoCompraController@update');

/*
* Ponto
 */
Route::post('ponto/inserir', 'PontoController@store');
Route::get('ponto', 'PontoController@index');
Route::get('ponto/list', 'PontoController@list');
Route::get('ponto/editar/{id}', 'PontoController@edit');
Route::post('ponto/update/{id}', 'PontoController@update');

/*
* Evento
 */
Route::post('evento/inserir', 'EventoController@store');
Route::get('evento', 'EventoController@index');
Route::get('evento/list', 'EventoController@list');
Route::get('evento/editar/{id}', 'EventoController@edit');
Route::post('evento/update/{id}', 'EventoController@update');

/*
* UsuarioEscola
 */
Route::post('usuarioescola/inserir', 'UsuarioEscolaController@store');
Route::get('usuarioescola', 'UsuarioEscolaController@index');
Route::get('usuarioescola/list', 'UsuarioEscolaController@list');
Route::get('usuarioescola/editar/{id}', 'UsuarioEscolaController@edit');
Route::post('usuarioescola/update/{id}', 'UsuarioEscolaController@update');

/*
 * PerfilTela
 */
Route::post('perfiltela/inserir', 'PerfilTelaController@store');
Route::get('perfiltela', 'PerfilTelaController@index');
Route::get('perfiltela/list', 'PerfilTelaController@list');
Route::get('perfiltela/editar/{id}', 'PerfilTelaController@edit');
Route::post('perfiltela/update/{id}', 'PerfilTelaController@update');

/*
* InformativoAcesso
 */
Route::post('informativoacesso/inserir', 'InformativoAcessoController@store');
Route::get('informativoacesso', 'InformativoAcessoController@index');
Route::get('informativoacesso/list', 'InformativoAcessoController@list');
Route::get('informativoacesso/editar/{id}', 'InformativoAcessoController@edit');
Route::post('informativoacesso/update/{id}', 'InformativoAcessoController@update')->name('informativoacesso.update');


/*
* Usuario
 */
Route::post('usuario/inserir', 'UsuarioController@store');
Route::get('usuario', 'UsuarioController@index');
Route::get('usuario/list', 'UsuarioController@list');
Route::get('usuario/editar/{id}', 'UsuarioController@edit');
Route::post('usuario/update/{id}', 'UsuarioController@update');


/*
 * Tela
 */
Route::post('tela/inserir', 'TelaController@store');
Route::get('tela', 'TelaController@index');
Route::get('tela/list', 'TelaController@list');
Route::get('tela/editar/{id}', 'TelaController@edit');
Route::post('tela/update/{id}', 'TelaController@update');


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
Route::get('escola/editarparams/{id}', 'EscolaController@editarparams');
Route::post('escola/updateparams/{id}', 'EscolaController@updateparams');
Route::post('escola/update/{id}', 'EscolaController@update');

/*
 * Rede
 */
Route::get('rede', 'RedeController@index');
Route::post('rede/inserir', 'RedeController@store');
Route::get('rede/list', 'RedeController@list');
Route::get('rede/editar/{id}', 'RedeController@edit');
Route::post('rede/update/{id}', 'RedeController@update');

