<?php

namespace App\Http\Controllers;


use App\EventoEscola;
use App\FaixaEvento;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\EventoEscola\EventoEscolaCreate;
use App\Http\Requests\EventoEscola\EventoEscolaAlter;
use App\Http\Requests\EventoEscola\EventoEscolaFaixaCreate;


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

    public function eventofaixa($id)
    {
        $EventoEscolas =DB::table('EventoEscola')
            ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->where('Escola.EscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->select(
                'EventoEscola.EventoStatus',
                'EventoEscola.EventoEscolaID',
                'Escola.Escola',
                'Evento.Evento'
            )
            ->get();

        return view('eventoescola/eventofaixashow', compact('EventoEscolas'));
    }

    public function eventofaixalist($id)
    {
        $FaixasEventoEscolas =DB::table('EventoEscola')
            ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->leftJoin('FaixaEvento','EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
            ->select(
                'FaixaEvento.FaixaEventoID',
                'FaixaEvento.FaixaEventoStatus',
                'FaixaEvento.FaixaEventoNumIni',
                'FaixaEvento.FaixaEventoNumFim',
                'FaixaEvento.FaixaEventoDTIni',
                'FaixaEvento.FaixaEventoDTFim',
                'EventoEscola.EventoEscolaID',
                'FaixaEvento.FaixaEventoPontoQuantidade',
                'Escola.Escola',
                'Evento.Evento'

            )
            ->get();

        return view('eventoescola/faixashow', compact('FaixasEventoEscolas'));
    }

    public function faixanew($id)
    {
        $Dados =DB::table('EventoEscola')
            ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Rede','Rede.RedeID', '=', 'Escola.RedeID')
            ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->select(
                'Escola.Escola',
                'Rede.Rede',
                'EventoEscola.EventoEscolaID',
                'Evento.Evento'
            )
            ->get();

        return view('eventoescola/faixanew', compact('Dados'));

    }

    public function faixagravar(EventoEscolaFaixaCreate $request, $id)
    {
        $validated = $request->validated();

        $eventoescolafaixa = new FaixaEvento;
        $eventoescolafaixa->EventoEscolaID = $request->EventoEscolaID;
        if(isset($request->FaixaEventoDTIni) && $request->FaixaEventoDTIni != '' && $request->FaixaEventoDTIni) {
            $eventoescolafaixa->FaixaEventoDTIni = Carbon::createFromFormat('Y-m-d', $request->FaixaEventoDTIni)->format('d/m/Y');
        }
        if(isset($request->FaixaEventoDTFim) && $request->FaixaEventoDTFim != '' && $request->FaixaEventoDTFim) {
            $eventoescolafaixa->FaixaEventoDTFim = Carbon::createFromFormat('Y-m-d', $request->FaixaEventoDTFim)->format('d/m/Y');
        }
        if(isset($request->FaixaEventoNumIni) && $request->FaixaEventoNumIni != '' && $request->FaixaEventoNumIni) {
            $eventoescolafaixa->FaixaEventoNumIni = $request->FaixaEventoNumIni;
        }
        if(isset($request->FaixaEventoNumFim) && $request->FaixaEventoNumFim != '' && $request->FaixaEventoNumFim) {
            $eventoescolafaixa->FaixaEventoNumFim = $request->FaixaEventoNumFim;
        }
        $eventoescolafaixa->FaixaEventoPontoQuantidade = $request->FaixaEventoPontoQuantidade;
        $eventoescolafaixa->EventoEscolaID = $id;
        $eventoescolafaixa->save();

        return redirect()->back()
            ->with('status', 'Faixa Criada com sucesso!');

    }
}
