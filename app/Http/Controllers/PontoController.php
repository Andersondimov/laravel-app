<?php

namespace App\Http\Controllers;

use App\Ponto;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Ponto\PontoCreate;
use App\Http\Requests\Ponto\PontoAlter;

class PontoController extends Controller
{
    public function index()
    {
        $UsuarioEscolas =DB::table('UsuarioEscola')
                ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'Usuario.UsuarioNome',
                    'Escola.Escola'
                )
                ->where('Perfil.PerfilCod', '!=', 'al')
                ->orderby('Escola.Escola', 'ASC')
                ->get();
        return view('ponto/ponto', compact('UsuarioEscolas'));
    }

    public function create()
    {
        return view('ponto.create');
    }

    public function store(PontoCreate $request)
    {
        $validated = $request->validated();

        $ponto = new Ponto;
        $ponto->UsuarioEscolaID = request('UsuarioEscolaID');
        $ponto->PontoQuantidade = request('PontoQuantidade');
        $ponto->PontoOperacao = request('PontoOperacao');

//        $ponto->PontoStatus = request('PontoStatus');
        $ponto->save();

        return redirect()->back()
            ->with('status', 'Ponto criado com sucesso!');
    }

    public function show()
    {
        $Pontos = new Ponto;
        $Pontos = Ponto::all();
    }

    public function list()
    {
        $Pontos =DB::table('Ponto')
                ->join('UsuarioEscola','Ponto.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->select(
                    'Ponto.PontoID',
                    'Ponto.PontoQuantidade',
                    'Ponto.PontoStatus',
                    'Ponto.PontoDTAtivacao',
                    'Ponto.PontoDTInativacao',
                    'Ponto.PontoDTBloqueio',
                    'Ponto.PontoOperacao',
                    'Ponto.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Escola.Escola'
                )
                ->get();
        return view('ponto/show', compact('Pontos'));
    }

    public function edit($PontoID)
    {
        $ponto = Ponto::findOrFail($PontoID);
        $ponto['UsuarioEscola'] = DB::table('UsuarioEscola')
        ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')

        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'Usuario.UsuarioNome',
            'Escola.Escola'
            
        )
        ->where('Perfil.PerfilCod', '!=', 'al')
        ->get();
        return view('ponto/editar', compact('ponto'));
    }

    public function update(PontoAlter $request, $id)
    {
        $validated = $request->validated();

        $ponto = new Ponto;
        
        $ponto = Ponto::findOrFail($id);

        $ponto->UsuarioEscolaID = request('UsuarioEscolaID');
        $ponto->PontoQuantidade = request('PontoQuantidade');
        
        
        $ponto->PontoStatus = request('PontoStatus');

        if($ponto->PontoStatus == 1)
            $ponto->PontoDTAtivacao = date('Y-m-d H:i:s');

        if($ponto->PontoStatus == 2)
            $ponto->PontoDTInativacao = date('Y-m-d H:i:s');

        if($ponto->PontoStatus == 3)
            $ponto->PontoDTBloqueio = date('Y-m-d H:i:s');

        $ponto->save();
        return redirect()->back()
            ->with('status', 'Ponto alterado com sucesso!');

    }

    
}
