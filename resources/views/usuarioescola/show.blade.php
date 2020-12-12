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
            <h1 class="bd-title" id="content">UsuarioEscola</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>UsuarioEscola</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($UsuarioEscolas)>0)
                    @foreach ( $UsuarioEscolas as $usuarioescola )
                        <tr>
                            <td>{{ $usuarioescola->UsuarioEscola }}</td>
                            <td>
                                @if($usuarioescola->UsuarioEscolaStatus == 1)
                                    Ativo
                                @elseif($usuarioescola->UsuarioEscolaStatus == 2)
                                    Inativo
                                @else($usuarioescola->UsuarioEscolaStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('usuarioescola/editar/'.$usuarioescola->UsuarioEscolaID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhum UsuarioEscola Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('UsuarioEscolaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
