<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use DB;
use Illuminate\Foundation\Auth as S;


class LoginController extends Controller
{


    //use RedirectsUsers, ThrottlesLogins;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'UsuarioLogin';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
       $dados = $request->request->all();

       $this->validateLogin($request);

       $credential = $request->only(['UsuarioLogin','UsuarioSenha']);

       if(Auth::attempt($credential, false)){
           $dadosUser = $this->BuascaDadosUser($dados['UsuarioLogin']);
           $request->session()->put('UsuarioEmail', $dadosUser[0]->UsuarioEmail);
           $request->session()->put('UsuarioNome', $dadosUser[0]->UsuarioNome);
           $request->session()->put('UsuarioID', $dadosUser[0]->UsuarioID);
           $request->session()->put('UsuarioLogin', $dadosUser[0]->UsuarioLogin);
           $request->session()->put('Perfil', $dadosUser[0]->Perfil);
           $request->session()->put('PerfilCod', $dadosUser[0]->PerfilCod);
           $request->session()->put('PerfilID', $dadosUser[0]->PerfilID);
           $request->session()->put('Escola', $dadosUser[0]->Escola);
           $request->session()->put('EscolaID', $dadosUser[0]->EscolaID);
           $request->session()->put('Rede', $dadosUser[0]->Rede);
           $request->session()->put('RedeID', $dadosUser[0]->RedeID);

           redirect('/home');
       }

        return redirect()->back()
            ->with('status', 'Erro ao tentar logar, favor tentar novamente mais tarde! ');

    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'UsuarioLogin' => 'required|string',
            'UsuarioSenha' => 'required|string',
        ]);
    }

    protected function BuascaDadosUser($UsuarioLogin)
    {
        $user = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->leftjoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->leftjoin('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->leftjoin('Rede','Escola.RedeID', '=', 'Rede.RedeID')
            ->where('Usuario.UsuarioLogin', '=', $UsuarioLogin)
            ->select(
                'Usuario.UsuarioNome'
                ,'Usuario.UsuarioID'
                ,'Usuario.UsuarioLogin'
                ,'Usuario.UsuarioEmail'
                ,'Perfil.Perfil'
                ,'Perfil.PerfilID'
                ,'Perfil.PerfilCod'
                ,'Escola.Escola'
                ,'Escola.EscolaID'
                ,'Rede.Rede'
                ,'Rede.RedeID'
            )
            ->get();

        return $user;
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('UsuarioLogin', 'UsuarioSenha');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
