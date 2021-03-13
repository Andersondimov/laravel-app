@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
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
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
        <script>
@endsection