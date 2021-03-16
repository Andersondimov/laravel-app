<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;

class AlunoCarteiraController extends Controller
{
    public function index()
    {
        $AlunoCarteiraRecebido =DB::table('PontoRecebido')
            ->join('UsuarioEscola','PontoRecebido.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("Concat('Recebido') as Action")
                ,'Usuario.UsuarioNome as Nome'
                ,'PontoRecebido.PontoRecebidoQuantidade as QTD'
                ,'PontoRecebido.PontoRecebidoDTAtivacao as DT'

            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('PontoRecebido.PontoRecebidoStatus',1);

        $AlunoCarteira =DB::table('AlunoCompra')
            ->join('UsuarioEscola','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("Concat('Compra') as Action")
                ,'Usuario.UsuarioNome as Nome'
                ,'AlunoCompra.AlunoCompraQuantidade as QTD'
                ,'AlunoCompra.AlunoCompraDTAtivacao as DT'
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('AlunoCompra.AlunoCompraStatus',1)
            ->union($AlunoCarteiraRecebido)
            ->orderby('DT', 'DESC')
            ->get();

        $AlunoCarteiraRecSum =DB::table('PontoRecebido')
            ->join('UsuarioEscola','PontoRecebido.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->select(
                DB::raw("coalesce(SUM(PontoRecebido.PontoRecebidoQuantidade),0) as qtd")
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('PontoRecebido.PontoRecebidoStatus',1)
            ->get();

        $AlunoCarteiraComSum =DB::table('AlunoCompra')
            ->join('UsuarioEscola','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->select(
                DB::raw("coalesce(SUM(AlunoCompra.AlunoCompraQuantidade),0) as qtd")
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('AlunoCompra.AlunoCompraStatus',1)
            ->get();

        $AlunoCarteiraTot = (int)$AlunoCarteiraRecSum[0]->qtd - (int)$AlunoCarteiraComSum[0]->qtd;

        return view('carteira/alunocarteira', compact('AlunoCarteira','AlunoCarteiraTot'));
    }



    
}
