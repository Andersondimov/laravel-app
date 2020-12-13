<?php

namespace App\Http\Controllers;

use App\UsuarioEscola;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscola\UsuarioEscolaCreate;
use App\Http\Requests\UsuarioEscola\UsuarioEscolaAlter;

class UsuarioEscolaController extends Controller
{
    public function index()
    {
        $usuarioescola = UsuarioEscola::orderBy('UsuarioEscolaDTAtivacao', 'desc')->paginate(10);
        return view('usuarioescola/usuarioescola', ['usuarioescola' => $usuarioescola]);
    }

    public function create()
    {
        return view('usuarioescola.create');
    }

    public function store(UsuarioEscolaCreate $request)
    {
        $validated = $request->validated();

        $usuarioescola = new UsuarioEscola;
        $usuarioescola->UsuarioEscola = $request->UsuarioEscola;
        $usuarioescola->UsuarioEscolaStatus = $request->UsuarioEscolaStatus;
        $usuarioescola->UsuarioEscolaDTAtivacao = $request->UsuarioEscolaDTAtivacao;
        $usuarioescola->UsuarioEscolaDTInativacao = $request->UsuarioEscolaDTInativacao;
        $usuarioescola->UsuarioEscolaDTBloqueio = $request->UsuarioEscolaDTBloqueio;
        
        $usuarioescola->save();
        return redirect()->back()
            ->with('status', 'Usuario Escola criado com sucesso!');
    }

    public function show()
    {
        $UsuarioEscolas = new UsuarioEscola;
        $UsuarioEscolas = UsuarioEscola::all();
    }

    public function list()
    {
        $UsuarioEscolas = new UsuarioEscola;
        $UsuarioEscolas = UsuarioEscola::get();
        return view('usuarioescola/show', compact('UsuarioEscolas'));
    }

    public function edit($UsuarioEscolaID)
    {
        $usuarioescola = UsuarioEscola::findOrFail($UsuarioEscolaID);
        return view('usuarioescola/editar', compact('usuarioescola'));
    }

    public function update(UsuarioEscolaAlter $request, $id)
    {
        $validated = $request->validated();

        $usuarioescola = UsuarioEscola::findOrFail($id);
        $usuarioescola->UsuarioEscola = $request->UsuarioEscola;
        $usuarioescola->UsuarioEscolaStatus = $request->UsuarioEscolaStatus;
        $usuarioescola->UsuarioEscolaDTAtivacao = $request->UsuarioEscolaDTAtivacao;
        $usuarioescola->UsuarioEscolaDTInativacao = $request->UsuarioEscolaDTInativacao;
        $usuarioescola->UsuarioEscolaDTBloqueio = $request->UsuarioEscolaDTBloqueio;

        if($usuarioescola->UsuarioEscolaStatus == 1)
            $usuarioescola->UsuarioEscolaDTAtivacao = date('Y-m-d H:i:s');

        if($usuarioescola->UsuarioEscolaStatus == 2)
            $usuarioescola->UsuarioEscolaDTInativacao = date('Y-m-d H:i:s');

        if($usuarioescola->UsuarioEscolaStatus == 3)
            $usuarioescola->UsuarioEscolaDTBloqueio = date('Y-m-d H:i:s');

        $usuarioescola->save();
        return redirect()->back()
            ->with('status', 'Usuario Escola alterado com sucesso!');

    }

    public function destroy($id)
    {
        $usuarioescola = UsuarioEscola::findOrFail($id);
        $usuarioescola->delete();
        return redirect()->route('usuarioescola.index')->with('alert-success', 'Usuario Escola deletado com sucesso!');
    }
}