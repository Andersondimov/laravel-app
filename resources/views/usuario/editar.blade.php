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
        <form role="form" method="post" action="{{url('usuario/update/'.$usuario->UsuarioID)}}">
            @csrf
            <h1 class="bd-title" id="content">Usuario</h1>
            <div class="form-group">
                <label for="PerfilID">Perfil</label>
                <select class="form-control" name="PerfilID">
                    @foreach ( $usuario->Perfil as $Perfil )
                        <option @if ($Perfil->PerfilID == $usuario->PerfilID) selected @endif value="{{$Perfil->PerfilID}}">{{$Perfil->Perfil}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Login do Usuario</label>
                <input type="text" class="form-control" name="UsuarioLogin" @if(isset($usuario))value="{{ old('', $usuario->UsuarioLogin) }}"@endif placeholder="Usuario" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Usuario</label>
                <input type="text" class="form-control" name="UsuarioNome" @if(isset($usuario))value="{{ old('', $usuario->UsuarioNome) }}"@endif />
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="UsuarioEmail" placeholder="Email"  @if(isset($usuario))value="{{ old('', $usuario->UsuarioEmail) }}"@endif />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Celular</label>
                <input type="text" class="form-control" name="UsuarioCelular" id="campoCelular" maxlength="15" @if(isset($usuario))value="{{ old('', $usuario->UsuarioCelular) }}"@endif />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Matrícula Usuário</label>
                <input type="text" class="form-control" name="UsuarioMatricula" @if(isset($usuario))value="{{ old('', $usuario->UsuarioMatricula) }}"@endif />
            </div>
            <div class="form-group">
                <label for="Usuarios">Status</label>
                <select class="form-control" name="UsuarioStatus">
                    <option value="1" @if(isset($usuario) && $usuario->UsuarioStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($usuario) && $usuario->UsuarioStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($usuario) && $usuario->UsuarioStatus == 3)selected @endif>Bloqueado</option>
                </select>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script>
            $("#campoCelular").mask("(99) 09999-9999");
    </script>

</body>
</html>
