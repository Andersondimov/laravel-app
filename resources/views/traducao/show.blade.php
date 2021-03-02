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
            <h1 class="bd-title" id="content">Lista de Palavras</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>BR</th>
                    <th>US</th>
                    <th>ES</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Traducoes)>0)
                    @foreach ( $Traducoes as $Traducao )
                        <tr>
                            <td>{{ $Traducao->TraducaoTextoBr }}</td>
                            <td>{{ $Traducao->TraducaoTextoUs }}</td>
                            <td>{{ $Traducao->TraducaoTextoEs }}</td>
                            <td>
                                <a href="{{ url('traducao/editar/'.$Traducao->TraducaoID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhuma Palavra Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('TraducaoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
