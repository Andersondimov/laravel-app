@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
        <form role="form" method="post" action="{{url('usuarioescola/update/'.$UsuarioEscolas['IDS'][0]->EscolaID)}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Usuario Escola</h1>
                <div class="form-group">
                    <label for="EscolaID">Escola</label>
                    <select class="form-control">
                        <option selected>{{$UsuarioEscolas['IDS'][0]->Escola}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="UsuarioID">Usuario</label>
                    <div class="form-check">                        
                        @foreach ( $UsuarioEscolas['Usuarios'] as $Usuario )
                            <input type="checkbox" class="form-check-input" name="UsuarioID[{{$Usuario->UsuarioID}}]" value="{{$Usuario->UsuarioID}}"
                            @if(isset($UsuarioEscolas[0]) && count($UsuarioEscolas[0]) > 0)
                                @foreach ( $UsuarioEscolas[0] as $UsuarioEscola )
                                    @if($Usuario->UsuarioID == $UsuarioEscola->UsuarioID) checked @endif
                                @endforeach
                            @endif
                            >
                            <label class="form-check-label" for="exampleCheck1">{{$Usuario->UsuarioNome}}</label><br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="UsuarioEscolaStatus">
                        <option value="1" @if(isset($UsuarioEscolas['IDS'][0]->UsuarioEscolaStatus) && $UsuarioEscolas['IDS'][0]->UsuarioEscolaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($UsuarioEscolas['IDS'][0]->UsuarioEscolaStatus) && $UsuarioEscolas['IDS'][0]->UsuarioEscolaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($UsuarioEscolas['IDS'][0]->UsuarioEscolaStatus) && $UsuarioEscolas['IDS'][0]->UsuarioEscolaStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($UsuarioEscolas['IDS'][0]->UsuarioEscolaDTAtivacao) && $UsuarioEscolas['IDS'][0]->UsuarioEscolaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($UsuarioEscolas['IDS'][0]->UsuarioEscolaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                @if(isset($UsuarioEscolas['IDS'][0]->UsuarioEscolaDTInativacao) && $UsuarioEscolas['IDS'][0]->UsuarioEscolaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($UsuarioEscolas['IDS'][0]->UsuarioEscolaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                @if(isset($UsuarioEscolas['IDS'][0]->UsuarioEscolaDTBloqueio) && $UsuarioEscolas['IDS'][0]->UsuarioEscolaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($UsuarioEscolas['IDS'][0]->UsuarioEscolaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
@endsection
