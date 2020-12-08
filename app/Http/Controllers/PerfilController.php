<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $perfil = Perfil::orderBy('PerfilDTAtivacao', 'desc')->paginate(10);
        return view('perfil/perfil', ['perfil' => $perfil]);
    }

    public function create()
    {
        return view('perfil.create');
    }

    public function store(Request $request)
    {
        $perfil = new Perfil;
        $perfil->Perfil = $request->Perfil;
        $perfil->PerfilCod = $request->PerfilCod;
        $perfil->PerfilStatus = $request->PerfilStatus;
        $perfil->save();
        return redirect()->back()
            ->with('status', 'Perfil criada com sucesso!');
    }

    public function show()
    {
        $Perfils = new Perfil;
        $Perfils = Perfil::all();
    }

    public function list()
    {
        $Perfils = new Perfil;
        $Perfils = Perfil::get();
        return view('perfil/show', compact('Perfils'));
    }

    public function edit($PerfilID)
    {
        $perfil = Perfil::findOrFail($PerfilID);
        return view('perfil/editar', compact('perfil'));
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->Perfil = $request->Perfil;
        $perfil->PerfilCod = $request->PerfilCod;
        $perfil->PerfilStatus = $request->PerfilStatus;

        if($perfil->PerfilStatus == 2)
            $perfil->PerfilDTInativacao = date('Y-m-d H:i:s');

        if($perfil->PerfilStatus == 3)
            $perfil->PerfilDTBloqueio = date('Y-m-d H:i:s');

        $perfil->save();
        return redirect()->back()
            ->with('status', 'Perfil alterada com sucesso!');

    }

    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        return redirect()->route('perfil.index')->with('alert-success', 'Perfil deletada com sucesso!');
    }
}
