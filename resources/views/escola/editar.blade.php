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
        <form role="form" method="post" action="{{url('escola/update/'.$escola->EscolaID)}}">
            @csrf
            <div class="bd-example">
                <h1 class="bd-title" id="content">Escola</h1>
                <div class="form-group">
                    <label for="RedeID">Rede</label>
                    <select class="form-control" name="RedeID">
                        <option value="14" @if(isset($escola) && $escola->RedeID == 14)selected @endif>CNA</option>
                        <option value="15" @if(isset($escola) && $escola->RedeID == 15)selected @endif>WIZARD</option>
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
                    <input type="text" class="form-control" name="EscolaCNPJ" @if(isset($escola))value="{{ old('', $escola->EscolaCNPJ) }}"@endif />
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
                    <label for="exampleInputEmail1">Pontuação Inicial</label>
                    <input type="number" class="form-control" name="EscolaPontuacaoIni"  @if(isset($escola))value="{{ old('', $escola->EscolaPontuacaoIni) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefone (Somente números))</label>
                    <input type="text" class="form-control" name="EscolaTelefone"  @if(isset($escola))value="{{ old('', $escola->EscolaTelefone) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular (Somente números))</label>
                    <input type="text" class="form-control" name="EscolaCelular"  @if(isset($escola))value="{{ old('', $escola->EscolaCelular) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Celular Pix (Somente números))</label>
                    <input type="text" class="form-control" name="EscolaCelularPix"  @if(isset($escola))value="{{ old('', $escola->EscolaCelularPix) }}"@endif />
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="EscolaStatus">
                        <option value="1" @if(isset($escola) && $escola->EscolaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($escola) && $escola->EscolaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($escola) && $escola->EscolaStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control"
                                   value="Data Ativação: {{ \Carbon\Carbon::parse($escola->EscolaDTAtivacao)->format('d/m/Y H:i:s') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control"
                                   value="Data Inativação: {{ \Carbon\Carbon::parse($escola->EscolaDTInativacao)->format('d/m/Y H:i:s') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control"
                                   value="Data Bloqueio: {{ \Carbon\Carbon::parse($escola->EscolaDTBloqueio)->format('d/m/Y H:i:s') }}">
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </body>
</html>
