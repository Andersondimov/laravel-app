@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <form role="form" method="post" action="{{action('UsuarioEscolaController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Usuario Escola</h1>
            <div class="form-group">
                <label for="EscolaID">Escolas</label>
                <select class="form-control" name="EscolaID">
                    @foreach ( $Dados->EscolaID as $Escola )
                        <option value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="UsuarioID">Usuarios</label>
                <div class="form-check">
                    @foreach ( $Dados->UsuarioNome as $Usuario )
                    <input type="checkbox" class="form-check-input" name="UsuarioNome[{{$Usuario->UsuarioID}}]" value="{{$Usuario->UsuarioID}}">
                    <label class="form-check-label" for="exampleCheck1">{{$Usuario->UsuarioNome}}</label><br>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="UsuarioEscolaStatus">
                        <option value="1">Ativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
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