<?php

namespace App\Http\Controllers;

use App\Escola;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Escola\EscolaCreate;
use App\Http\Requests\Escola\EscolaAlter;
use Carbon\Carbon;


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

    public function store(EscolaCreate $request)
    {
        $validated = $request->validated();
        $escola = new Escola;
        $escola->Escola = $request->Escola;
        $escola->EscolaCod = $request->EscolaCod;
        $escola->EscolaStatus = $request->EscolaStatus;
        if(isset($request->EscolaSenha) && $request->EscolaSenha != '' && $request->EscolaSenha) {
            $escola->EscolaSenha = sha1($request->EscolaSenha);
        }
        $escola->EscolaValorFixo = str_replace(",",'.',$request->EscolaValorFixo);
        $escola->EscolaValorVaviavel = str_replace(",",'.',$request->EscolaValorVaviavel);
        if(isset($request->EscolaTelefone) && $request->EscolaTelefone != '' && $request->EscolaTelefone) {
            $escola->EscolaTelefone = str_replace(["(",")"," ","-"],'',$request->EscolaTelefone);
        }
        if(isset($request->EscolaCelular) && $request->EscolaCelular != '' && $request->EscolaCelular) {
            $escola->EscolaCelular = str_replace(["(",")"," ","-"],'',$request->EscolaCelular);
        }
        if(isset($request->EscolaCelularPix) && $request->EscolaCelularPix != '' && $request->EscolaCelularPix) {
            $escola->EscolaCelularPix = str_replace(["(",")"," ","-"],'',$request->EscolaCelularPix);
        }
        if(isset($request->EscolaCNPJ) && $request->EscolaCNPJ != '' && $request->EscolaCNPJ) {
            $escola->EscolaCNPJ = str_replace([".","/","-"],'',$request->EscolaCNPJ);
        }
        if(isset($request->EscolaDiaVencimento) && $request->EscolaDiaVencimento != '' && $request->EscolaDiaVencimento) {
            $escola->EscolaDiaVencimento = $request->EscolaDiaVencimento;
        }
        if(isset($request->EscolaMotivoBloqueio) && $request->EscolaMotivoBloqueio != '' && $request->EscolaMotivoBloqueio) {
            $escola->EscolaMotivoBloqueio = $request->EscolaMotivoBloqueio;
        }
        if(isset($request->EscolaDTExpiracao) && $request->EscolaDTExpiracao != '' && $request->EscolaDTExpiracao) {
            $escola->EscolaDTExpiracao = Carbon::createFromFormat('Y-m-d', $request->EscolaDTExpiracao)->format('d/m/Y');
        }
        if($escola->EscolaStatus != 4)
            $escola->EscolaDTAtivacao = date('Y-m-d H:i:s');
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
        $escola->EscolaValorFixo = str_replace(".",',',$escola->EscolaValorFixo);
        $escola->EscolaValorVaviavel = str_replace(".",',',$escola->EscolaValorVaviavel);
        $escola['Rede'] = DB::table('Rede')
        ->select(
            'Rede.RedeID',
            'Rede.Rede'
        )
        ->get();
        return view('escola/editar', compact('escola'));
    }

    public function update(EscolaAlter $request, $id)
    {
        $validated = $request->validated();

        $escola = Escola::findOrFail($id);

        $escola->Escola = $request->Escola;
        $escola->EscolaCod = $request->EscolaCod;
        $escola->EscolaStatus = $request->EscolaStatus;
        if(isset($request->EscolaSenha) && $request->EscolaSenha != '' && $request->EscolaSenha) {
            $escola->EscolaSenha = sha1($request->EscolaSenha);
        }
        $escola->EscolaValorFixo = str_replace(",",'.',$request->EscolaValorFixo);
        $escola->EscolaValorVaviavel = str_replace(",",'.',$request->EscolaValorVaviavel);
        if(isset($request->EscolaTelefone) && $request->EscolaTelefone != '' && $request->EscolaTelefone) {
            $escola->EscolaTelefone = str_replace(["(",")"," ","-"],'',$request->EscolaTelefone);
        }
        if(isset($request->EscolaCelular) && $request->EscolaCelular != '' && $request->EscolaCelular) {
            $escola->EscolaCelular = str_replace(["(",")"," ","-"],'',$request->EscolaCelular);
        }
        if(isset($request->EscolaCelularPix) && $request->EscolaCelularPix != '' && $request->EscolaCelularPix) {
            $escola->EscolaCelularPix = str_replace(["(",")"," ","-"],'',$request->EscolaCelularPix);
        }
        if(isset($request->EscolaCNPJ) && $request->EscolaCNPJ != '' && $request->EscolaCNPJ) {
            $escola->EscolaCNPJ = str_replace([".","/","-"],'',$request->EscolaCNPJ);
        }
        if(isset($request->EscolaDiaVencimento) && $request->EscolaDiaVencimento != '' && $request->EscolaDiaVencimento) {
            $escola->EscolaDiaVencimento = $request->EscolaDiaVencimento;
        }
        if(isset($request->EscolaMotivoBloqueio) && $request->EscolaMotivoBloqueio != '' && $request->EscolaMotivoBloqueio) {
            $escola->EscolaMotivoBloqueio = $request->EscolaMotivoBloqueio;
        }
        if(isset($request->EscolaDTExpiracao) && $request->EscolaDTExpiracao != '' && $request->EscolaDTExpiracao) {
            $escola->EscolaDTExpiracao = Carbon::createFromFormat('Y-m-d', $request->EscolaDTExpiracao)->format('d/m/Y');
        }
        
        $escola->RedeID = $request->RedeID;

        if($escola->EscolaStatus == 1)
            $escola->EscolaDTAtivacao = date('Y-m-d H:i:s');

        if($escola->EscolaStatus == 4)
            $escola->EscolaDTCadastro = date('Y-m-d H:i:s');

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
