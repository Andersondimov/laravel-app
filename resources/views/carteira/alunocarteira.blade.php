@extends('layout.layout')

@section('title', 'Carteira Aluno')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Carteira Aluno</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('carteira.index') }}">Carteira Aluno</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    @csrf
    <div class="bd-example">
        <div class="bd-example">
            @if(isset($AlunoCarteiraTot) && $AlunoCarteiraTot != '')
                Total de Pontos: {{$AlunoCarteiraTot}}
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Ponto Recebido</th>
                    <th>Compras</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                @if(count($AlunoCarteira)>0)
                    @foreach ( $AlunoCarteira as $dados )
                        <tr>
                            <td>{{ $dados->Nome }}</td>
                            <td>
                                @if($dados->Action == 'Recebido')
                                    {{ $dados->QTD }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($dados->Action == 'Compra')
                                    {{ $dados->QTD }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($dados->DT)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Não há movimentações em sua carteira</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection