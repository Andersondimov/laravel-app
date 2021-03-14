@extends('layout.layout')

@section('title', 'Cadastrar Tradução')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar Tradução</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('traducao.list') }}">Lista Tradução </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar Tradução</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('TraducaoController@store')}}">
        @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Tradução</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Br</label>
                    <input type="text" class="form-control" name="TraducaoTextoBr" id="validationCustom01" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Us</label>
                    <input type="text" class="form-control" name="TraducaoTextoUs" id="validationCustom01" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Es</label>
                    <input type="text" class="form-control" name="TraducaoTextoEs" id="validationCustom01" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
@endsection
