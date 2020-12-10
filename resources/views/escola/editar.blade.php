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
        <form role="form" method="post" action="{{url('escola/update/'.$escola->EscolaID)}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Escola</h1>
                <div class="form-group">
                    <label for="RedeID">Rede</label>
                    <select class="form-control" name="RedeID">
                        @foreach ( $escola->Rede as $Rede )
                            <option value="{{$Rede->RedeID}}">{{$Rede->Rede}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome da Escola</label>
                    <input type="text" class="form-control" name="Escola" @if(isset($escola))value="{{ old('', $escola->Escola) }}"@endif placeholder="Name" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cod. Escola</label>
                    <input type="text" class="form-control" name="EscolaCod" @if(isset($escola))value="{{ old('', $escola->EscolaCod) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha Escola</label>
                    <input type="text" class="form-control" name="EscolaSenha" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Escola CNPJ</label>
                    <input type="text" class="form-control" name="EscolaCNPJ" id="campoCNPJ" @if(isset($escola))value="{{ old('', $escola->EscolaCNPJ) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor Fixo</label>
                    <input type="text" class="form-control" name="EscolaValorFixo"  @if(isset($escola))value="{{ old('', $escola->EscolaValorFixo) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor Vaviável</label>
                    <input type="text" class="form-control" name="EscolaValorVaviavel"  @if(isset($escola))value="{{ old('', $escola->EscolaValorVaviavel) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dia Vencimento</label>
                    <input type="number" class="form-control" name="EscolaDiaVencimento" min="1" max="30"  @if(isset($escola))value="{{ old('', $escola->EscolaDiaVencimento) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Data Expiração</label>
                    <div class="input-group date" id="calendario" data-provide="datepicker">
                        <input type="text" class="form-control" name="EscolaDTExpiracao" placeholder="dd/mm/aaaa" @if(isset($escola->EscolaDTExpiracao) && $escola->EscolaDTExpiracao != '')value="{{ old('', $escola->EscolaDTExpiracao) }}"@endif />
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" id="campoTelefone" class="form-control" name="EscolaTelefone"  @if(isset($escola))value="{{ old('', $escola->EscolaTelefone) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular</label>
                    <input type="text" class="form-control" name="EscolaCelular" id="campoCelular" @if(isset($escola))value="{{ old('', $escola->EscolaCelular) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular Pix</label>
                    <input type="text" class="form-control" id="campoCelularPix" name="EscolaCelularPix"  @if(isset($escola))value="{{ old('', $escola->EscolaCelularPix) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="EscolaStatus">
                        <option value="1" @if(isset($escola) && $escola->EscolaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($escola) && $escola->EscolaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($escola) && $escola->EscolaStatus == 3)selected @endif>Bloqueado</option>
                        <option value="4" @if(isset($escola) && $escola->EscolaStatus == 4)selected @endif>Prospect</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Motivo Bloqueio</label>
                    <input type="text" class="form-control" name="EscolaMotivoBloqueio"  @if(isset($escola))value="{{ old('', $escola->EscolaMotivoBloqueio) }}"@endif />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Cadastro:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTCadastro) && $escola->EscolaDTCadastro != '') value="Data Cadastro: {{ \Carbon\Carbon::parse($escola->EscolaDTCadastro)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTAtivacao) && $escola->EscolaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($escola->EscolaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTInativacao) && $escola->EscolaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($escola->EscolaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                   @if(isset($escola->EscolaDTBloqueio) && $escola->EscolaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($escola->EscolaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

        <!-- crio atributo data-value para armazenar penultima data escolhida -->

        <script>
            $("#campoTelefone").mask("(99) 9999-9999");
            $("#campoCelular").mask("(99) 09999-9999");
            $("#campoCelularPix").mask("(99) 09999-9999");
            $("#campoCNPJ").mask("99.999.999/9999-99");

            $('#calendario').datepicker({
                format: "dd/mm/yyyy",
                language: "pt-BR",
                startDate: '+0d'
            }).on("change", function(e){

                //Pego o valor selecionado anteriormente
                var oldValue = $(this).attr("data-value");

                //Se não for a primeira alteração devo comparar as datas:
                if(oldValue != ""){
                    date1 = novaData(oldValue);
                    date2 = novaData($(this).val());

                    if(date1.getFullYear() != date2.getFullYear()){
                        console.log("Mudou o ano");
                        //Coloque sua lógica se mudou ano
                    }else if(date1.getMonth()+1 != date2.getMonth()+1){
                        console.log("Mudou o mês");
                        //Coloque sua lógica se mudou o mês
                    }else if(date1.getDate() != date2.getDate()){
                        console.log("Mudou o dia do mês");
                        //Coloque sua lógica se mudou o dia do mês
                    }
                }

                //Salvo a nova data selecionada no atributo data-value
                $(this).attr("data-value", $(this).val());
            });

            //Evita problemas com timezone ao definir a data
            function novaData(dataString){
                var partes = dataString.split('-');
                var data = new Date(partes[0], partes[1] - 1, partes[2]);
                return data;
            }
        </script>


    </body>
</html>
