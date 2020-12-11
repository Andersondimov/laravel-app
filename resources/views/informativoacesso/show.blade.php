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
            <h1 class="bd-title" id="content">InformativoAcesso</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>InformativoAcesso</th>
                    <th>InformativoAcessoDTIni</th>
                    <th>InformativoAcessoDTFim</th>
                </tr>
                </thead>
                <tbody>
                @if(count($InformativoAcessos)>0)
                    @foreach ( $InformativoAcessos as $informativoacesso )
                        <tr>
                            <td>
                                <a href="{{ url('informativoacesso/editar/'.$informativoacesso->InformativoAcessoID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('InformativoAcessoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
    </body>
</html>
