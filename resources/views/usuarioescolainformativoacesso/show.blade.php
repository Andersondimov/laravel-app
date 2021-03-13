@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Usuario Escola Informativo Acesso</h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>ID Data Ativacao</th>
                        <th>Informativo Acesso</th>
                        <th>Status</th>
                        <th>Atualizar</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($UsuarioEscolaInformativoAcessos)>0)
                            @foreach ( $UsuarioEscolaInformativoAcessos as $usuarioescolainformativoacesso )
                                <tr>
                                    <td>{{ $usuarioescolainformativoacesso->Usuario }}</td>
                                    <td>{{ $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAtivacao->format('d/m/Y') }}</td>
                                    <td>
                                        @if($usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso == 1)
                                            Aprovado
                                        @else($usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso == 2)
                                            Não Aprovado
                                        @endif
                                    </td>        
                                    <td>
                                        <a href="{{ url('usuarioescolainformativoacesso/editar/'.$usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoID) }}">Alterar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Nenhum Usuario Escola Cadastrado</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="form-group">
                    <form role="form" method="get" action="{{action('UsuarioEscolaInformativoAcessoController@index')}}">
                        <button type="submit" class="btn btn-primary">NOVO</button>
                    </form>
                </div>
            </div>
@endsection