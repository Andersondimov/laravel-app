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
        <h1 class="bd-title" id="content">PerfilTela</h1>
        <form>
            <div class="form-group">
                <label for="PerfilID">Perfil</label>
                <select class="form-control" name="PerfilID">
                    @foreach ( $Perfils as $Perfil )
                        <option value="{{$Perfil->PerfilID}}">{{$Perfil->Perfil}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <form>
            <div class="form-group">
                <label for="TelaID">Tela</label>
                <select class="form-control" name="TelaID">
                    @foreach ( $Telas as $Tela )
                        <option value="{{$Tela->TelaID}}">{{$Tela->Tela}}</option>
                    @endforeach
                </select>
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
