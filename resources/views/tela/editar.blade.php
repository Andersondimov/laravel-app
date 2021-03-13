@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
<form role="form" method="post" action="{{url('tela/update/'.$tela->TelaID)}}">
    @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Tela</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Tela</label>
                <input type="text" class="form-control" name="Tela" id="validationCustom01" required @if(isset($tela))value="{{ old('', $tela->Tela) }}"@endif placeholder="Name" />
                <div class="valid-feedback">Tudo certo!</div> 
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="TelaStatus">
                    <option value="1" @if(isset($tela) && $tela->TelaStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($tela) && $tela->TelaStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($tela) && $tela->TelaStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                               @if(isset($tela->TelaDTAtivacao) && $tela->TelaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($tela->TelaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($tela->TelaDTInativacao) && $tela->TelaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($tela->TelaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($tela->TelaDTBloqueio) && $tela->TelaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($tela->TelaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
