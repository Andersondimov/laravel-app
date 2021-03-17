@extends('layout.layout')

@section('title', 'Home')

@section('title', 'Editar Usuario Escola Informativo Acesso')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Usuario Escola Informativo Acesso</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuarioescolainformativoacesso.list') }}">Usuario Escola Informativo Acesso</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar Usuario Escola Informativo Acesso</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            <form role="form" method="post" action="{{url('usuarioescolainformativoacesso/update/'.$usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoID)}}">
                @csrf
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
                        <input type="date" class="form-control" name="UsuarioEscolaInformativoAcessoIDDTAtivacao" placeholder="dd/mm/aaaa" value="{{$usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAtivacao ? $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAtivacao->format('Y-m-d') : ''}}" />
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
@endsection