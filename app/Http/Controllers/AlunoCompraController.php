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
    public function index(Request $request)
    {
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm') {
            $UsuarioEscolas = DB::table('UsuarioEscola')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola', 'Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->get();
        }
        else{
            $UsuarioID = $request->session()->get('UsuarioID');
            $UsuarioEscolas = DB::table('UsuarioEscola')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola', 'Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->where('Usuario.UsuarioID', '=', $UsuarioID)
                ->get();
        }
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
        $alunocompra->AlunoCompraStatus = 1;
        $alunocompra->AlunoCompraQuantidade = request('AlunoCompraQuantidade');

        $alunocompra->save();
        return redirect()->back()
            ->with('status', 'Aluno Comprou com sucesso!');
    }

    public function show()
    {
        $AlunoCompras = new AlunoCompra;
        $AlunoCompras = AlunoCompra::all();
    }

    public function list(Request $request)
    {
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm') {
            $AlunoCompras = DB::table('AlunoCompra')
                ->join('UsuarioEscola', 'AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'AlunoCompra.AlunoCompraID',
                    'AlunoCompra.AlunoCompraQuantidade',
                    'AlunoCompra.AlunoCompraStatus',
                    'AlunoCompra.AlunoCompraDTAtivacao',
                    'AlunoCompra.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->get();
        }
        else{
            $UsuarioID = $request->session()->get('UsuarioID');
            $AlunoCompras = DB::table('AlunoCompra')
                ->join('UsuarioEscola', 'AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'AlunoCompra.AlunoCompraID',
                    'AlunoCompra.AlunoCompraQuantidade',
                    'AlunoCompra.AlunoCompraStatus',
                    'AlunoCompra.AlunoCompraDTAtivacao',
                    'AlunoCompra.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->where('Usuario.UsuarioID', '=', $UsuarioID)
                ->get();
        }
        return view('alunocompra/show', compact('AlunoCompras'));
    }

    public function edit($AlunoCompraID)
    {
        $alunocompra = AlunoCompra::findOrFail($AlunoCompraID);
        $alunocompra['UsuarioEscola'] = DB::table('UsuarioEscola')
        ->join('AlunoCompra','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
        ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'UsuarioEscola.UsuarioID',
            'Usuario.UsuarioNome'
        )
        ->where('AlunoCompra.AlunoCompraID', '=', $AlunoCompraID)
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

        $alunocompra->save();
        return redirect()->back()
            ->with('status', 'Aluno Comprou com sucesso!');

    }

    
}
