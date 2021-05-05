<?php

namespace App\Http\Controllers;


use App\EventoEscola;
use App\FaixaEvento;
use App\PontoRecebido;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\EventoEscola\EventoEscolaCreate;
use App\Http\Requests\EventoEscola\EventoEscolaAlter;
use App\Http\Requests\EventoEscola\EventoEscolaFaixaCreate;


class EventoEscolaController extends Controller
{
    public function index(Request $request)
    {
        $Dados = new EventoEscola;
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm'){
            $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->get();
        }
        else{
        $escolaId = $request->session()->get('EscolaID');
            $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->where('Escola.EscolaID', '=', $escolaId)
                ->get();
    }
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
            $eventoescola->EventoStatus = 1;
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

    public function list(Request $request)
    {
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm'){
            $EventoEscolas =DB::table('EventoEscola')
                ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'EventoEscola.EventoStatus',
                    'EventoEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','EventoEscola.EscolaID', 'EventoEscola.EventoStatus')
                ->get();
        }
        else{
            $escolaId = $request->session()->get('EscolaID');
            $EventoEscolas =DB::table('EventoEscola')
                ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'EventoEscola.EventoStatus',
                    'EventoEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','EventoEscola.EscolaID', 'EventoEscola.EventoStatus')
                ->where('Escola.EscolaID', '=', $escolaId)
                ->get();
        }

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
                $eventoescola->EventoStatus = 1;
                $eventoescola->EventoID = $eventoID;
                $eventoescola->EscolaID = $id;

                $eventoescola->save();
            }
        }
        return redirect()->action('EventoEscolaController@list')
            ->with('status', 'Eventos relacionados a escola com sucesso');
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

    public function eventofaixalist($id,$action)
    {
        $FaixasEventoEscolas = DB::table('EventoEscola')
            ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->leftJoin('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
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

        return view('eventoescola/faixashow', compact('FaixasEventoEscolas'),['action'=>$action]);
    }

    public function RepasseForm($id,$action)
    {
        $UsuarioEscolas = DB::table('EventoEscola')
            ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil', 'Usuario.PerfilID', '=', 'Perfil.PerfilID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->where('Perfil.PerfilCod', 'al')
            ->select(
                'UsuarioEscola.UsuarioEscolaID',
                'Evento.Evento',
                'Usuario.UsuarioNome'

            )
            ->get();

        return view('eventoescola/faixashow', ['action'=>$action,'EventoEscolaID'=>$id],compact('UsuarioEscolas'));
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

    public function faixagravarimport(Request $request, $id)
    {
        $MsgSucesso = 'Pontos Importados!';
        $MsgErro = 'Nenhuma linha foi importada, favor verificar o arquivo CSV!';

        if ($request->file('importcsv')->isValid()) {

            // Recupera a extension do arquivo
            $extension = $request->importcsv->getClientMimeType();
            if($extension != "text/csv")
                return redirect()
                    ->back()
                    ->with('erro', 'O Formato do Arquivo deve ser .csv')
                    ->withInput();

            $csvFile = $request->importcsv;
            $file_handle = fopen($csvFile, 'r');
            while (!feof($file_handle)) {
                $line_of_text[] = fgetcsv($file_handle, 0, ';');
            }
            fclose($file_handle);
        }
        $count = 0;
        foreach ($line_of_text as $linha) {
            if ($linha[0] != ''){
                if (isset($linha[1]) && $linha[1] != '') {
                    $FaixaEventoEscola = DB::table('EventoEscola')
                        ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                        ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                        ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                        ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                        ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                        ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                        ->where('EventoEscola.EventoEscolaID', $id)
                        ->where('Usuario.UsuarioMatricula', $linha[0])
                        ->where('Perfil.PerfilCod', 'al')
                        ->where('FaixaEvento.FaixaEventoNumFim', '>=', $linha[1])
                        ->where('FaixaEvento.FaixaEventoNumIni', '<=', $linha[1])
                        ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                        ->select(
                            'UsuarioEscola.UsuarioEscolaID',
                            'FaixaEvento.FaixaEventoID',
                            'FaixaEvento.FaixaEventoPontoQuantidade'
                        )->limit(1)
                        ->get();
                }
                if (isset($linha[2]) && $linha[2] != '') {
                    $FaixaEventoEscola = DB::table('EventoEscola')
                        ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                        ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                        ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                        ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                        ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                        ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                        ->where('EventoEscola.EventoEscolaID', $id)
                        ->where('Usuario.UsuarioMatricula', $linha[0])
                        ->where('Perfil.PerfilCod', 'al')
                        ->where('FaixaEvento.FaixaEventoDTFim', '>=', $linha[2])
                        ->where('FaixaEvento.FaixaEventoDTIni', '<=', $linha[2])
                        ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                        ->select(
                            'UsuarioEscola.UsuarioEscolaID',
                            'FaixaEvento.FaixaEventoID',
                            'FaixaEvento.FaixaEventoPontoQuantidade'
                        )->limit(1)
                        ->get();
                }
                if(isset($FaixaEventoEscola) && count($FaixaEventoEscola)>0) {
                    foreach ($FaixaEventoEscola as $dados) {
                        if ($dados->UsuarioEscolaID > 0 && $dados->FaixaEventoID > 0
                            && $dados->FaixaEventoPontoQuantidade > 0) {
                            $count++;
                            $PontoRecebido = new PontoRecebido;
                            $PontoRecebido->UsuarioEscolaID = $dados->UsuarioEscolaID;
                            $PontoRecebido->FaixaEventoID = $dados->FaixaEventoID;
                            $PontoRecebido->PontoRecebidoQuantidade = $dados->FaixaEventoPontoQuantidade;
                            $PontoRecebido->PontoRecebidoStatus = 1;
                            $PontoRecebido->save();
                            $dados = null;
                        }
                    }
                }
                else{
                    return redirect()->back()
                        ->with('erro', $MsgErro);
                }
            }
        }
        if($count > 0){
            return redirect()->back()
                ->with('status', $MsgSucesso);
        }
        else{
            return redirect()->back()
                ->with('erro', $MsgErro);
        }
    }

    public function faixagravarmanual(Request $request, $id)
    {
        if (isset($request->Ponto) && $request->Ponto>0){
            $FaixaEventoEscola = DB::table('EventoEscola')
                ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                ->where('EventoEscola.EventoEscolaID', $id)
                ->where('UsuarioEscola.UsuarioEscolaID', $request->UsuarioEscolaID)
                ->where('Perfil.PerfilCod', 'al')
                ->where('FaixaEvento.FaixaEventoNumFim', '>=', $request->Ponto)
                ->where('FaixaEvento.FaixaEventoNumIni', '<=', $request->Ponto)
                ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'FaixaEvento.FaixaEventoID',
                    'FaixaEvento.FaixaEventoPontoQuantidade'
                )->limit(1)
                ->get();
        }else {
            if (isset($request->DT) && $request->DT != '') {
                $FaixaEventoEscola = DB::table('EventoEscola')
                    ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                    ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                    ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                    ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                    ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                    ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                    ->where('EventoEscola.EventoEscolaID', $id)
                    ->where('UsuarioEscola.UsuarioEscolaID', $request->UsuarioEscolaID)
                    ->where('Perfil.PerfilCod', 'al')
                    ->where('FaixaEvento.FaixaEventoDTFim', '>=', $request->DT)
                    ->where('FaixaEvento.FaixaEventoDTIni', '<=', $request->DT)
                    ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                    ->select(
                        'UsuarioEscola.UsuarioEscolaID',
                        'FaixaEvento.FaixaEventoID',
                        'FaixaEvento.FaixaEventoPontoQuantidade'
                    )->limit(1)
                    ->get();
            }
        }
        if(isset($FaixaEventoEscola) && count($FaixaEventoEscola)>0) {
            foreach ($FaixaEventoEscola as $dados) {
                if ($dados->UsuarioEscolaID > 0 && $dados->FaixaEventoID > 0
                    && $dados->FaixaEventoPontoQuantidade > 0) {
                    $PontoRecebido = new PontoRecebido;
                    $PontoRecebido->UsuarioEscolaID = $dados->UsuarioEscolaID;
                    $PontoRecebido->FaixaEventoID = $dados->FaixaEventoID;
                    $PontoRecebido->PontoRecebidoQuantidade = $dados->FaixaEventoPontoQuantidade;
                    $PontoRecebido->PontoRecebidoStatus = 1;
                    $PontoRecebido->save();
                }
            }
        }
        else{
            return redirect()->back()
                ->with('erro', 'Nenhuma Faixa encontrada');
        }
        return redirect()->back()
            ->with('status', 'Repasse realizado!');
    }
}
