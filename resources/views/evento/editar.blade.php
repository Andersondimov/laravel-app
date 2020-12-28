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
            <form role="form" method="post" action="{{url('evento/update/'.$evento->EventoID)}}">
                @csrf
                <h1 class="bd-title" id="content">Evento</h1>
                <div class="form-group">
                    <label for="UsuarioID">Usuario</label>
                    <select class="form-control" name="UsuarioID">
                        @foreach ( $evento->Usuario as $Usuario )
                            <option @if ($Usuario->UsuarioID == $evento->UsuarioID) selected @endif value="{{$Usuario->UsuarioID}}">{{$Usuario->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Evento</label>
                    <input type="text" class="form-control" name="Evento" id="validationCustom01" required @if(isset($evento))
                        value="{{ old('', $evento->Evento) }}"@endif placeholder="Evento" />
                        <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Cod do Evento</label>
                    <input type="text" class="form-control" name="EventoCod" id="validationCustom01" required @if(isset($evento))
                        value="{{ old('', $evento->EventoCod) }}"@endif placeholder="Cod" />
                        <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="Evento">Status</label>
                    <select class="form-control" name="EventoStatus">
                        <option value="1" @if(isset($evento) && $evento->EventoStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($evento) && $evento->EventoStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($evento) && $evento->EventoStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($evento->EventoDTAtivacao) && $evento->EventoDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($evento->EventoDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                @if(isset($evento->EventoDTInativacao) && $evento->EventoDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($evento->EventoDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                @if(isset($evento->EventoDTBloqueio) && $evento->EventoDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($evento->EventoDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </body>
</html>
