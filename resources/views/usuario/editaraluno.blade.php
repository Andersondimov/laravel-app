@extends('layout.layout')

@section('title', 'Editar Usuário Aluno')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Usuário Aluno</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuario.list') }}">Lista Usuário</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar Usuário Aluno</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection
@section('content')
        <form role="form" method="post" action="{{url('usuario/updatealuno/'.$usuario->UsuarioID)}}">
            @csrf
            <fieldset disabled>
                <div class="form-group">
                    <label for="exampleInputEmail1">Login do Usuario</label>
                    <input type="text" class="form-control" name="UsuarioLogin" @if(isset($usuario))value="{{ old('', $usuario->UsuarioLogin) }}"@endif placeholder="Usuario" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Usuario</label>
                    <input type="text" class="form-control" name="UsuarioNome" @if(isset($usuario))value="{{ old('', $usuario->UsuarioNome) }}"@endif />
                </div>
            </fieldset>
            <div class="form-group">
                <label for="validationCustom01">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" id="validationCustom01" required/>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Confirmar Senha do Usuario</label>
                <input type="text" class="form-control" name="ConfirmarUsuarioSenha" id="validationCustom01" required/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>Foto Usuario</b></label>
                <input type="file" class="form-control-file" name="image" id="image">
                <label for="exampleInputPassword1">Tamanho Máximo 25KB </label>
            </div>
            <div class="form-group">
                <img src="<?php echo asset('storage/usuario'.$usuario->UsuarioID.'.png'); ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                               @if(isset($usuario->UsuarioDTAtivacao) && $usuario->UsuarioDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($usuario->UsuarioDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($usuario->UsuarioDTInativacao) && $usuario->UsuarioDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($usuario->UsuarioDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($usuario->UsuarioDTBloqueio) && $usuario->UsuarioDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($usuario->UsuarioDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
@endsection