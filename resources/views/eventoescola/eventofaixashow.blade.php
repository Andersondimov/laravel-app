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
            <h1 class="bd-title" id="content">Faixas Evento Escola</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Evento</th>
                    <th>Administrar</th>
                    <th>Importar Arquivo (Repasse de Ponto)</th>
                    <th>Repasse de Ponto Manual</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($EventoEscolas)>0)
                        @foreach ( $EventoEscolas as $eventoescola )
                            <tr>
                                <td>{{ $eventoescola->Escola }}</td>
                                <td>{{ $eventoescola->Evento }}</td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$eventoescola->EventoEscolaID).'/1' }}">Faixas</a>
                                </td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$eventoescola->EventoEscolaID).'/2' }}">importar</a>
                                </td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/RepasseForm/'.$eventoescola->EventoEscolaID).'/3' }}">Repassar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5">Nenhum Evento Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </body>
</html>
