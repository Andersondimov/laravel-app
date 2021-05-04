@extends('layout.layout')

@section('title', 'Editar compra')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar compra</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('alunocompra.list') }}">Lista compra</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar compra</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{url('alunocompra/update/'.$alunocompra->AlunoCompraID)}}">
            @csrf
            <div class="form-group">
                <label for="UsuarioEscolaID">Nome Usuario</label>
                <select class="form-control" name="UsuarioEscolaID">
                    @foreach ( $alunocompra->UsuarioEscola as $UsuarioEscola )
                        <option @if ($UsuarioEscola->UsuarioEscolaID == $alunocompra->UsuarioEscolaID) selected @endif value="{{$UsuarioEscola->UsuarioEscolaID}}">
                            {{$UsuarioEscola->UsuarioNome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Quantia de Pontos</label>
                <input type="text" class="form-control" name="AlunoCompraQuantidade" id="validationCustom01" required @if(isset($alunocompra))value="{{ old('', $alunocompra->AlunoCompraQuantidade) }}"@endif placeholder="Pontos" />
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="AlunoCompras">Status</label>
                <select class="form-control" name="AlunoCompraStatus">
                    <option value="1" @if(isset($alunocompra) && $alunocompra->AlunoCompraStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($alunocompra) && $alunocompra->AlunoCompraStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($alunocompra) && $alunocompra->AlunoCompraStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                            @if(isset($alunocompra->AlunoCompraDTAtivacao) && $alunocompra->AlunoCompraDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($alunocompra->AlunoCompraDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
@endsection