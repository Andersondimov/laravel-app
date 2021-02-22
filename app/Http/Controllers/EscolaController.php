<?php

namespace App\Http\Controllers;

use App\Escola;
use App\EventoEscola;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Escola\EscolaCreate;
use App\Http\Requests\Escola\EscolaAlter;
use App\Http\Requests\Escola\EscolaAlterParams;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


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

    public function store(EscolaCreate $request)
    {
        $validated = $request->validated();
        $escola = new Escola;
        $escola->Escola = $request->Escola;
        $escola->EscolaCod = $request->EscolaCod;
        $escola->EscolaNomeMoeda = $request->EscolaNomeMoeda;
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
            $escola->EscolaCelularPix = $request->EscolaCelularPix;
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
                    'Escola.EscolaNomeMoeda',
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

    public function editarparams($EscolaID)
    {
        $escola = Escola::findOrFail($EscolaID);
        $escola->EscolaValorFixo = $escola->EscolaValorFixo ? $escola->EscolaValorFixo : 0;
        $escola->EscolaValorVaviavel = $escola->EscolaValorVaviavel ? $escola->EscolaValorVaviavel : 0;

        $escola['Rede'] = DB::table('Rede')
            ->select(
                'Rede.RedeID',
                'Rede.Rede'
            )
            ->get();

        $escola['Eventos'] = DB::table('Evento')
            ->select(
                'Evento.EventoID',
                'Evento.Evento'
            )
            ->get();

        $escola['Moeda'] = DB::table('Escola')
            ->join('Rede','Rede.RedeID', '=', 'Escola.RedeID')
            ->select(
                'Escola.EscolaNomeMoeda',
                'Rede.RedeNomeMoeda'
            )
            ->where('Escola.EscolaID',$EscolaID)
            ->get();

        $escola['EscolaEventos'] = DB::table('EventoEscola')
            ->select(
                'EventoEscola.EventoID'
            )
            ->where('EventoEscola.EscolaID', $EscolaID)
            ->where('EventoEscola.EventoStatus', 1)
            ->get();

        $escola->Qtdaluno = 0;
        $escola->Qtdaluno = DB::table('Escola')
            ->join('UsuarioEscola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->join('Usuario','UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
            ->join('Perfil','Usuario.PerfilID', '=', 'Perfil.PerfilID')
            ->where('Perfil.PerfilCod', 'al')
            ->where('Escola.EscolaID', $EscolaID)
            ->distinct('Usuario.UsuarioID')
            ->count('Usuario.UsuarioID');

        $escola->EscolaValorTot = ($escola->Qtdaluno*$escola->EscolaValorVaviavel)+$escola->EscolaValorFixo;
        $escola->EscolaValorTot = str_replace(".",',',$escola->EscolaValorTot);

        $escola->EscolaValorFixo = str_replace(".",',',$escola->EscolaValorFixo);
        $escola->EscolaValorVaviavel = str_replace(".",',',$escola->EscolaValorVaviavel);

        return view('escola/parametro', compact('escola'));
    }

    public function update(EscolaAlter $request, $id)
    {
        $validated = $request->validated();

        $escola = Escola::findOrFail($id);

        $escola->Escola = $request->Escola;
        $escola->EscolaCod = $request->EscolaCod;
        $escola->EscolaNomeMoeda = $request->EscolaNomeMoeda;
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
            $escola->EscolaCelularPix = $request->EscolaCelularPix;
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

    public function updateparams(EscolaAlterParams $request, $id)
    {
        $validated = $request->validated();

        $escola = Escola::findOrFail($id);

        // Define o valor default para a vari�vel que cont�m o nome da imagem
        $nameFile = null;

        // Verifica se informou o arquivo e se � v�lido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if($request->file('image')->getSize() > 25000)
                return redirect()
                    ->back()
                    ->with('erro', 'O Tamanho do Arquivo deve ser at� 25KB')
                    ->withInput();

            // Define um aleat�rio para o arquivo baseado no timestamps atual
            $name = 'escola'.$id;

            // Recupera a extens�o do arquivo
            $extension = $request->image->extension();
            if($extension != 'png')
                return redirect()
                    ->back()
                    ->with('erro', 'O Formato do Arquivo deve ser .png')
                    ->withInput();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs(null, $nameFile);

            // Verifica se N�O deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                    ->back()
                    ->with('erro', 'Falha ao fazer upload')
                    ->withInput();
        }

        if(isset($request->EscolaTelefone) && $request->EscolaTelefone != '' && $request->EscolaTelefone) {
            $escola->EscolaTelefone = str_replace(["(",")"," ","-"],'',$request->EscolaTelefone);
        }
        if(isset($request->EscolaCelular) && $request->EscolaCelular != '' && $request->EscolaCelular) {
            $escola->EscolaCelular = str_replace(["(",")"," ","-"],'',$request->EscolaCelular);
        }
        if(isset($request->EscolaCelularPix) && $request->EscolaCelularPix != '' && $request->EscolaCelularPix) {
            $escola->EscolaCelularPix = $request->EscolaCelularPix;
        }
        if(isset($request->EscolaCNPJ) && $request->EscolaCNPJ != '' && $request->EscolaCNPJ) {
            $escola->EscolaCNPJ = str_replace([".","/","-"],'',$request->EscolaCNPJ);
        }

        $escola->save();

        EventoEscola::where('EscolaID', $id)->update(['EventoStatus' => 2]);
        if(isset($request->EventoID) && count($request->EventoID)>0) {
            foreach ($request->EventoID as $EventoID) {

                $eventoEscolaAlterar = EventoEscola::where('EscolaID', $id)->where('EventoID', $EventoID)
                    ->update(['EventoStatus' => 1]);
                if ($eventoEscolaAlterar == null) {
                    $eventoEscolaNovo = new EventoEscola;
                    $eventoEscolaNovo->EscolaID = $id;
                    $eventoEscolaNovo->EventoID = $EventoID;
                    $eventoEscolaNovo->EventoStatus = 1;
                    $eventoEscolaNovo->save();
                }
            }
        }
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
