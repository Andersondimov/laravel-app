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
    <form role="form" method="post" action="{{action('EscolaController@store')}}">
        @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Escola</h1>
        <form>
            <div class="form-group">
                <label for="RedeID">Rede</label>
                <select class="form-control" name="RedeID">
                    @foreach ( $Redes as $Rede )
                        <option value="{{$Rede->RedeID}}">{{$Rede->Rede}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Escola</label>
                <input type="text" class="form-control" name="Escola" placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cod. Escola</label>
                    <input type="text" class="form-control" name="EscolaCod" placeholder="Cod." />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha Escola</label>
                    <input type="text" class="form-control" name="EscolaSenha" value="NOVA@1234"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Escola CNPJ</label>
                    <input type="text" class="form-control" name="EscolaCNPJ" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor Fixo</label>
                    <input type="text" class="form-control" name="EscolaValorFixo" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor Vaviável</label>
                    <input type="text" class="form-control" name="EscolaValorVaviavel" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pontuação Inicial</label>
                    <input type="number" class="form-control" name="EscolaPontuacaoIni" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone (Somente números))</label>
                    <input type="text" class="form-control" name="EscolaTelefone" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular (Somente números))</label>
                    <input type="text" class="form-control" name="EscolaCelular" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular Pix (Somente números))</label>
                    <input type="text" class="form-control" name="EscolaCelularPix" />
                </div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="EscolaStatus">
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                    <option value="3">Bloqueado</option>
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
