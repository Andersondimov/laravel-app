<?php

namespace App\Http\Controllers;

use App\PerfilTela;
use Illuminate\Http\Request;

class PerfilTelaController extends Controller
{
    public function index()
    {
        $perfiltela = PerfilTela::orderBy('PerfilTelaDTAtivacao', 'desc')->paginate(10);
        return view('perfiltela/perfiltela', ['perfiltela' => $perfiltela]);
    }

    public function create()
    {
        return view('perfiltela.create');
    }

    public function store(Request $request)
    {
        $perfiltela = new PerfilTela;
        $perfiltela->PerfilTela = $request->PerfilTela;
        $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;
        $perfiltela->save();
        return redirect()->back()
            ->with('status', 'PerfilTela criada com sucesso!');
    }

    public function show()
    {
        $Perfiltelas = new PerfilTela;
        $Perfiltelas = PerfilTela::all();
    }

    public function list()
    {
        $Perfiltelas = new PerfilTela;
        $Perfiltelas = PerfilTela::get();
        return view('perfiltela/show', compact('PerfilTelas'));
    }

    public function edit($PerfilTelaID)
    {
        $perfiltela = PerfilTela::findOrFail($PerfilTelaID);
        return view('perfiltela/editar', compact('perfiltela'));
    }
    
    public function update(Request $request, $id)
    {
        $perfiltela = PerfilTela::findOrFail($id);
        $perfiltela->PerfilTela = $request->PerfilTela;
        $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;

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
