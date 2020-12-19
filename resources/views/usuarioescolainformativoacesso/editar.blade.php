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
            <form role="form" method="post" action="{{url('usuarioescolainformativoacesso/update/'.$usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoID)}}">
                @csrf
                <h1 class="bd-title" id="content">Usuario Escola Informativo Acesso</h1>
                <div class="form-group">
                    <label for="UsuarioEscolaID">Usuario Escola</label>
                    <select class="form-control" name="UsuarioEscolaID">
                        @foreach ( $usuarioescolainformativoacesso->UsuarioEscola as $UsuarioEscola )
                        <option @if ($UsuarioEscola->UsuarioEscolaID == $usuarioescolainformativoacesso->UsuarioEscolaID) selected @endif value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                            {{$UsuarioEscola->Escola.' - '.$UsuarioEscola->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Data Ativação</label>
                    <div class="input-group " id="control" >
                        <input type="date" class="form-control" name="UsuarioEscolaInformativoAcessoIDDTAtivacao" placeholder="dd/mm/aaaa" value="{{$escola->UsuarioEscolaInformativoAcessoIDDTAtivacao ? $escola->UsuarioEscolaInformativoAcessoIDDTAtivacao->format('Y-m-d') : ''}}" />
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="UsuarioEscolaInformativoAcessos">Acesso</label>
                    <select class="form-control" name="UsuarioEscolaInformativoAcesso">
                        <option value="1" @if(isset($usuarioescolainformativoacesso) && $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso == 1)selected @endif>Aprovado</option>
                        <option value="2" @if(isset($usuarioescolainformativoacesso) && $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso == 2)selected @endif>Não Aprovado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
        </div>
    </body>
</html>
