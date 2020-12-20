<?php

namespace App\Http\Controllers;

use App\UsuarioEscolaInformativoAcesso;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoCreate;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcesoAlter;
use Carbon\Carbon;

class UsuarioEscolaInformativoAcessoController extends Controller
{
    public function index()
    {
        $Dados = new UsuarioEscolaInformativoAcesso;
        $Dados->UsuarioID =DB::table('Usuario')
                ->select(
                    'Usuario.UsuarioID',
                    'Usuario.Usuario'
                )
                ->get();
        $Dados->InformativoAcessoID =DB::table('InformativoAcesso')
                ->select(
                    'InformativoAcesso.InformativoAcessoID',   
                    'InformativoAcesso.InformativoAcesso'
                )
                ->get();
        
        return view('usuarioescolainformativoacesso/usuarioescolainformatiavocesso', compact('Dados'));
    
    }
    
    public function create()
    {
        return view('UsuarioEscolaInformativoAcesso.create');
    }

    public function store(UsuarioEscolaInformativoAcessoCreate $request)
    {
        $validated = $request->validated();

        foreach($request->InformativoAcessoID as $informativoacessoID){
            $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;
            $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = $request->UsuarioEscolaInformativoAcesso;
            $usuarioescolainformativoacesso->InformativoAcessoID = $informativoacessoID;
            $usuarioescolainformativoacesso->UsuarioID = $request->UsuarioID;

            if(isset($request->UsuarioEscolaInformativoAcessoIDDTAcao) && $request->UsuarioEscolaInformativoAcessoIDDTAcao != '' && $request->UsuarioEscolaInformativoAcessoIDDTAcao) {
                $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = Carbon::createFromFormat('Y-m-d', $request->UsuarioEscolaInformativoAcessoIDDTAcao)->format('d/m/Y');
            }

            $usuarioescolainformativoacesso->save();
        }
        return redirect()->back()
            ->with('status', 'InformativoAcesso relacionado com o Usuario com sucesso!');
        
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $UsuarioEscolaInformativoAcessos =DB::table('UsuarioEscolaInformativoAcesso')
                ->join('Usuario','UsuarioEscolaInformativoAcesso.UsuarioID', '=', 'Usuario.UsuarioID')
                ->select(
                    'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
                    'UsuarioEscolaInformativoAcesso.UsuarioID',
                    'Usuario.Usuario'
                )->groupby('Usuario.Usuario','UsuarioEscolaInformativoAcesso.UsuarioID', 'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso')
                ->get();
        return view('usuarioescolainformativoacesso/show', compact('UsuarioEscolaInformativoAcessos'));
    }

    public function edit($UsuarioEscolaInformativoAcessoID)
    {
        $UsuarioEscolaInformativoAcessos['IDS'] =DB::table('UsuarioEscolaInformativoAcesso')
        ->join('Usuario','UsuarioEscolaInformativoAcesso.UsuarioID', '=', 'Usuario.UsuarioID')
        ->join('InformativoAcesso','UsuarioEscolaInformativoAcesso.InformativoAcessoID', '=', 'InformativoAcesso.InformativoAcessoID')
        ->where('Usuario.UsuarioID', $UsuarioEscolaInformativoAcessoID)
        ->select(
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoIDDTAcao',
            'UsuarioEscolaInformativoAcesso.UsuarioID',
            'Usuario.Usuario'
        )->groupby(
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoIDDTAcao',
            'UsuarioEscolaInformativoAcesso.UsuarioID',
            'Usuario.Usuario'
        )
        ->get();
        $UsuarioEscolaInformativoAcessos[] =DB::table('UsuarioEscolaInformativoAcesso')
        ->join('Usuario','UsuarioEscolaInformativoAcesso.UsuarioID', '=', 'Usuario.UsuarioID')
        ->join('InformativoAcesso','UsuarioEscolaInformativoAcesso.InformativoAcessoID', '=', 'InformativoAcesso.InformativoAcessoID')
        ->where('Usuario.UsuarioID', $UsuarioEscolaInformativoAcessoID)
        ->select(
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoID',
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
            'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoIDDTAcao',
            'InformativoAcesso.InformativoAcessoID',
            'InformativoAcesso.InformativoAcesso',
            'UsuarioEscolaInformativoAcesso.UsuarioID',
            'Usuario.Usuario'
        )
        ->get();
        $UsuarioEscolaInformativoAcessos['InformativoAcessos'] =DB::table('InformativoAcesso')
                ->select(
                    'InformativoAcesso.InformativoAcessoID',
                    'InformativoAcesso.InformativoAcesso'
                )
                ->get();
        return view('usuarioescolainformativoacesso/editar', compact('UsuarioEscolaInformativoAcessos'));
    }

    public function update(UsuarioEscolaInformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();

        DB::table('UsuarioEscolaInformativoAcesso')->where('UsuarioID', $id)->delete();

        if(isset($request->InformativoAcessoID) && count($request->InformativoAcessoID) > 0){
            foreach($request->usuarioescolainformativoacessoID as $informativoacessoID){
                $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;
                $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = $request->UsuarioEscolaInformativoAcesso;
                $usuarioescolainformativoacesso->InformativoAcessoID = $informativoacessoID;
                $usuarioescolainformativoacesso->UsuarioID = $id;

                if(isset($request->UsuarioEscolaInformativoAcessoIDDTAcao) && $request->UsuarioEscolaInformativoAcessoIDDTAcao != '' && $request->UsuarioEscolaInformativoAcessoIDDTAcao) {
                    $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = Carbon::createFromFormat('Y-m-d', $request->UsuarioEscolaInformativoAcessoIDDTAcao)->format('d/m/Y');
                }

                $usuarioescolainformativoacesso->save();
            }
        }
        return redirect()->action('UsuarioEscolaInformativoAcessoController@list');
    }

    public function destroy($id)
    {
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcesso::findOrFail($id);
        $usuarioescolainformativoacesso->delete();
        return redirect()->route('usuarioescolainformativoacesso.index')->with('alert-success', 'UsuarioEscolaInformativoAcesso deletada com sucesso!');
    }
}
