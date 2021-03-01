<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/components/forms/">
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.0/assets/css/docs.min.css" rel="stylesheet">
    </head>
    <body>
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Usuário</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                    <th>Dados do Usuário</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Usuarios)>0)
                    @foreach ( $Usuarios as $usuario )
                        <tr>
                            <td>{{ $usuario->UsuarioNome }}</td>
                            <td>{{ $usuario->Perfil }}</td>
                            <td>{{ $usuario->UsuarioLogin }}</td>
                            <td>{{ $usuario->UsuarioEmail }}</td>
                            <td>
                                @if($usuario->UsuarioStatus == 1)
                                    Ativo
                                @elseif($usuario->UsuarioStatus == 2)
                                    Inativo
                                @else($usuario->UsuarioStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('usuario/editar/'.$usuario->UsuarioID) }}">Alterar</a>
                            </td>
                            <td>
                                <a href="{{ url('usuario/editaraluno/'.$usuario->UsuarioID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Nenhum Usuário Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('UsuarioController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
