@extends('layout.layout')

@section('title', 'Carteira Escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Carteira Escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('escolacarteira.index') }}">Carteira Escola</a>
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
            @if(isset($EscolaAlunoCarteiraTot) && $EscolaAlunoCarteiraTot != '')
                Total de Pontos: {{$EscolaAlunoCarteiraTot}}
            @endif
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Ponto Gerado</th>
                    <th>Ponto Doado</th>
                    <th>Ponto Trocado</th>
                    <th>Aluno</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                @if(count($EscolaAlunoCarteira)>0)
                    @foreach ( $EscolaAlunoCarteira as $dados )
                        <tr>
                            <td>{{ $dados->Nome }}</td>
                            <td>
                                @if($dados->Action == 'Gerado')
                                    {{ $dados->QTD }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($dados->Action == 'Doado')
                                    {{ $dados->QTD }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($dados->Action == 'Troca')
                                    {{ $dados->QTD }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $dados->Aluno }}</td>
                            <td>{{ \Carbon\Carbon::parse($dados->DT)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Não há movimentações em sua carteira</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection