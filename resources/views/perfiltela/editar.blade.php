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
        <form role="form" method="post" action="{{url('perfiltela/update/'.$perfiltela->PerfilTelaID)}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">PerfilTela</h1>
                <div class="form-group">
                    <label for="PerfilID">Perfil</label>
                    <select class="form-control" name="PerfilID">
                        @foreach ( $perfiltela->Perfil as $Perfil )
                            <option @if ($Perfil->PerfilID == $perfiltela->PerfilID) selected @endif value="{{$Perfil->PerfilID}}">{{$Perfil->Perfil}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="TelaID">Tela</label>
                    <select class="form-control" name="TelaID">
                        @foreach ( $perfiltela->Tela as $Tela )
                            <option @if ($Tela->TelaID == $perfiltela->TelaID) selected @endif value="{{$Tela->TelaID}}">{{$Tela->Tela}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="PerfilTelaStatus">
                        <option value="1" @if(isset($perfiltela) && $perfiltela->PerfilTelaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($perfiltela) && $perfiltela->PerfilTelaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($perfiltela) && $perfiltela->PerfilTelaStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Motivo Bloqueio</label>
                    <input type="text" class="form-control" name="PerfilTelaMotivoBloqueio"  @if(isset($perfiltela))value="{{ old('', $perfiltela->PerfilTelaMotivoBloqueio) }}"@endif />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($perfiltela->PerfilTelaDTAtivacao) && $perfiltela->PerfilTelaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($perfiltela->PerfilTelaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                @if(isset($perfiltela->PerfilTelaDTInativacao) && $perfiltela->PerfilTelaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($perfiltela->PerfilTelaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                @if(isset($perfiltela->PerfilTelaDTBloqueio) && $perfiltela->PerfilTelaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($perfiltela->PerfilTelaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </body>
</html>
