@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
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
@endsection