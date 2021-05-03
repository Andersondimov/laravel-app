<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\UsuarioEscola;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Usuario\UsuarioCreate;
use App\Http\Requests\Usuario\UsuarioAlter;
use App\Http\Requests\Usuario\UsuarioAlterAluno;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('PerfilCod') != 'adm' && $request->session()->get('PerfilCod') != 'master'){
            $Perfis =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->whereNotIn('Perfil.PerfilCod', ['adm','master'])
                ->get()
            ;
        }
        else{
            $Perfis =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->get()
            ;
        }

        return view('usuario/usuario', compact('Perfis'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(UsuarioCreate $request)
    {
        $validated = $request->validated();

        $usuario = new Usuario;
        $usuario->PerfilID = request('PerfilID');
        $usuario->UsuarioLogin = request('UsuarioLogin');
        $usuario->UsuarioSenha = sha1(request('UsuarioSenha'));
        $usuario->UsuarioNome = request('UsuarioNome');
        if(isset($request->UsuarioEmail) && $request->UsuarioEmail){
            $usuario->UsuarioEmail = request('UsuarioEmail');
        }
        if(isset($request->UsuarioCelular) && $request->UsuarioCelular){
            $usuario->UsuarioCelular = str_replace(["(",")"," ","-"],'',$request->UsuarioCelular);
        }
        if(isset($request->UsuarioMatricula) && $request->UsuarioMatricula){
            $usuario->UsuarioMatricula = request('UsuarioMatricula');
        }
        $usuario->UsuarioStatus = request('UsuarioStatus');
        $usuario->save();


        //*****Escola Usuario*****

        if($request->session()->get('EscolaID') > 0) {
            $usuarioescola = new UsuarioEscola;
            $usuarioescola->UsuarioEscolaStatus = 1;
            $usuarioescola->UsuarioID = $usuario->UsuarioID;
            $usuarioescola->EscolaID = $request->session()->get('EscolaID');
            $usuarioescola->save();
        }

        return redirect()->back()
            ->with('status', 'Usuário criado com sucesso!');
    }

    public function show()
    {
        $Usuarios = new Usuario;
        $Usuarios = Usuario::all();
    }

    public function list()
    {
        $Usuarios =DB::table('Usuario')
                ->join('Perfil','Usuario.PerfilID', '=', 'Perfil.PerfilID')
                ->select(
                    'Usuario.UsuarioID',
                    'Usuario.UsuarioNome',
                    'Usuario.UsuarioLogin',
                    'Usuario.UsuarioStatus',
                    'Usuario.UsuarioDTAtivacao',
                    'Usuario.UsuarioDTInativacao',
                    'Usuario.UsuarioDTBloqueio',
                    'Usuario.UsuarioCelular',
                    'Usuario.UsuarioEmail',
                    'Usuario.UsuarioMatricula',
                    'Usuario.PerfilID',
                    'Perfil.PerfilCod',
                    'Perfil.Perfil'
                )
                ->get();
        return view('usuario/show', compact('Usuarios'));
    }

    public function edit($UsuarioID, Request $request)
    {
        $usuario = Usuario::findOrFail($UsuarioID);

        if($request->session()->get('PerfilCod') != 'adm' && $request->session()->get('PerfilCod') != 'master'){
            $usuario['Perfil'] =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->whereNotIn('Perfil.PerfilCod', ['adm','master'])
                ->get()
            ;
        }
        else{
            $usuario['Perfil'] =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->get()
            ;
        }

        return view('usuario/editar', compact('usuario'));
    }

    public function editaraluno($UsuarioID)
    {
        $usuario = Usuario::findOrFail($UsuarioID);
        return view('usuario/editaraluno', compact('usuario'));

        
    }

    public function updatealuno(UsuarioAlterAluno $request, $id)
    {
        $validated = $request->validated();

        $usuario = new Usuario;

        $usuario = Usuario::findOrFail($id);

        if(isset($request->UsuarioSenha) && $request->UsuarioSenha){
            $usuario->UsuarioSenha = sha1(request('UsuarioSenha'));
        }

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
            $name = 'usuario'.$id;

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

        $usuario->save();
        return redirect()->back()
            ->with('status', 'Usuário alterado com sucesso!');

    }

    public function update(UsuarioAlter $request, $id)
    {
        $validated = $request->validated();

        $usuario = new Usuario;

        $usuario = Usuario::findOrFail($id);

        $usuario->PerfilID = request('PerfilID');
        $usuario->UsuarioLogin = request('UsuarioLogin');
        if(isset($request->UsuarioSenha) && $request->UsuarioSenha){
            $usuario->UsuarioSenha = sha1(request('UsuarioSenha'));
        }
        $usuario->UsuarioNome = request('UsuarioNome');
        if(isset($request->UsuarioEmail) && $request->UsuarioEmail){
            $usuario->UsuarioEmail = request('UsuarioEmail');
        }
        if(isset($request->UsuarioCelular) && $request->UsuarioCelular){
            $usuario->UsuarioCelular = str_replace(["(",")"," ","-"],'',$request->UsuarioCelular);
        }
        if(isset($request->UsuarioMatricula) && $request->UsuarioMatricula){
            $usuario->UsuarioMatricula = request('UsuarioMatricula');
        }
        $usuario->UsuarioStatus = request('UsuarioStatus');

        if($usuario->Usuariotatus == 1)
            $usuario->UsuarioDTAtivacao = date('Y-m-d H:i:s');

        if($usuario->UsuarioStatus == 2)
            $usuario->UsuarioDTInativacao = date('Y-m-d H:i:s');

        if($usuario->UsuarioStatus == 3)
            $usuario->UsuarioDTBloqueio = date('Y-m-d H:i:s');

        $usuario->save();
        return redirect()->back()
            ->with('status', 'Usuário alterado com sucesso!');


    }


}
