@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <form role="form" method="post" action="{{action('RedeController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Rede</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Rede</label>
                <input type="text" class="form-control" name="Rede" placeholder="Name" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cod. Rede</label>
                    <input type="text" class="form-control" name="RedeCod" placeholder="Cod. Rede" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Moeda da Rede</label>
                <input type="text" class="form-control" name="RedeNomeMoeda" placeholder="Name" >
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="RedeStatus">
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