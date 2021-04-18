<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function TesteLogin()
    {
        $email = 'pedvitoriajddapenha@cna.com.br';
        $password = '123456';
        $remember = false;

        echo 'teste';
        Auth::attempt(['UsuarioEmail' => $email, 'UsuarioSenha' => $password]);


        dd(Auth::user());

    }
}
