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
                    <th>Num Ini</th>
                    <th>Num Fim</th>
                    <th>DT Ini</th>
                    <th>DT Fim</th>
                    <th>Pontuação</th>
{{--                    <th>Administrar</th>--}}

                </tr>
                </thead>
                <tbody>
                    @if(count($FaixasEventoEscolas)>0)
                        @foreach ( $FaixasEventoEscolas as $FaixasEventoEscola )
                            <tr>
                                <td>{{ $FaixasEventoEscola->Escola }}</td>
                                <td>{{ $FaixasEventoEscola->Evento }}</td>
                                <td>{{ $FaixasEventoEscola->FaixaEventoNumIni }}</td>
                                <td>{{ $FaixasEventoEscola->FaixaEventoNumFim }}</td>
                                <td> @if(isset($FaixasEventoEscola->FaixaEventoDTIni) && $FaixasEventoEscola->FaixaEventoDTIni != '') {{ \Carbon\Carbon::parse($FaixasEventoEscola->FaixaEventoDTIni)->format('d/m/Y') }} @endif</td>
                                <td> @if(isset($FaixasEventoEscola->FaixaEventoDTFim) && $FaixasEventoEscola->FaixaEventoDTFim != '') {{ \Carbon\Carbon::parse($FaixasEventoEscola->FaixaEventoDTFim)->format('d/m/Y') }} @endif</td>
                                <td>{{ $FaixasEventoEscola->FaixaEventoPontoQuantidade }}</td>
{{--                                <td>--}}
{{--                                    <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$FaixasEventoEscola->FaixaEventoID) }}">Editar Faixa</a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="7">Nenhuma Faixa de Evento Cadastrada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="form-group">
                <a href="{{ url('eventoescola/eventofaixa/faixanew/'.$FaixasEventoEscola->EventoEscolaID) }}">
                    <button class="btn btn-primary">NOVO</button>
                </a>
            </div>
            <div class="form-group">
                @if (session('status'))
                    <div class="alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('erro'))
                    <div class="alert-danger">
                        {{ session('erro') }}
                    </div>
                @endif
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <form role="form" method="post" enctype="multipart/form-data" action="{{url('eventoescola/eventofaixa/faixagravarimport/'.$FaixasEventoEscola->EventoEscolaID)}}">
                    {{  csrf_field()  }}
                    <h4 for="exampleInputPassword1">Importar Repasse de Pontos</h4>
                    <input type="file" class="form-control-file" name="importcsv" id="importcsv" required>
                    <br>
                    <hr>
                    <div class="form-group">
                        <h6 for="exampleInputPassword1">Formato CSV, primeiro dado Matrícula Aluno, segundo dado Parâmetros - Faixa (Número) e terceiro dado Parâmetros - Faixa (Data).
                            Os dados devem ser separados por ponto e vírgula (;)</h6><br>
                        <h6 for="exampleInputPassword1">Exemplo -> <b>mat-aluno;parametro-numero;parametro-dt</b></h6>
                        <h6 for="exampleInputPassword1">Exemplo com Parâmetro tipo Número -> <b>mat-0001;8</b></h6>
                        <h6 for="exampleInputPassword1">Exemplo com Parâmetro tipo Data -> <b>mat-0001;;2021-02-01</b></h6>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Importar</button>
                </form>
            </div>
        </div>
    </body>
</html>
