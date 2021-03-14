@extends('layout.layout')

@section('title', 'Cadastrar Ponto')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar Ponto</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('ponto.list') }}">Lista Ponto </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar Ponto</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('PontoController@store')}}">
        @csrf
        <div class="bd-example">
                <div class="form-group">
                    <label for="UsuarioEscolaID">Usuario Escola</label>
                    <select class="form-control" name="UsuarioEscolaID" >
                        @foreach ( $UsuarioEscolas as $UsuarioEscola )
                            <option value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                                {{$UsuarioEscola->Escola.' - '.$UsuarioEscola->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="UsuarioEscolaID">Adicionar / Baixar Pontos</label>
                    <select class="form-control" name="PontoOperacao" >
                        @foreach ( $UsuarioEscolas as $UsuarioEscola )
                            <option value ="1">+ / Adicionar</option>
                            <option value ="2">- / Baixar</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pontos</label>
                    <input type="text" class="form-control" name="PontoQuantidade" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>

            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
@endsection
