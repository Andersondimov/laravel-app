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
        <form role="form" method="post" action="{{url('usuarioescola/update/'.$usuarioescola->UsuarioEscolaID)}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">UsuarioEscola</h1>
                <div class="form-group">
                    <label for="UsuarioID">Usuario</label>
                    <select class="form-control" name="UsuarioID">
                    @foreach ( $usuarioescola->Usuario as $Usuario )
                        <option @if ($Usuario->UsuarioID == $usuarioescola->UsuarioID) selected @endif value="{{$Usuario->UsuarioID}}">{{$Usuario->Usuario}}</option>
                    @endforeach
                    </select>
                </div>
                <h1 class="bd-title" id="content">UsuarioEscola</h1>
                <div class="form-group">
                    <label for="EscolaID">Escola</label>
                    <select class="form-control" name="EscolaID">
                        @foreach ( $usuarioescola->Escola as $Escola )
                            <option @if ($Escola->EscolaID == $usuarioescola->EscolaID) selected @endif value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="UsuarioEscolas">Status</label>
                    <select class="form-control" name="UsuarioEscolaStatus">
                        <option value="1" @if(isset($usuarioescola) && $usuarioescola->UsuarioEscolaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($usuarioescola) && $usuarioescola->UsuarioEscolaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($usuarioescola) && $usuarioescola->UsuarioEscolaStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                            @if(isset($usuarioescola->UsuarioEscolaDTAtivacao) && $usuarioescola->UsuarioEscolaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($usuarioescola->UsuarioEscolaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                            @if(isset($usuarioescola->UsuarioEscolaDTInativacao) && $usuarioescola->UsuarioEscolaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($usuarioescola->UsuarioEscolaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                            @if(isset($usuarioescola->UsuarioEscolaDTBloqueio) && $usuarioescola->UsuarioEscolaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($usuarioescola->UsuarioEscolaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
        <script>
                $("#campoCelular").mask("(99) 09999-9999");
        </script>
    </body>
</html>
