@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Evento Escola</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Atualizar</th>
                    <th>Lista Eventos</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($EventoEscolas)>0)
                        @foreach ( $EventoEscolas as $eventoescola )
                            <tr>
                                <td>{{ $eventoescola->Escola }}</td>
                                <td>
                                    <a href="{{ url('eventoescola/editar/'.$eventoescola->EscolaID) }}">Alterar</a>
                                </td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/'.$eventoescola->EscolaID) }}">Faixas eventos escola</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="4">Nenhum Evento Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('EventoEscolaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection