<?php

namespace App\Http\Controllers;

use App\PerfilTela;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilTela\PerfilTelaCreate;
use App\Http\Requests\PerfilTela\PerfilTelaAlter;


class PerfilTelaController extends Controller
{
    public function index()
    {
        $Perfils =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->get();
        return view('perfiltela/perfiltela', compact('Perfils'));

        $Telas =DB::table('Tela')
                ->select(
                    'Tela.TelaID',
                    'Tela.Tela'
                )
                ->get();
        return view('perfiltela/perfiltela', compact('Telas'));
    }

    public function create()
    {
        return view('perfiltela.create');
    }

    public function store(PerfilTelaCreate $request)
    {
        $validated = $request->validated();
        $perfiltela = new PerfilTela;
        $perfiltela->PerfilTela = $request->PerfilTela;
        $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;
        
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $PerfilTelas =DB::table('PerfilTela')
                ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
                ->select(
                    'PerfilTela.PerfilTelaID',
                    'PerfilTela.PerfilTelaStatus',
                    'PerfilTela.PerfilTelaDTAtivacao',
                    'PerfilTela.PerfilTelaDTInativacao',
                    'PerfilTela.PerfilTelaDTBloqueio',
                    'PerfilTela.PerfilID',
                    'Perfil.Perfil'
                )
                ->get();
        return view('perfiltela/show', compact('PerfilTelas'));

        $PerfilTelas =DB::table('PerfilTela')
                ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
                ->select(
                    'PerfilTela.PerfilTelaID',
                    'PerfilTela.PerfilTelaStatus',
                    'PerfilTela.PerfilTelaDTAtivacao',
                    'PerfilTela.PerfilTelaDTInativacao',
                    'PerfilTela.PerfilTelaDTBloqueio',
                    'PerfilTela.TelaID',
                    'Tela.Tela'
                )
                ->get();
        return view('perfiltela/show', compact('PerfilTelas'));
    }

    public function edit($PerfilTelaID)
    {
        $perfiltela = PerfilTela::findOrFail($ID);
        $perfiltela->PerfilTelaID = $request->PerfilTelaID;
        $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;
        
        $escola['Perfil'] = DB::table('Perfil')
        ->select(
            'Perfil.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        return view('perfiltela/editar', compact('perfiltela'));

        $perfiltela = PerfilTela::findOrFail($ID);
        $perfiltela->PerfilTelaID = $request->PerfilTelaID;
        $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;

        $escola['Tela'] = DB::table('Tela')
        ->select(
            'Tela.TelaID',
            'Tela.Tela'
        )
        ->get();
        return view('perfiltela/editar', compact('perfiltela'));
    }

    public function update(PerfilTelaAlter $request, $id)
    {
        $validated = $request->validated();
        $perfiltela = PerfilTela::findOrFail($id);
        $perfiltela->PerfilTela = $request->PerfilTela;
        $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;
        
        $perfiltela->PerfilID = $request->PerfilID;
        $perfiltela->TelaID = $request->TelaID;

        if($perfiltela->PerfilTelaStatus == 1)
            $perfiltela->PerfilTelaDTAtivacao = date('Y-m-d H:i:s');

        if($perfiltela->PerfilTelaStatus == 2)
            $perfiltela->PerfilTelaDTInativacao = date('Y-m-d H:i:s');

        if($perfiltela->PerfilTelaStatus == 3)
            $perfiltela->PerfilTelaDTBloqueio = date('Y-m-d H:i:s');

        $perfiltela->save();
        return redirect()->back()
            ->with('status', 'PerfilTela alterada com sucesso!');

    }

    public function destroy($id)
    {
        $perfiltela = PerfilTela::findOrFail($id);
        $perfiltela->delete();
        return redirect()->route('perfiltela.index')->with('alert-success', 'PerfilTela deletada com sucesso!');
    }
}
