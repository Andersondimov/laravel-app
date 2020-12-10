<?php

namespace App\Http\Controllers;

use App\Usuario;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Usuario\UsuarioCreate;
use App\Http\Requests\Usuario\UsuarioAlter;

class UsuarioController extends Controller
{
    public function index()
    {
        $Perfis =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->get();
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
                    'Perfil.Perfil'
                )
                ->get();
        return view('usuario/show', compact('Usuarios'));
    }

    public function edit($UsuarioID)
    {
        $usuario = Usuario::findOrFail($UsuarioID);
        $usuario['Perfil'] = DB::table('Perfil')
        ->select(
            'Perfil.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        return view('usuario/editar', compact('usuario'));
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
