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
        <form role="form" method="post" action="{{url('alunocompra/update/'.$alunocompra->AlunoCompraID)}}">
            @csrf
            <h1 class="bd-title" id="content">Aluno Compra</h1>
            <div class="form-group">
                <label for="UsuarioEscolaID">Nome Usuario</label>
                <select class="form-control" name="UsuarioEscolaID">
                    @foreach ( $alunocompra->UsuarioEscola as $UsuarioEscola )
                        <option @if ($UsuarioEscola->UsuarioEscolaID == $alunocompra->UsuarioEscolaID) selected @endif value="{{$UsuarioEscola->UsuarioEscolaID}}">
                            {{$UsuarioEscola->UsuarioNome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Quantia de Pontos</label>
                <input type="text" class="form-control" name="AlunoCompraQuantidade" @if(isset($alunocompra))value="{{ old('', $alunocompra->AlunoCompraQuantidade) }}"@endif placeholder="Pontos" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                            @if(isset($alunocompra->AlunoCompraDTAtivacao) && $alunocompra->AlunoCompraDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($alunocompra->AlunoCompraDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
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
