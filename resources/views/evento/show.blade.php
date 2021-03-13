@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Evento</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Evento Cod</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Eventos)>0)
                    @foreach ( $Eventos as $evento )
                        <tr>
                            <td>{{ $evento->Evento }}</td>
                            <td>{{ $evento->EventoCod }}</td>
                            <td>
                                @if($evento->EventoStatus == 1)
                                    Ativo
                                @elseif($evento->EventoStatus == 2)
                                    Inativo
                                @else($evento->EventoStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('evento/editar/'.$evento->EventoID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhum Evento Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('EventoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection
