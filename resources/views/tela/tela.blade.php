@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <form role="form" method="post" action="{{action('TelaController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Tela</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Tela</label>
                <input type="text" class="form-control" name="Tela" placeholder="Name" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="PerfilTelaStatus">
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
