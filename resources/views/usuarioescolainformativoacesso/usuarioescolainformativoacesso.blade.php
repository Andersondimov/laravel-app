@extends('layout.layout')

@section('title', 'Cadastrar Usuario Escola Informativo Acesso')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar Usuario Escola Informativo Acesso</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuarioescolainformativoacesso.list') }}">Usuario Escola Informativo Acesso</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar Usuario Escola Informativo Acesso</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('UsuarioEscolaInformativoAcessoController@store')}}">
        @csrf
                <div class="form-group">
                    <label for="informativo">Usuario Escola</label>
                    <select class="form-control" name="UsuarioEscolaID">
                        @foreach ( $UsuarioEscolas as $UsuarioEscola )
                            <option value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                                {{$UsuarioEscola->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Informativo Acesso</label>
                    <input type="text" class="form-control" name="InformativoAcessoID" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="DataFIm">Data Ativação</label>
                    <div class="input-group " id="calendarioFim">
                        <input type="date" class="form-control" name="UsuarioEscolaInformativoAcessoIDDTAtivacao" placeholder="dd/mm/aaaa" id="validationCustom01" required >
                        <div class="valid-feedback">Tudo certo!</div>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Status">Acesso</label>
                    <select class="form-control" name="UsuarioEscolaInformativoAcesso">
                        <option value="1">Aprovado</option>
                        <option value="2">Não Aprovado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
@endsection
@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
@endsection