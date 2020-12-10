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
                <label for="exampleInputEmail1">Login do Usuario</label>
                <input type="text" class="form-control" name="UsuarioLogin" placeholder="Usuario" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" value="NOVA@1234" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Usuario</label>
                <input type="text" class="form-control" name="UsuarioNome" />
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="UsuarioEmail" placeholder="Email" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Celular</label>
                <input type="text" class="form-control" name="UsuarioCelular" id="campoCelular" maxlength="15" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Matrícula Usuário</label>
                <input type="text" class="form-control" name="UsuarioMatricula" />
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

    </body>
</html>
