@extends('layout.layout')

@section('title', 'Extrato da escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Extrato da escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('escolacarteira.index') }}">Extrato da escola</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')

<div class="ibox ">
    <div class="home">
        @if(isset($EscolaAlunoCarteiraTot) && $EscolaAlunoCarteiraTot != '')
        Total de Pontos: {{$EscolaAlunoCarteiraTot}}
    @endif
    </div>

    <div class="ibox-content" id="ibox-content">
        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
            @php
                $c = 0;
            @endphp

            @foreach ( $EscolaAlunoCarteira as $dados )

                @php
                    $c++;

                    $icon = '';

                    switch ($dados->Action) {
                        case 'Compra':
                            $icon = 'fa fa-usd';
                            break;
                        case 'Gerado':
                            $icon = 'fa fa-snowflake-o';
                            break;
                        case 'Troca':
                            $icon = 'fa fa-exchange';
                            break;
                        default:
                            $icon = 'fa fa-briefcase';
                            break;
                    }
                @endphp

                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon navy-bg">
                        <i class="{{ $icon }}"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>{{$dados->Action}}</h2>
                        <p>{{$dados->QTD}}<br />
                            Aluno: {{ $dados->Aluno }}
                        </p>
                        <span class="vertical-date">
                            {{ \Carbon\Carbon::parse($dados->DT)->format('d/m/Y H:i:s') }}
                        </span>
                    </div>
                </div>
            
            @endforeach

            @if ($c == 0)
                <h3>Não há movimentações em sua carteira</h3>
            @endif

        </div>
    </div>
</div>
@endsection 














   <!-- <div class="bd-example">
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
-->