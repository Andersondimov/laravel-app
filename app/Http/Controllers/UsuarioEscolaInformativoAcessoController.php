<?php

namespace App\Http\Controllers;

use App\UsuarioEscolaInformativoAcesso;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoCreate;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcesoAlter;
use Carbon\Carbon;

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
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = request('UsuarioEscolaInformativoAcesso');

        if(isset($request->UsuarioEscolaInformativoAcessoIDDTAcao) && $request->UsuarioEscolaInformativoAcessoIDDTAcao != '' && $request->UsuarioEscolaInformativoAcessoIDDTAcao) {
            $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = Carbon::createFromFormat('Y-m-d', $request->UsuarioEscolaInformativoAcessoIDDTAcao)->format('d/m/Y');
        }

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
            ->join('UsuarioEscola','UsuarioEscolaInformativoAcesso.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->select(
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoID',
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoIDDTAcao',
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaID',
                'UsuarioEscola.UsuarioID',
                'Usuario.Usuario'
            )
            ->get();
        return view('usuarioescolainformativoacesso/show', compact('UsuarioEscolaInformativoAcessos'));
    }

    public function edit($UsuarioEscolaInformativoAcessoID)
    {
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcesso::findOrFail($UsuarioEscolaInformativoAcessoID);
        $usuarioescolainformativoacesso['UsuarioEscola'] =DB::table('UsuarioEscola')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'Usuario.UsuarioNome',
            'Usuario.Usuario'
        )
        ->get();
        return view('usuarioescolainformativoacesso/editar', compact('usuarioescolainformativoacesso'));        
    }

    public function update(UsuarioEscolaInformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();

        $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;

        $pousuarioescolainformativoacessonto = UsuarioEscolaInformativoAcesso::findOrFail($id);

        $usuarioescolainformativoacesso->UsuarioEscolaID = request('UsuarioEscolaID');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = request('UsuarioEscolaInformativoAcesso');

        if(isset($request->UsuarioEscolaInformativoAcessoIDDTAcao) && $request->UsuarioEscolaInformativoAcessoIDDTAcao != '' && $request->UsuarioEscolaInformativoAcessoIDDTAcao) {
            $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = Carbon::createFromFormat('Y-m-d', $request->UsuarioEscolaInformativoAcessoIDDTAcao)->format('d/m/Y');
        }

        return redirect()->back()
            ->with('status', 'Usuario Escola Informativo Acesso alterado com sucesso!');
    }
}
