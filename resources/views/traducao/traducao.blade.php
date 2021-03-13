@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
@endsection
