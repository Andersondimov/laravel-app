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
        <form role="form" method="post" action="{{url('perfiltela/update/'.$PerfilTelas['IDS'][0]->PerfilID)}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Perfil Tela</h1>
                <div class="form-group">
                    <label for="PerfilID">Perfil</label>
                    <select class="form-control">
                        <option selected>{{$PerfilTelas['IDS'][0]->Perfil}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="TelaID">Tela</label>
                    <div class="form-check">
                        
                        @foreach ( $PerfilTelas['Telas'] as $Tela )
                            <input type="checkbox" class="form-check-input" name="TelaID[{{$Tela->TelaID}}]" value="{{$Tela->TelaID}}"
                            @if(isset($PerfilTelas[0]) && count($PerfilTelas[0]) > 0)
                                @foreach ( $PerfilTelas[0] as $PerfilTela )
                                    @if($Tela->TelaID == $PerfilTela->TelaID) checked @endif
                                @endforeach
                            @endif
                            >
                            <label class="form-check-label" for="exampleCheck1">{{$Tela->Tela}}</label><br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="PerfilTelaStatus">
                        <option value="1" @if(isset($PerfilTelas['IDS'][0]->PerfilTelaStatus) && $PerfilTelas['IDS'][0]->PerfilTelaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($PerfilTelas['IDS'][0]->PerfilTelaStatus) && $PerfilTelas['IDS'][0]->PerfilTelaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($PerfilTelas['IDS'][0]->PerfilTelaStatus) && $PerfilTelas['IDS'][0]->PerfilTelaStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($PerfilTelas['IDS'][0]->PerfilTelaDTAtivacao) && $PerfilTelas['IDS'][0]->PerfilTelaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($PerfilTelas['IDS'][0]->PerfilTelaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                @if(isset($PerfilTelas['IDS'][0]->PerfilTelaDTInativacao) && $PerfilTelas['IDS'][0]->PerfilTelaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($PerfilTelas['IDS'][0]->PerfilTelaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                @if(isset($PerfilTelas['IDS'][0]->PerfilTelaDTBloqueio) && $PerfilTelas['IDS'][0]->PerfilTelaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($PerfilTelas['IDS'][0]->PerfilTelaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </body>
</html>
