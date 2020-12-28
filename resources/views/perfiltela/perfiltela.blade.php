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
    <form role="form" method="post" action="{{action('PerfilTelaController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Perfil Tela</h1>
            <div class="form-group">
                <label for="PerfilID">Perfil</label>
                <select class="form-control" name="PerfilID">
                    @foreach ( $Dados->PerfilID as $Perfil )
                        <option value="{{$Perfil->PerfilID}}">{{$Perfil->Perfil}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="TelaID">Tela</label>
                <div class="form-check">
                    @foreach ( $Dados->TelaID as $Tela )
                        <input type="checkbox" class="form-check-input" name="TelaID[{{$Tela->TelaID}}]" value="{{$Tela->TelaID}}">
                        <label class="form-check-label" for="exampleCheck1">{{$Tela->Tela}}</label><br>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="PerfilTelaStatus">
                        <option value="1">Ativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação: --/--/---- 00:00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    

    </body>
</html>
