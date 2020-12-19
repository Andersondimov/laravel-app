<?php

namespace App\Http\Controllers;

use App\UsuarioEscola;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscola\UsuarioEscolaCreate;
use App\Http\Requests\UsuarioEscola\UsuarioEscolaAlter;


class UsuarioEscolaController extends Controller
{
    public function index()
    {
        $Dados = new UsuarioEscola;
        $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->get();
        $Dados->UsuarioNome =DB::table('Usuario')
                ->select(   
                    'Usuario.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->get();
        
        return view('usuarioescola/usuarioescola', compact('Dados'));

    }

    public function create()
    {
        return view('UsuarioEscola.create');
    }

    public function store(UsuarioEscolaCreate $request)
    {
        $validated = $request->validated();

        foreach($request->UsuarioNome as $usuarioID){
            $usuarioescola = new UsuarioEscola;
            $usuarioescola->UsuarioEscolaStatus = $request->UsuarioEscolaStatus;
            $usuarioescola->UsuarioID = $usuarioID;
            $usuarioescola->EscolaID = $request->EscolaID;

            $usuarioescola->save();
        }
        return redirect()->back()
            ->with('status', 'Usuários relacionados a escola com sucesso!');
        
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $UsuarioEscolas =DB::table('UsuarioEscola')
                ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaStatus',
                    'UsuarioEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','UsuarioEscola.EscolaID', 'UsuarioEscola.UsuarioEscolaStatus')
                ->get();
        return view('usuarioescola/show', compact('UsuarioEscolas'));
    }

    public function edit($UsuarioEscolaID)
    {
        $UsuarioEscolas['IDS'] =DB::table('UsuarioEscola')
        ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
        ->where('Escola.EscolaID', $UsuarioEscolaID)
        ->select(
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'UsuarioEscola.EscolaID',
            'Escola.Escola'
        )->groupby(
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'UsuarioEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();

        $UsuarioEscolas[] =DB::table('UsuarioEscola')
        ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Usuario','UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
        ->where('Escola.EscolaID', $UsuarioEscolaID)
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'UsuarioEscola.EscolaID',
            'Escola.Escola',
            'Usuario.UsuarioID',
            'Usuario.UsuarioNome'
        )
        ->get();
        $UsuarioEscolas['Usuarios'] =DB::table('Usuario')
                ->select(
                    'Usuario.UsuarioNome',
                    'Usuario.UsuarioID'
                )
                ->get();
        return view('usuarioescola/editar', compact('UsuarioEscolas'));

        $PerfilTelas['IDS'] =DB::table('PerfilTela')
        ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
        ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
        ->where('Perfil.PerfilID', $PerfilTelaID)
        ->select(
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )->groupby(
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        $PerfilTelas[] =DB::table('PerfilTela')
        ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
        ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
        ->where('Perfil.PerfilID', $PerfilTelaID)
        ->select(
            'PerfilTela.PerfilTelaID',
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'Tela.TelaID',
            'Tela.Tela',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        $PerfilTelas['Telas'] =DB::table('Tela')
                ->select(
                    'Tela.TelaID',
                    'Tela.Tela'
                )
                ->get();
        return view('perfiltela/editar', compact('PerfilTelas'));
    }

    public function update(UsuarioEscolaAlter $request, $id)
    {
        $validated = $request->validated();

        DB::table('UsuarioEscola')->where('EscolaID', $id)->delete();

        if(isset($request->UsuarioID) && count($request->UsuarioID) > 0){
            foreach($request->UsuarioID as $usuarioID){
                $usuarioescola = new UsuarioEscola;
                $usuarioescola->UsuarioEscolaStatus = $request->UsuarioEscolaStatus;
                $usuarioescola->UsuarioID = $usuarioID;
                $usuarioescola->EscolaID = $id;

                $usuarioescola->save();
            }
        }
        return redirect()->action('UsuarioEscolaController@list')
            ->with('status', 'Usuários relacionados a escola com sucesso!');
    }

    public function destroy($id)
    {
        $usuarioescola = UsuarioEscola::findOrFail($id);
        $usuarioescola->delete();
        return redirect()->route('usuarioescola.index')->with('alert-success', 'PerfilTela deletada com sucesso!');
    }
}