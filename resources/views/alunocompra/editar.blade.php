@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
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
                <label for="validationCustom01">Quantia de Pontos</label>
                <input type="text" class="form-control" name="AlunoCompraQuantidade" id="validationCustom01" required @if(isset($alunocompra))value="{{ old('', $alunocompra->AlunoCompraQuantidade) }}"@endif placeholder="Pontos" />
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="AlunoCompras">Status</label>
                <select class="form-control" name="AlunoCompraStatus">
                    <option value="1" @if(isset($alunocompra) && $alunocompra->AlunoCompraStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($alunocompra) && $alunocompra->AlunoCompraStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($alunocompra) && $alunocompra->AlunoCompraStatus == 3)selected @endif>Bloqueado</option>
                </select>
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
@endsection
