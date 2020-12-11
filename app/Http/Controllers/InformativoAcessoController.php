<?php

namespace App\Http\Controllers;

use App\InformativoAcesso;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\InformativoAcesso\InformativoAcessoCreate;
use App\Http\Requests\InformativoAcesso\InformativoAcessoAlter;

class InformativoAcessoController extends Controller
{
    public function index()
    {
        $Perfis =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->get();
        return view('informativoacesso/informativoacesso', compact('Escolas'));
    }

    public function create()
    {
        return view('informativoacesso.create');
    }

    public function store(InformativoAcessoCreate $request)
    {
        $validated = $request->validated();

        $informativoacesso = new InformativoAcesso;
        $informativoacesso->EscolaID = request('EscolaID');
        $informativoacesso->InformativoAcessoDTIni = request('InformativoAcessoDTIni');
        $informativoacesso->InformativoAcessoDTFim = sha1(request('InformativoAcessoDTFim'));
        
    }

    public function show()
    {
        $InformativoAcessos = new InformativoAcesso;
        $InformativoAcessos = InformativoAcesso::all();
    }

    public function list()
    {
        $Usuarios =DB::table('InformativoAcesso')
                ->join('Escola','InformativoAcesso.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'InformativoAcesso.InformativoAcessoID',
                    'InformativoAcesso.InformativoAcessoDTIni',
                    'InformativoAcesso.InformativoAcessoDTFim',
                    'InformativoAcesso.EscolaID',
                    'Escola.Escola'
                )
                ->get();
        return view('InformativoAcesso/show', compact('InformativoAcessos'));
    }

    public function edit($InformativoAcessoID)
    {
        $informativoacesso = InformativoAcesso::findOrFail($InformativoAcessoID);
        $informativoacesso['Escola'] = DB::table('Escola')
        ->select(
            'Escola.EscolaID',
            'Escola.Escola'
        )
        ->get();
        return view('informativoacesso/editar', compact('informativoacesso'));
    }

    public function update(InformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();

        $informativoacesso = new InformativoAcesso;
        
        $informativoacesso = InformativoAcesso::findOrFail($id);

        $informativoacesso->EscolaID = request('EscolaID');
        $informativoacesso->InformativoAcessoDTIni = request('InformativoAcessoDTIni');
        if(isset($request->InformativoAcessoDTIni) && $request->InformativoAcessoDTIni){
            $informativoacesso->InformativoAcessoDTIni = sha1(request('InformativoAcessoDTIni'));
        }
        $informativoacesso->InformativoAcessoDTFim = request('InformativoAcessoDTFim');
        if(isset($request->InformativoAcessoDTFim) && $request->InformativoAcessoDTFim){
            $informativoacesso->InformativoAcessoDTFim = request('InformativoAcessoDTFim');
        }
    }

}
