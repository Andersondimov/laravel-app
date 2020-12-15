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
            ->with('status', 'Telas relacionadas com o perfil com sucesso!');
        
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
        ->join('Usuario','UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioNome')
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
        $PerfilTelas[] =DB::table('UsuarioEscola')
        ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Usuario','UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioNome')
        ->where('Escola.EscolaID', $UsuarioEscolaID)
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'Usuario.UsuarioID',
            'UsuarioEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();
        $UsuarioEscolas['Usuarios'] =DB::table('Usuario')
                ->select(
                    'Usuario.UsuarioNome',
                    'Usuario.UsuarioID'
                )
                ->get();
        return view('usuarioescola/editar', compact('UsuarioEscolas'));
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
        return redirect()->action('UsuarioEscolaController@list');
    }

    public function destroy($id)
    {
        $usuarioescola = UsuarioEscola::findOrFail($id);
        $usuarioescola->delete();
        return redirect()->route('usuarioescola.index')->with('alert-success', 'PerfilTela deletada com sucesso!');
    }
}