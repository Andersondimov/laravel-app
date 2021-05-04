@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('title', 'Cadastro de parâmetro')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de parâmetro</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('escola.list') }}">Lista Escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastro de parâmetro</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection
@section('content')
        <form role="form" method="post" enctype="multipart/form-data" action="{{url('escola/updateparams/'.$escola->EscolaID)}}">
            @csrf
                <fieldset disabled>
                    <div class="form-group">
                        <label for="RedeID">Rede</label>
                        <select class="form-control" name="RedeID">
                            @foreach ( $escola->Rede as $Rede )
                                <option @if ($Rede->RedeID == $escola->RedeID) selected @endif value="{{$Rede->RedeID}}">{{$Rede->Rede}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome da Escola</label>
                    <input type="text" class="form-control" name="Escola" @if(isset($escola))value="{{ old('', $escola->Escola) }}"@endif placeholder="Name" />
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cod. Escola</label>
                        <input type="text" class="form-control" @if(isset($escola))value="{{ old('', $escola->EscolaCod) }}"@endif />
                    </div>
                <div class="form-group">
                    <label for="validationCustom01">Email</label>
                    <input type="text" class="form-control" name="EscolaEmail" @if(isset($escola))value="{{ old('', $escola->EscolaEmail) }}"@endif placeholder="Email" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                </fieldset>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" id="campoTelefone" class="form-control" name="EscolaTelefone"  @if(isset($escola))value="{{ old('', $escola->EscolaTelefone) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular</label>
                    <input type="text" class="form-control" name="EscolaCelular" id="campoCelular" @if(isset($escola))value="{{ old('', $escola->EscolaCelular) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chave Pix</label>
                    <input type="text" class="form-control" id="campoCelularPix" name="EscolaCelularPix"  @if(isset($escola))value="{{ old('', $escola->EscolaCelularPix) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Escola CNPJ</label>
                    <input type="text" class="form-control" name="EscolaCNPJ" id="campoCNPJ" @if(isset($escola))value="{{ old('', $escola->EscolaCNPJ) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome Moeda Escola</label>
                    @foreach ( $escola->Moeda as $Moeda )
                        <input type="text" class="form-control" name="EscolaNomeMoeda" id="EscolaNomeMoeda"
                               @if(isset($Moeda->EscolaNomeMoeda) && $Moeda->EscolaNomeMoeda != '') value="{{ old('', $Moeda->EscolaNomeMoeda) }}"
                               @else value="{{ old('', $Moeda->RedeNomeMoeda) }}" @endif
                        />
                    @endforeach
                </div>
                <fieldset disabled>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantidade de alunos</label>
                        <input type="text" class="form-control"  @if(isset($escola))value="{{ old('', $escola->Qtdaluno) }}"@endif />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Valor de cobrança</label>
                        <input type="text" class="form-control"  @if(isset($escola))value="{{ old('', 'R$ '.$escola->EscolaValorTot) }}"@endif />
                    </div>
                    <div class="form-group">
                        <label for="DataFIm">Dia Vencimento</label>
                        <input type="number" class="form-control" name="EscolaDiaVencimento" min="1" max="30"  @if(isset($escola))value="{{ old('', $escola->EscolaDiaVencimento) }}"@endif />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Motivo Bloqueio</label>
                        <input type="text" class="form-control"  @if(isset($escola))value="{{ old('', $escola->EscolaMotivoBloqueio) }}"@endif />
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="TelaID"><b>Eventos Relacionados</b></label>
                    <div class="form-check">
                        @foreach ( $escola['Eventos'] as $Evento )
                            <div class="i-checks">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="EventoID[{{$Evento->EventoID}}]" value="{{$Evento->EventoID}}"
                                    @if(isset($escola['EscolaEventos']) && count($escola['EscolaEventos']) > 0)
                                         @foreach ( $escola['EscolaEventos'] as $escolaEvento )
                                             @if($Evento->EventoID == $escolaEvento->EventoID) checked @endif
                                         @endforeach
                                     @endif
                             > <i></i>
                                {{$Evento->Evento}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><b>Logo Escola</b></label>
                    <input type="file" class="form-control-file" name="image" id="image">
                    <label for="exampleInputPassword1">Tamanho Máximo 25KB </label>
                </div>
                <div class="form-group">
                    <img src="<?php echo asset('storage/escola'.$escola->EscolaID.'.png'); ?>">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Cadastro:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTCadastro) && $escola->EscolaDTCadastro != '') value="Data Cadastro: {{ \Carbon\Carbon::parse($escola->EscolaDTCadastro)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTAtivacao) && $escola->EscolaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($escola->EscolaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTInativacao) && $escola->EscolaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($escola->EscolaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTBloqueio) && $escola->EscolaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($escola->EscolaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
        </form>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

<script src="{{ url('js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#campoTelefone").mask("(99) 9999-9999");
        $("#campoCelular").mask("(99) 09999-9999");
        $("#campoCNPJ").mask("99.999.999/9999-99");
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green'
        });
    });
</script>
    
@endsection