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
            <h1 class="bd-title" id="content">Escola</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Cod. Escola</th>
                    <th>Escola CNPJ</th>
                    <th>Rede</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                    <th>Parametros</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Escolas)>0)
                    @foreach ( $Escolas as $escola )
                        <tr>
                            <td>{{ $escola->Escola }}</td>
                            <td>{{ $escola->EscolaCod }}</td>
                            <td id="campoCNPJ">{{ $escola->EscolaCNPJ }}</td>
                            <td>{{ $escola->Rede }}</td>
                            <td>
                                @if($escola->EscolaStatus == 1)
                                    Ativo
                                @elseif($escola->EscolaStatus == 2)
                                    Inativo
                                @elseif($escola->EscolaStatus == 3)
                                    Bloqueado
                                @else($escola->EscolaStatus == 4)
                                    Prospect
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('escola/editar/'.$escola->EscolaID) }}">Alterar</a>
                            </td>
                            <td>
                                <a href="{{ url('escola/editarparams/'.$escola->EscolaID) }}">Parametros</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Nenhuma Escola Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('EscolaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

            <script>
                $("#campoCNPJ").mask("99.999.999/9999-99");

            </script>
    </body>
</html>
