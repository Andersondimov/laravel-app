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
        <form role="form" method="post" action="{{url('informativoacesso/update/'.$informativoacesso->InformativoAcessoID)}}">
            @csrf
            <h1 class="bd-title" id="content">InformativoAcesso</h1>
            <div class="form-group">
                <label for="EscolaID">Escola</label>
                <select class="form-control" name="EscolaID">
                    @foreach ( $informativoacesso->Escola as $Escola )
                        <option @if ($Escola->EscolaID == $informativoacesso->EscolaID) selected @endif value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
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
</body>
</html>
