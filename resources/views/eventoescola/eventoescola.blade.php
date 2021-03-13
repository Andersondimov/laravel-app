@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
        <form role="form" method="post" action="{{action('EventoEscolaController@store')}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Escola</h1>
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
            </div>
        </form>
@endsection