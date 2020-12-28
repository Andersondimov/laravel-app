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
            <h1 class="bd-title" id="content">Ponto</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Quantidade</th>
                    <th>Operacao</th>
{{--                    <th>Status</th>--}}
{{--                    <th>Atualizar</th>--}}
                </tr>
                </thead>
                <tbody>
                @if(count($Pontos)>0)
                    @foreach ( $Pontos as $ponto )
                        <tr>
                            <td>{{ $ponto->Escola}}</td>
                            <td>{{ $ponto->PontoQuantidade }}</td>
                            <td>
                                @if($ponto->PontoOperacao == 1)
                                    Adicionado
                                @else($ponto->PontoOperacao != 2)
                                    Subtraido
                                @endif
                            </td>
{{--                            <td>--}}
{{--                                <a href="{{ url('ponto/editar/'.$ponto->PontoID) }}">Alterar</a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Nenhum Ponto Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('PontoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
