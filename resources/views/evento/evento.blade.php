@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <form role="form" method="post" action="{{action('EventoController@store')}}">
        @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Eventos</h1>
            <form>
                <div class="form-group">
                    <label for="UsuarioID">Usuario</label>
                    <select class="form-control" name="UsuarioID">
                        @foreach ( $Usuarios as $Usuario)
                            <option value="{{$Usuario->UsuarioID}}">{{$Usuario->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Nome do Evento</label>
                    <input type="text" class="form-control" name="Evento" placeholder="Nome" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Cod. do Evento</label>
                    <input type="text" class="form-control" name="EventoCod" placeholder="Cod. Evento" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="EventoStatus">
                        <option value="1">Ativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação: --/--/---- 00:00:00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
@endsection
