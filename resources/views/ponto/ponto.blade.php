@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
        <form role="form" method="post" action="{{action('PontoController@store')}}">
        @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Pontos</h1>
            <form>
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
