<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $Menu = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->leftjoin('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
                ,'Usuario.UsuarioNome'
                ,'Escola.Escola'
                ,'Perfil.Perfil'
            )
            ->get();

        return view('home', ['menu' => $Menu]);
    }

    public function telasLiberadas($request)
    {
        $Menu = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->leftjoin('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
                ,'Usuario.UsuarioNome'
                ,'Escola.Escola'
                ,'Perfil.Perfil'
            )
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $Menu;
    }
}
