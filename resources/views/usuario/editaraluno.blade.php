<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/components/forms/">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/assets/css/docs.min.css" rel="stylesheet">
</head>
<body>
@if (session('status'))
<div class="alert-success">
    {{ session('status') }}
</div>
@endif
<div class="error">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    <div class="bd-example">
        <form role="form" method="post" action="{{url('usuario/updatealuno/'.$usuario->UsuarioID)}}">
            @csrf
            <h1 class="bd-title" id="content">Usuario</h1>
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
                <label for="exampleInputEmail1">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Confirmar Senha do Usuario</label>
                <input type="text" class="form-control" name="ConfirmarUsuarioSenha" />
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
    </div>

</body>
</html>
