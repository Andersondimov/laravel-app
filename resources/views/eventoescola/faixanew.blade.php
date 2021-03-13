@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <form role="form" method="post" action="{{url('eventoescola/eventofaixa/faixagravar/'.$Dados[0]->EventoEscolaID)}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Faixa</h1>
        <form>
            <div class="form-group">
                <fieldset disabled>
                    <div class="form-group">
                        <label for="RedeID">Rede</label>
                        @if(count($Dados)>0)
                            @foreach ( $Dados as $Dado )
                            <input type="text" class="form-control" value="{{$Dado->Rede}}">
                            <input type="hidden" class="form-control" name="EventoEscolaID" value="{{$Dado->EventoEscolaID}}">
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Escola</label>
                        @if(count($Dados)>0)
                            @foreach ( $Dados as $Dado )
                                <input type="text" class="form-control" value="{{$Dado->Escola}}">
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Evento</label>
                        @if(count($Dados)>0)
                            @foreach ( $Dados as $Dado )
                                <input type="text" class="form-control" value="{{$Dado->Evento}}">                            @endforeach
                        @endif
                    </div>
                </fieldset>
                <hr>
                <div class="form-group">
                    <h2 id="content">Parâmetros - Faixa</h2>
                    <div class="form-group">
                        <label for="DataFIm">Data Ini</label>
                        <div class="input-group " id="calendarioIni">
                            <input type="date" class="form-control" name="FaixaEventoDTIni" placeholder="dd/mm/aaaa" id="validationCustom01">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="DataFIm">Data Fim</label>
                        <div class="input-group " id="calendarioFim">
                            <input type="date" class="form-control" name="FaixaEventoDTFim" placeholder="dd/mm/aaaa" id="validationCustom01">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="DataFIm">Num Ini</label>
                        <input type="number" class="form-control" name="FaixaEventoNumIni" min="1" max="100" />
                    </div>
                    <div class="form-group">
                        <label for="DataFIm">Num Fim</label>
                        <input type="number" class="form-control" name="FaixaEventoNumFim" min="1" max="100" />
                    </div>
                    <hr><br>
                </div>
                <div class="form-group">
                    <label for="DataFIm">Pontuação</label>
                    <input type="number" class="form-control" name="FaixaEventoPontoQuantidade" min="1" max="100" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
        </form>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
@endsection
