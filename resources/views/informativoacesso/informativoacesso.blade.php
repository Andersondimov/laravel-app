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

    <form role="form" method="post" action="{{action('InformativoAcessoController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Informativo de Acesso</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Informativo de Acesso</label>
                <input type="text" class="form-control" name="InformativoAcesso" placeholder="Acesso" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data de Inicia</label>
                <div class="input-group date" id="calendario" data-provide="datepicker">
                    <input type="text" class="form-control" name="InformativoAcessoDTIni" placeholder="dd/mm/aaaa" />
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data do Fim</label>
                <div class="input-group date" id="calendario" data-provide="datepicker">
                    <input type="text" class="form-control" name="InformativoAcessoDTFim" placeholder="dd/mm/aaaa" />
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            
        </form>
    </div>
    </body>
</html>
