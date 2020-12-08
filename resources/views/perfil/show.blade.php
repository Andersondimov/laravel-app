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
            <h1 class="bd-title" id="content">Perfil</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Perfil</th>
                    <th>Cod. Perfil</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Perfils)>0)
                    @foreach ( $Perfils as $perfil )
                        <tr>
                            <td>{{ $perfil->Perfil }}</td>
                            <td>{{ $perfil->PerfilCod }}</td>
                            <td>
                                @if($perfil->PerfilStatus == 1)
                                    Ativo
                                @elseif($perfil->PerfilStatus == 2)
                                    Inativo
                                @else($perfil->PerfilStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('perfil/editar/'.$perfil->PerfilID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhum Perfil Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('PerfilController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
