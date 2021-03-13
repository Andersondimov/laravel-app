@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
        <form role="form" method="post" action="{{action('AlunoCompraController@store')}}">
        @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Aluno Compra</h1>
            <form>
                <div class="form-group">
                    <label for="validationCustom01">Usuario Escola</label>
                    <select class="form-control" name="UsuarioEscolaID" >
                        @foreach ( $UsuarioEscolas as $UsuarioEscola )
                            <option value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                                {{$UsuarioEscola->UsuarioNome}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Pontos</label>
                    <input type="text" class="form-control" name="AlunoCompraQuantidade" 
                        id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="AlunoCompraStatus">
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
                </fieldset>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
@endsection
