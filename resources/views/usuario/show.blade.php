@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
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
@endsection