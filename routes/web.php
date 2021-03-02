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
* EventoEscola
 */
Route::get('eventoescola/eventofaixa/faixaslist/{id}/{action}', 'EventoEscolaController@eventofaixalist');
Route::post('eventoescola/eventofaixa/faixagravarimport/{id}', 'EventoEscolaController@faixagravarimport');
Route::post('eventoescola/eventofaixa/faixagravarmanual/{id}', 'EventoEscolaController@faixagravarmanual');
Route::post('eventoescola/eventofaixa/faixagravar/{id}', 'EventoEscolaController@faixagravar');
Route::get('eventoescola/eventofaixa/faixanew/{id}', 'EventoEscolaController@faixanew');
Route::get('eventoescola', 'EventoEscolaController@index');
Route::post('eventoescola/inserir', 'EventoEscolaController@store');
Route::get('eventoescola/list', 'EventoEscolaController@list');
Route::get('eventoescola/editar/{id}', 'EventoEscolaController@edit');
Route::post('eventoescola/update/{id}', 'EventoEscolaController@update');
Route::get('eventoescola/eventofaixa/{id}', 'EventoEscolaController@eventofaixa');
Route::get('eventoescola/eventofaixa/RepasseForm/{id}/{action}', 'EventoEscolaController@RepasseForm');

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
* UsuarioEscolaInformativoAcesso ( Tela Separada )
 */

Route::post('usuarioescolainformativoacesso/inserir', 'UsuarioEscolaInformativoAcessoController@store');
Route::get('usuarioescolainformativoacesso', 'UsuarioEscolaInformativoAcessoController@index');
Route::get('usuarioescolainformativoacesso/list', 'UsuarioEscolaInformativoAcessoController@list');
Route::get('usuarioescolainformativoacesso/editar/{id}', 'UsuarioEscolaInformativoAcessoController@edit');
Route::post('usuarioescolainformativoacesso/update/{id}', 'UsuarioEscolaInformativoAcessoController@update');

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
 * Tela
 */
Route::post('tela/inserir', 'TelaController@store');
Route::get('tela', 'TelaController@index');
Route::get('tela/list', 'TelaController@list');
Route::get('tela/editar/{id}', 'TelaController@edit');
Route::post('tela/update/{id}', 'TelaController@update');

/*
* InformativoAcesso
 */
Route::post('informativoacesso/inserir', 'InformativoAcessoController@store');
Route::get('informativoacesso', 'InformativoAcessoController@index');
Route::get('informativoacesso/list', 'InformativoAcessoController@list');
Route::get('informativoacesso/editar/{id}', 'InformativoAcessoController@edit');
Route::post('informativoacesso/update/{id}', 'InformativoAcessoController@update')->name('informativoacesso.update');

/*
* Evento
 */
Route::post('evento/inserir', 'EventoController@store');
Route::get('evento', 'EventoController@index');
Route::get('evento/list', 'EventoController@list');
Route::get('evento/editar/{id}', 'EventoController@edit');
Route::post('evento/update/{id}', 'EventoController@update');

/*
* Usuario
 */
Route::post('usuario/inserir', 'UsuarioController@store');
Route::get('usuario', 'UsuarioController@index');
Route::get('usuario/list', 'UsuarioController@list');
Route::get('usuario/editar/{id}', 'UsuarioController@edit');
Route::get('usuario/editaraluno/{id}', 'UsuarioController@editaraluno');
Route::post('usuario/updatealuno/{id}', 'UsuarioController@updatealuno');
Route::post('usuario/update/{id}', 'UsuarioController@update');

/*
 * Perfil
 */
Route::post('perfil/inserir', 'PerfilController@store');
Route::get('perfil', 'PerfilController@index');
Route::get('perfil/list', 'PerfilController@list');
Route::get('perfil/editar/{id}', 'PerfilController@edit');
Route::post('perfil/update/{id}', 'PerfilController@update');

/*
 * Traducao
 */
Route::post('traducao/inserir', 'TraducaoController@store');
Route::get('traducao', 'TraducaoController@index');
Route::get('traducao/list', 'TraducaoController@list');
Route::get('traducao/editar/{id}', 'TraducaoController@edit');
Route::post('traducao/update/{id}', 'TraducaoController@update');

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

