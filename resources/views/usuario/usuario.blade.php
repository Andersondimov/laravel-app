@extends('layout.layout')

@section('title', 'Cadastrar Usuário')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar Usuário</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuario.list') }}">Lista Usuário</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar Usuário</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{action('UsuarioController@store')}}">
        @csrf
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script>
            $("#campoCelular").mask("(99) 09999-9999");
    </script>
@endsection
