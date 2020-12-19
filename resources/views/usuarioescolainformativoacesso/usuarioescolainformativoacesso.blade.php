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
        <form role="form" method="post" action="{{action('UsuarioEscolaInformativoAcessoController@store')}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Usuario Escola Informativo Acesso</h1>
                <form>
                    <div class="form-group">
                        <label for="UsuarioEscolaID">Usuario Acesso</label>
                        <select class="form-control" name="UsuarioEscolaID" >
                            @foreach ( $UsuarioEscolas as $UsuarioEscola )
                                <option value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                                    {{$UsuarioEscola->Escola.' - '.$UsuarioEscola->UsuarioNome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="DataFIm">Data Ativação</label>
                        <div class="input-group " id="calendarioFim">
                            <input type="date" class="form-control" name="UsuarioEscolaInformativoAcessoIDDTAtivacao" placeholder="dd/mm/aaaa" />
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Status">Acesso</label>
                        <select class="form-control" name="UsuarioEscolaInformativoAcesso">
                            <option value=""></option>
                            <option value="1">Aprovado</option>
                            <option value="2">Não Aprovado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    </body>
</html>