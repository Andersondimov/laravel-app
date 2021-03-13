@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Usuario Escola</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($UsuarioEscolas)>0)
                        @foreach ( $UsuarioEscolas as $usuarioescola )
                            <tr>
                                <td>{{ $usuarioescola->Escola }}</td>
                                <td>
                                    @if($usuarioescola->UsuarioEscolaStatus == 1)
                                        Ativo
                                    @elseif($usuarioescola->UsuarioEscolaStatus == 2)
                                        Inativo
                                    @else($usuarioescola->UsuarioEscolaStatus == 3)
                                        Bloqueado
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('usuarioescola/editar/'.$usuarioescola->EscolaID) }}">Alterar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6">Nenhuma Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('UsuarioEscolaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection