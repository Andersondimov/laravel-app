@extends('layout.layout')

@section('title', 'Editar Evento Escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Evento Escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('eventoescola.list') }}">Lista Evento Escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar Evento Escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{url('eventoescola/update/'.$EventoEscolas['IDS'][0]->EscolaID)}}">
            @csrf
            <div class="bd-example">
                <div class="form-group">
                    <label for="EscolaID">Escola</label>
                    <div class="form-group">
                        <select class="form-control" name="EscolaID">
                                <option value="{{$EventoEscolas['IDS'][0]->EscolaID}}">{{$EventoEscolas['IDS'][0]->Escola}}</option>
                        </select>
                    </div>                  
                </div>
                <div class="form-group">
                    <label for="EventoID">Evento</label>
                    <div class="form-check">
                        @foreach ( $EventoEscolas['Eventos'] as $Evento )
                            <input type="checkbox" class="form-check-input" name="EventoID[{{$Evento->EventoID}}]" value="{{$Evento->EventoID}}"
                            @if(isset($EventoEscolas[0]) && count($EventoEscolas[0]) > 0)
                                @foreach ( $EventoEscolas[0] as $EventoEscola )
                                    @if($Evento->EventoID == $EventoEscola->EventoID) checked @endif
                                @endforeach
                            @endif
                            >
                            <label class="form-check-label" for="exampleCheck1">{{$Evento->Evento}}</label><br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
        </form>
@endsection