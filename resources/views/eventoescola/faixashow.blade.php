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
            @if($action==1)
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
            @endif

            @if($action==2)
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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('eventoescola/eventofaixa/faixagravarimport/'.$FaixasEventoEscolas[0]->EventoEscolaID)}}">
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
            @endif
            @if($action==3)
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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('eventoescola/eventofaixa/faixagravarmanual/'.$EventoEscolaID)}}">
                        {{  csrf_field()  }}
                        <h4 for="exampleInputPassword1">Repasse de Pontos</h4>
                        <br>
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="UsuarioEscolaID">Evento</label>
                                <select class="form-control" name="Evento">
                                    <option value =""> {{$UsuarioEscolas[0]->Evento}}</option>
                                </select>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="UsuarioEscolaID">Aluno</label>
                            <select class="form-control" name="UsuarioEscolaID">
                                @foreach ( $UsuarioEscolas as $UsuarioEscola )
                                    <option value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                                        {{$UsuarioEscola->UsuarioNome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parâmetro - Número</label>
                            <input type="number" class="form-control" min="1" max="9999999" name="Ponto" id="validationCustom01">
                        </div>
                        <div class="form-group">
                            <label for="DataFIm">Parâmetro - Data</label>
                            <div class="input-group " id="calendarioFim">
                                <input type="date" class="form-control" name="DT" placeholder="dd/mm/aaaa" id="validationCustom01">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">OK</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

    </body>
</html>
