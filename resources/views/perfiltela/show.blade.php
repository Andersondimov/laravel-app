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
            <h1 class="bd-title" id="content">Perfil Tela</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Perfil</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($PerfilTelas)>0)
                        @foreach ( $PerfilTelas as $perfiltela )
                            <tr>
                                <td>{{ $perfiltela->Perfil }}</td>
                                <td>
                                    @if($perfiltela->PerfilTelaStatus == 1)
                                        Ativo
                                    @elseif($perfiltela->PerfilTelaStatus == 2)
                                        Inativo
                                    @else($perfiltela->PerfilTelaStatus == 3)
                                        Bloqueado
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('perfiltela/editar/'.$perfiltela->PerfilID) }}">Alterar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3">Nenhum Perfil Tela Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('PerfilTelaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
