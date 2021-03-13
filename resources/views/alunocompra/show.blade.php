@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Aluno Compra</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Usuario Nome</th>
                    <th>Quantidade Adquirido</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($AlunoCompras)>0)
                    @foreach ( $AlunoCompras as $alunocompra )
                        <tr>
                            <td>{{ $alunocompra->UsuarioNome }}</td>
                            <td>{{ $alunocompra->AlunoCompraQuantidade }}</td>
                            <td>
                                <a href="{{ url('alunocompra/editar/'.$alunocompra->AlunoCompraID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Compra do Aluno não Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('AlunoCompraController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection
