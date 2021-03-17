@extends('layout.layout')

@section('title', 'Cadastrar Escola Evento')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar Evento Escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('eventoescola.list') }}">Lista Evento Escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar Evento Escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('EventoEscolaController@store')}}">
            @csrf
                <div class="form-group">
                    <label for="EscolaID">Escola</label>
                    <select class="form-control" name="EscolaID">
                        @foreach ( $Dados->EscolaID as $Escola )
                            <option value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="EventoID">Evento</label>
                    <div class="form-check">
                        @foreach ( $Dados->EventoID as $Evento )
                            <input type="checkbox" class="form-check-input" name="EventoID[{{$Evento->EventoID}}]" value="{{$Evento->EventoID}}">
                            <label class="form-check-label" for="exampleCheck1">{{$Evento->Evento}}</label><br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-check-input" name="EventoStatus" value="1">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </div>
        </form>
@endsection