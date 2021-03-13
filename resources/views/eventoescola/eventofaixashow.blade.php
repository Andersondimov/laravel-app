@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Faixas Evento Escola</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Evento</th>
                    <th>Administrar</th>
                    <th>Importar Arquivo (Repasse de Ponto)</th>
                    <th>Repasse de Ponto Manual</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($EventoEscolas)>0)
                        @foreach ( $EventoEscolas as $eventoescola )
                            <tr>
                                <td>{{ $eventoescola->Escola }}</td>
                                <td>{{ $eventoescola->Evento }}</td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$eventoescola->EventoEscolaID).'/1' }}">Faixas</a>
                                </td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/faixaslist/'.$eventoescola->EventoEscolaID).'/2' }}">importar</a>
                                </td>
                                <td>
                                    <a href="{{ url('eventoescola/eventofaixa/RepasseForm/'.$eventoescola->EventoEscolaID).'/3' }}">Repassar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5">Nenhum Evento Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
@endsection
