<?php

namespace App\Http\Controllers;

use App\Escola;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;


class EscolaController extends Controller
{
    public function index()
    {
        $Redes =DB::table('Rede')
                ->select(
                    'Rede.RedeID',
                    'Rede.Rede'
                )
                ->get();
        return view('escola/escola', compact('Redes'));
    }

    public function create()
    {
        return view('escola.create');
    }

    public function store(Request $request)
    {
        $escola = new Escola;
        $escola->Escola = $request->Escola;
        $escola->EscolaCod = $request->EscolaCod;
        $escola->EscolaStatus = $request->EscolaStatus;
        if(isset($request->EscolaSenha) && $request->EscolaSenha != '' && $request->EscolaSenha) {
            $escola->EscolaSenha = sha1($request->EscolaSenha);
        }
        $escola->EscolaValorFixo = $request->EscolaValorFixo;
        $escola->EscolaValorVaviavel = $request->EscolaValorVaviavel;
        $escola->EscolaPontuacaoIni = $request->EscolaPontuacaoIni;
        if(isset($request->EscolaTelefone) && $request->EscolaTelefone != '' && $request->EscolaTelefone) {
            $escola->EscolaTelefone = $request->EscolaTelefone;
        }
        if(isset($request->EscolaCelular) && $request->EscolaCelular != '' && $request->EscolaCelular) {
            $escola->EscolaCelular = $request->EscolaCelular;
        }
        if(isset($request->EscolaCNPJ) && $request->EscolaCNPJ != '' && $request->EscolaCNPJ) {
            $escola->EscolaCNPJ = $request->EscolaCNPJ;
        }
        if(isset($request->EscolaCelularPix) && $request->EscolaCelularPix != '' && $request->EscolaCelularPix) {
            $escola->EscolaCelularPix = $request->EscolaCelularPix;
        }
        $escola->RedeID = $request->RedeID;
        $escola->save();
        return redirect()->back()
            ->with('status', 'Escola criada com sucesso!');
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $Escolas =DB::table('Escola')
                ->join('Rede','Escola.RedeID', '=', 'Rede.RedeID')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola',
                    'Escola.EscolaCod',
                    'Escola.EscolaStatus',
                    'Escola.EscolaDTAtivacao',
                    'Escola.EscolaDTInativacao',
                    'Escola.EscolaDTBloqueio',
                    'Escola.EscolaValorFixo',
                    'Escola.EscolaValorVaviavel',
                    'Escola.EscolaPontuacaoIni',
                    'Escola.EscolaMotivoBloqueio',
                    'Escola.EscolaCelular',
                    'Escola.EscolaCNPJ',
                    'Escola.EscolaCelularPix',
                    'Escola.RedeID',
                    'Rede.Rede'
                )
                ->get();
        return view('escola/show', compact('Escolas'));
    }

    public function edit($EscolaID)
    {
        $escola = Escola::findOrFail($EscolaID);
        return view('escola/editar', compact('escola'));
    }

    public function update(Request $request, $id)
    {
        $escola = Escola::findOrFail($id);

        $escola->Escola = $request->Escola;
        $escola->EscolaCod = $request->EscolaCod;
        $escola->EscolaStatus = $request->EscolaStatus;
        if(isset($request->EscolaSenha) && $request->EscolaSenha != '' && $request->EscolaSenha) {
            $escola->EscolaSenha = sha1($request->EscolaSenha);
        }
        $escola->EscolaValorFixo = $request->EscolaValorFixo;
        $escola->EscolaValorVaviavel = $request->EscolaValorVaviavel;
        $escola->EscolaPontuacaoIni = $request->EscolaPontuacaoIni;
        if(isset($request->EscolaTelefone) && $request->EscolaTelefone != '' && $request->EscolaTelefone) {
            $escola->EscolaTelefone = $request->EscolaTelefone;
        }
        if(isset($request->EscolaCelular) && $request->EscolaCelular != '' && $request->EscolaCelular) {
            $escola->EscolaCelular = $request->EscolaCelular;
        }
        if(isset($request->EscolaCNPJ) && $request->EscolaCNPJ != '' && $request->EscolaCNPJ) {
            $escola->EscolaCNPJ = $request->EscolaCNPJ;
        }
        if(isset($request->EscolaCelularPix) && $request->EscolaCelularPix != '' && $request->EscolaCelularPix) {
            $escola->EscolaCelularPix = $request->EscolaCelularPix;
        }
        if(isset($request->EscolaMotivoBloqueio) && $request->EscolaMotivoBloqueio != '' && $request->EscolaMotivoBloqueio) {
            $escola->EscolaMotivoBloqueio = $request->EscolaMotivoBloqueio;
        }
        $escola->RedeID = $request->RedeID;

        if($escola->EscolaStatus == 2)
            $escola->EscolaDTInativacao = date('Y-m-d H:i:s');

        if($escola->EscolaStatus == 3)
            $escola->EscolaDTBloqueio = date('Y-m-d H:i:s');

        $escola->save();
        return redirect()->back()
            ->with('status', 'Escola alterada com sucesso!');

    }

    public function destroy($id)
    {
        $escola = Escola::findOrFail($id);
        $escola->delete();
        return redirect()->route('escola.index')->with('alert-success', 'Escola deletada com sucesso!');
    }
}
