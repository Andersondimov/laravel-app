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
    <form role="form" method="post" action="{{action('PerfilController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Perfil</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Perfil</label>
                <input type="text" class="form-control" name="Perfil" @if(isset($adrs_dtls))value="{{ old('', $adrs_dtls->Perfil) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cod. Perfil</label>
                    <input type="text" class="form-control" name="PerfilCod" @if(isset($adrs_dtls))value="{{ old('', $adrs_dtls->PerfilCod) }}"@endif placeholder="Cod." />
                </div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="PerfilStatus">
                    <option value="1" @if(isset($adrs_dtls) && $adrs_dtls->PerfilCod == 1)checked @endif>Ativo</option>
                    <option value="2" @if(isset($adrs_dtls) && $adrs_dtls->PerfilCod == 2)checked @endif>Inativo</option>
                    <option value="3" @if(isset($adrs_dtls) && $adrs_dtls->PerfilCod == 3)checked @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
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
