<?php

namespace App\Http\Controllers;

use App\UsuarioEscolaInformativoAcesso;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoCreate;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoAlter;

class UsuarioEscolaInformativoAcessoController extends Controller
{
    public function index()
    {
        $UsuarioEscolas =DB::table('UsuarioEscola')
                ->select(
                    'UsuarioEscola.UsuarioID',
                    'UsuarioID.UsuarioNome'
                )
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
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = request('UsuarioEscolaInformativoAcessoIDDTAcao');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = request('UsuarioEscolaInformativoAcesso');
        $usuarioescolainformativoacesso->save();

        return redirect()->back()
            ->with('status', 'UsuarioEscolaInformativoAcesso criado com sucesso!');
    }

    public function show()
    {
        $UsuarioEscolaInformativoAcessos = new UsuarioEscolaInformativoAcesso;
        $UsuarioEscolaInformativoAcessos = UsuarioEscolaInformativoAcesso::all();
    }

    public function list()
    {
        $UsuarioEscolaInformativoAcessos = new UsuarioEscolaInformativoAcesso;
        $UsuarioEscolaInformativoAcessos = UsuarioEscolaInformativoAcesso::get();
        return view('usuarioescolainformativoacesso/show', compact('UsuarioEscolaInformativoAcessos'));
    }

    public function edit($UsuarioEscolaInformativoAcessosID)
    {
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcessos::findOrFail($UsuarioEscolaInformativoAcessosID);
        $usuarioescolainformativoacesso['UsuarioEscola'] = DB::table('UsuarioEscola')
        ->select(
            'UsuarioEscola.UsuarioID',
            'UsuarioID.UsuarioNome'
        )
        ->get();
        return view('usuarioescolainformativoacesso/editar', compact('usuarioescolainformativoacesso'));
    }

    public function update(UsuarioEscolaInformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();

        $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;
        
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcesso::findOrFail($id);
        $usuarioescolainformativoacesso->UsuarioEscolaID = request('UsuarioEscolaID');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = request('UsuarioEscolaInformativoAcesso');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = request('UsuarioEscolaInformativoAcessoIDDTAcao');

        if($usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao == 1)
            $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = date('Y-m-d H:i:s');

        $usuarioescolainformativoacesso->save();
        return redirect()->back()
            ->with('status', 'Informativo Acesso alterado com sucesso!');

    }

    
}
