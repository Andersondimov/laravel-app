@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <form role="form" method="post" action="{{action('UsuarioController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Usuario</h1>
        <form>
            <div class="form-group">
                <label for="PerfilID">Perfil</label>
                <select class="form-control" name="PerfilID">
                    @foreach ( $Perfis as $Perfil )
                        <option value="{{$Perfil->PerfilID}}">{{$Perfil->Perfil}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Login do Usuario</label>
                <input type="text" class="form-control" name="UsuarioLogin" placeholder="Usuario" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" placeholder ="NOVA@1234" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Nome do Usuario</label>
                <input type="text" class="form-control" name="UsuarioNome" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="validationCustom01">Email</label>
                        <input type="text" class="form-control" name="UsuarioEmail" placeholder="Email" id="validationCustom01" required >
                        <div class="valid-feedback">Tudo certo!</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Celular</label>
                <input type="text" class="form-control" name="UsuarioCelular" id="campoCelular" maxlength="15" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Matrícula Usuário</label>
                <input type="text" class="form-control" name="UsuarioMatricula" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="UsuarioStatus">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script>
            $("#campoCelular").mask("(99) 09999-9999");
    </script>
@endsection
