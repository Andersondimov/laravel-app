<?php

namespace App\Http\Controllers;

use App\AlunoCompra;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoCompra\AlunoCompraCreate;
use App\Http\Requests\AlunoCompra\AlunoCompraAlter;
use Carbon\Carbon;

class AlunoCompraController extends Controller
{
    public function index()
    {
        $UsuarioEscolas =DB::table('UsuarioEscola')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID'
                )
                ->get();
        return view('alunocompra/alunocompra', compact('UsuarioEscolas'));
    }

    public function create()
    {
        return view('alunocompra.create');
    }

    public function store(AlunoCompraCreate $request)
    {
        $validated = $request->validated();

        $alunocompra = new AlunoCompra;
        $alunocompra->UsuarioEscolaID = request('UsuarioEscolaID');
        $alunocompra->AlunoCompraQuantidade = request('AlunoCompraQuantidade');
        
        $alunocompra->AlunoCompraStatus = request('AlunoCompraStatus');
        $alunocompra->save();

        return redirect()->back()
            ->with('status', 'Aluno Comprou com sucesso!');
    }

    public function show()
    {
        $AlunoCompras = new AlunoCompra;
        $AlunoCompras = AlunoCompra::all();
    }

    public function list()
    {
        $AlunoCompras =DB::table('AlunoCompra')
                ->join('UsuarioEscola','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->select(
                    'AlunoCompra.AlunoCompraID',
                    'AlunoCompra.AlunoCompraQuantidade',
                    'AlunoCompra.AlunoCompraStatus',
                    'AlunoCompra.AlunoCompraDTAtivacao',
                    'AlunoCompra.AlunoCompraDTInativacao',
                    'AlunoCompra.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID'
                )
                ->get();
        return view('alunocompra/show', compact('AlunoCompras'));
    }

    public function edit($AlunoCompraID)
    {
        $alunocompra = AlunoCompra::findOrFail($AlunoCompraID);
        $alunocompra['UsuarioEscola'] = DB::table('UsuarioEscola')
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'UsuarioEscola.UsuarioID'
        )
        ->get();
        return view('alunocompra/editar', compact('alunocompra'));
    }

    public function update(AlunoCompraAlter $request, $id)
    {
        $validated = $request->validated();

        $alunocompra = new AlunoCompra;
        
        $alunocompra = AlunoCompra::findOrFail($id);

        $alunocompra->UsuarioEscolaID = request('UsuarioEscolaID');
        $alunocompra->AlunoCompraQuantidade = request('AlunoCompraQuantidade');
        
        $alunocompra->AlunoCompraStatus = request('AlunoCompraStatus');

        if($alunocompra->AlunoCompraStatus == 1)
            $alunocompra->AlunoCompraDTAtivacao = date('Y-m-d H:i:s');

        if($alunocompra->AlunoCompraStatus == 2)
            $alunocompra->AlunoCompraDTInativacao = date('Y-m-d H:i:s');

        $alunocompra->save();
        return redirect()->back()
            ->with('status', 'Aluno Comprou com sucesso!');

    }

    
}
