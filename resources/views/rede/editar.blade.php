@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
<form role="form" method="post" action="{{url('rede/update/'.$rede->RedeID)}}">
    @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Rede</h1>
        <form>
            <div class="form-group">
                <label for="validationCustom01">Nome da Rede</label>
                <input type="text" class="form-control" name="Rede" id="validationCustom01" required @if(isset($rede))value="{{ old('', $rede->Rede) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="validationCustom01">Cod. Rede</label>
                    <input type="text" class="form-control" name="RedeCod" id="validationCustom01" required @if(isset($rede))value="{{ old('', $rede->RedeCod) }}"@endif placeholder="Cod." />
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Moeda da Rede</label>
                <input type="text" class="form-control" name="RedeNomeMoeda" placeholder="Name" @if(isset($rede))value="{{ old('', $rede->RedeNomeMoeda) }}"@endif>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="RedeStatus">
                    <option value="1" @if(isset($rede) && $rede->RedeStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($rede) && $rede->RedeStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($rede) && $rede->RedeStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($rede->RedeDTAtivacao) && $rede->RedeDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($rede->RedeDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($rede->RedeDTInativacao) && $rede->RedeDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($rede->RedeDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($rede->RedeDTBloqueio) && $rede->RedeDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($rede->RedeDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection