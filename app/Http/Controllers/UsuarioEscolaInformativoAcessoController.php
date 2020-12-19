<?php

namespace App\Http\Controllers;

use App\UsuarioEscolaInformativoAcesso;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoCreate;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoAlter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class UsuarioEscolaInformativoAcessoController extends Controller
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
        return view('usuarioescolainformativoacesso/usuarioescolainformativoacesso', compact('UsuarioEscolas'));
    }

    public function create()
    {
        return view('usuarioescolainformativoacesso.create');
    }

    public function store(UsuarioEscolaInformativoAcessoCreate $request)
    {
        $validated = $request->validated();

        $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;
        $usuarioescolainformativoacesso->UsuarioEscolaID = request('UsuarioEscolaID');
      
        $usuarioescolainformativoacesso->save();

        return redirect()->back()
            ->with('status', 'Usuario Escola Informativo Acesso criado com sucesso!');
    }

    public function show()
    {
        $UsuarioEscolaInformativoAcessos = new UsuarioEscolaInformativoAcesso;
        $UsuarioEscolaInformativoAcessos = UsuarioEscolaInformativoAcesso::all();
    }

    public function list()
    {
        $UsuarioEscolaInformativoAcessos =DB::table('UsuarioEscolaInformativoAcesso')
                ->join('UsuarioEscola','Ponto.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->select(
                    'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoID',
                    'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
                    'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoIDDTAtivacao',
                    'usuarioescolainformativoacesso.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Escola.Escola'
                )
                ->get();
        return view('usuarioescolainformativoacesso/show', compact('UsuarioEscolaInformativoAcessoss'));
    }

    public function edit($UsuarioEscolaInformativoAcessosID)
    {
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcesso::findOrFail($UsuarioEscolaInformativoAcessosID);
        $usuarioescolainformativoacesso['UsuarioEscola'] = DB::table('UsuarioEscola')
        ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'Usuario.UsuarioNome',
            'Escola.Escola'
            
        )
        ->get();
        return view('usuarioescolainformativoacesso/editar', compact('usuarioescolainformativoacesso'));
    }

    public function update(UsuarioEscolaInformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();

        $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcessos;
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcessos::findOrFail($id);
        $usuarioescolainformativoacesso->UsuarioEscolaID = request('UsuarioEscola');  
        
        if(isset($request->UsuarioEscolaInformativoAcessoIDDTAtivacao) && $request->UsuarioEscolaInformativoAcessoIDDTAtivacao != '' && $request->UsuarioEscolaInformativoAcessoIDDTAtivacao) {
            $escola->UsuarioEscolaInformativoAcessoIDDTAtivacao = Carbon::createFromFormat('Y-m-d', $request->UsuarioEscolaInformativoAcessoIDDTAtivacao)->format('d/m/Y');
        }
        
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAtivacao = request('UsuarioEscolaInformativoAcessoIDDTAtivacao');

        $usuarioescolainformativoacesso->save();
        return redirect()->back()
            ->with('status', 'Usuario Escola Informativo Acesso alterado com sucesso!');

    }
}
