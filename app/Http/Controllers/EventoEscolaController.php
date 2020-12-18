<?php

namespace App\Http\Controllers;


use App\EventoEscola;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\EventoEscola\EventoEscolaCreate;
use App\Http\Requests\EventoEscola\EventoEscolaAlter;


class EventoEscolaController extends Controller
{
    public function index()
    {
        $Dados = new EventoEscola;
        $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',      
                    'Escola.Escola'
                )
                ->get();
        $Dados->EventoID =DB::table('Evento')
                ->select(
                    'Evento.EventoID',   
                    'Evento.Evento'
                )
                ->get();
        
        return view('eventoescola/eventoescola', compact('Dados'));

    }

    public function create()
    {
        return view('EventoEscola.create');
    }

    public function store(EventoEscolaCreate $request)
    {
        $validated = $request->validated();

        foreach($request->EventoID as $eventoID){
            $eventoescola = new EventoEscola;
            $eventoescola->EventoStatus = $request->EventoStatus;
            $eventoescola->EscolaID = $request->EscolaID;
            $eventoescola->EventoID = $eventoID;

            $eventoescola->save();
        }
        return redirect()->back()
            ->with('status', 'Eventos relacionados com o escolas com sucesso!');
        
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $EventoEscolas =DB::table('EventoEscola')
                ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'EventoEscola.EventoStatus',
                    'EventoEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','EventoEscola.EscolaID', 'EventoEscola.EventoStatus')
                ->get();
        return view('eventoescola/show', compact('EventoEscolas'));
    }

    public function edit($EventoEscolaID)
    {
        $EventoEscolas['IDS'] =DB::table('EventoEscola')
        ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
        ->where('Escola.EscolaID', $EventoEscolaID)
        ->select(
            'EventoEscola.EventoStatus',
            'EventoEscola.EventoID',
            'EventoEscola.EscolaID',
            'Escola.Escola'
        )->groupby(
            'EventoEscola.EventoStatus',
            'EventoEscola.EventoID',
            'EventoEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();

        $EventoEscolas[] =DB::table('EventoEscola')
        ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
        ->where('Escola.EscolaID', $EventoEscolaID)
        ->select(
            'EventoEscola.EventoEscolaID',
            'EventoEscola.EventoStatus',
            'Evento.EventoID',
            'Evento.Evento',
            'EventoEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();
        $EventoEscolas['Eventos'] =DB::table('Evento')
                ->select(
                    'Evento.EventoID',
                    'Evento.Evento'
                )
                ->get();
        return view('eventoescola/editar', compact('EventoEscolas'));

        $PerfilTelas['IDS'] =DB::table('PerfilTela')
        ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
        ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
        ->where('Perfil.PerfilID', $PerfilTelaID)
        ->select(
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )->groupby(
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        $PerfilTelas[] =DB::table('PerfilTela')
        ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
        ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
        ->where('Perfil.PerfilID', $PerfilTelaID)
        ->select(
            'PerfilTela.PerfilTelaID',
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'Tela.TelaID',
            'Tela.Tela',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        $PerfilTelas['Telas'] =DB::table('Tela')
                ->select(
                    'Tela.TelaID',
                    'Tela.Tela'
                )
                ->get();
        return view('perfiltela/editar', compact('PerfilTelas'));
    }

    public function update(EventoEscolaAlter $request, $id)
    {
        $validated = $request->validated();

        DB::table('EventoEscola')->where('EscolaID', $id)->delete();

        if(isset($request->EventoID) && count($request->EventoID) > 0){
            foreach($request->EventoID as $eventoID){
                $eventoescola = new EventoEscola;
                $eventoescola->EventoStatus = $request->EventoStatus;
                $eventoescola->EventoID = $eventoID;
                $eventoescola->EscolaID = $id;

                $eventoescola->save();
            }
        }
        return redirect()->action('EventoEscolaController@list')
            ->with('status', 'Eventos relacionados a escola com sucesso');
    }

    public function destroy($id)
    {
        $eventoescola = EventoEscola::findOrFail($id);
        $eventoescola->delete();
        return redirect()->route('eventoescola.index')->with('alert-success', 'Evento Escola deletada com sucesso!');
    }
}
