@extends('layout.layout')

@section('title', 'Cadastrar Faixa - Evento Escola')

@section('breadcrumb')
<div class="col-lg-10">
    <h2>Cadastrar Faixa</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('eventoescola.list') }}">Lista Evento Escola</a>
        </li>
        <li class="breadcrumb-item active">
            <strong>Cadastrar Faixa</strong>
        </li>
    </ol>
</div>
<div class="col-lg-2">

</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{url('eventoescola/eventofaixa/faixagravar/'.$Dados[0]->EventoEscolaID)}}">
        @csrf
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
                        <a id="Data" href="#">Data </a> /
                        <a id="Numero" href="#">Número </a>
                    </div>
                    <div style="display: none" id="ParamDataIni" class="form-group">
                        <label for="DataFIm">Data Ini</label>
                        <div class="input-group " id="calendarioIni">
                            <input type="date" class="form-control" name="FaixaEventoDTIni" placeholder="dd/mm/aaaa" id="validationCustom01">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div style="display: none" id="ParamDataFim" class="form-group">
                        <label for="DataFIm">Data Fim</label>
                        <div class="input-group " id="calendarioFim">
                            <input type="date" class="form-control" name="FaixaEventoDTFim" placeholder="dd/mm/aaaa" id="validationCustom01">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div id="ParamNumIni" class="form-group">
                        <label for="DataFIm">Num Ini</label>
                        <input type="number" class="form-control" name="FaixaEventoNumIni" min="1" max="100" />
                    </div>
                    <div id="ParamNumFim" class="form-group">
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
@endsection
@section('script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#Data").click(function(){
                $("#ParamDataIni").show();
                $("#ParamDataFim").show();
                $("#ParamNumIni").hide();
                $("#ParamNumFim").hide();
            });
            $("#Numero").click(function(){
                $("#ParamDataIni").hide();
                $("#ParamDataFim").hide();
                $("#ParamNumIni").show();
                $("#ParamNumFim").show();
            });
        });
    </script>
@endsection