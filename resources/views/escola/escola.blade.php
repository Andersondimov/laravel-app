@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
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
                <label for="validationCustom01">Nome da Escola</label>
                <input type="text" class="form-control" name="Escola" 
                    placeholder="Name" id="validationCustom01" required>
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="validationCustom01">Cod. Escola</label>
                    <input type="text" class="form-control" name="EscolaCod" placeholder="Cod." id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Senha Escola</label>
                    <input type="text" class="form-control" name="EscolaSenha" placeholder="NOVA@1234" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Escola CNPJ</label>
                    <input type="text" class="form-control" name="EscolaCNPJ" id="campoCNPJ" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Valor Fixo</label>
                    <input type="text" class="form-control" name="EscolaValorFixo" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Valor Vaviável</label>
                    <input type="text" class="form-control" name="EscolaValorVaviavel" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Dia Vencimento</label>
                    <input type="number" class="form-control" min="1" max="30" name="EscolaDiaVencimento" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="DataFIm">Data Expiração</label>
                    <div class="input-group " id="calendarioFim">
                        <input type="date" class="form-control" name="EscolaDTExpiracao" placeholder="dd/mm/aaaa" id="validationCustom01" required>
                        <div class="valid-feedback">Tudo certo!</div>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Telefone</label>
                    <input type="text" id="campoTelefone" class="form-control" name="EscolaTelefone" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Celular</label>
                    <input type="text" class="form-control" name="EscolaCelular" id="campoCelular" id="validationCustom01" required>
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Chave Pix</label>
                    <input type="text" class="form-control" id="campoCelularPix" name="EscolaCelularPix" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome Moeda Escola</label>
                    <input type="text" class="form-control" id="EscolaNomeMoeda" name="EscolaNomeMoeda" >
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="EscolaStatus">
                        <option value="1">Ativo</option>
                        <option value="4">Prospect</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Cadastro:   --/--/---- 00:00:00">
                    </div>
                </div>
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
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Prospect:   --/--/---- 00:00:00">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

        <script>
            $("#campoTelefone").mask("(99) 9999-9999");
            $("#campoCelular").mask("(99) 09999-9999");
            $("#campoCNPJ").mask("99.999.999/9999-99");

        </script>

@endsection