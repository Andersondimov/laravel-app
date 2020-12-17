<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/components/forms/">
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.0/assets/css/docs.min.css" rel="stylesheet">
    </head>
    <body>
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <form role="form" method="post" action="{{url('eventoescola/update/'.$EventoEscolas['IDS'][0]->EscolaID)}}">
            @csrf
            <div class="bd-example">
                <div class="form-group">
                    <label for="EscolaID">Escola</label>
                    <div class="form-check">
                        @foreach ( $EventoEscolas as $EventoEscola )
                            <input type="checkbox" class="form-check-input" name="EscolaID[{{$EventoEscola->Escola}}]" value="{{$Escola->EscolaID}}"
                            @if(isset($EventoEscolas[0]) && count($EventoEscolas[0]) > 0)
                                @foreach ( $EventoEscolas[0] as $EventoEscola )
                                    @if($Escola->EscolaID == $EventoEscola->EscolaID) checked @endif
                                @endforeach
                            @endif>
                            <label class="form-check-label" for="exampleCheck1">{{$Escola->Escola}}</label><br>
                        @endforeach
                    </div>
                    <h1 class="bd-title" id="content">Evento</h1>
                    <div class="form-group">
                        <label for="EventoID">Evento</label>
                        <select class="form-control">
                            <option selected>{{$EventoEscolas['IDS'][0]->Evento}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="EventoStatus">
                        <option value="1" @if(isset($EventoEscolas['IDS'][0]->EventoStatus) && $EventoEscolas['IDS'][0]->EventoStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($EventoEscolas['IDS'][0]->EventoStatus) && $EventoEscolas['IDS'][0]->EventoStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($EventoEscolas['IDS'][0]->EventoStatus) && $EventoEscolas['IDS'][0]->EventoStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
        </form>
    </body>
</html>