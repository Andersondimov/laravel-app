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
    <div class="bd-example">
        <form role="form" method="post" action="{{url('ponto/update/'.$ponto->PontoID)}}">
            @csrf
            <h1 class="bd-title" id="content">Ponto</h1>
            <div class="form-group">
                <label for="UsuarioEscolaID">Usuario Escola</label>
                <select class="form-control" name="UsuarioEscolaID">
                    @foreach ( $ponto->UsuarioEscola as $UsuarioEscola )
                        <option @if ($UsuarioEscola->UsuarioEscolaID == $ponto->UsuarioEscolaID) 
                        selected @endif value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                        {{$UsuarioEscola->Escola.' - '.$UsuarioEscola->UsuarioNome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pontos</label>
                <input type="text" class="form-control" name="PontoQuantidade" @if(isset($ponto))value="{{ old('', $ponto->PontoQuantidade) }}"@endif placeholder="Pontos" />
            </div>
            <div class="form-group">
                <label for="Pontos">Status</label>
                <select class="form-control" name="PontoStatus">
                    <option value="1" @if(isset($ponto) && $ponto->PontoStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($ponto) && $ponto->PontoStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($ponto) && $ponto->PontoStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                            @if(isset($ponto->PontoDTAtivacao) && $ponto->PontoDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($ponto->PontoDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                            @if(isset($ponto->PontoDTInativacao) && $ponto->PontoDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($ponto->PontoDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                            @if(isset($ponto->PontoDTBloqueio) && $ponto->PontoDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($ponto->PontoDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script>
            $("#campoCelular").mask("(99) 09999-9999");
    </script>

</body>
</html>
