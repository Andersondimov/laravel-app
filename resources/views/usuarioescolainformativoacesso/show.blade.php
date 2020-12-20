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
                <h1 class="bd-title" id="content">Usuario Escola Informativo Acesso</h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>ID Data Ativacao</th>
                        <th>Informativo Acesso</th>
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
                                <td colspan="4">Nenhum Ponto Cadastrado</td>
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
    </body>
</html>
