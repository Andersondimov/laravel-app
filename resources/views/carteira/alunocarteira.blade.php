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

<div class="ibox ">
    <div class="home">
        @if(isset($AlunoCarteiraTot) && $AlunoCarteiraTot != '')
            Total de Pontos: {{$AlunoCarteiraTot}}
        @endif
    </div>

    <div class="ibox-content" id="ibox-content">
        <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
            @php
                $c = 0;
            @endphp

                @foreach ( $AlunoCarteira as $dados )

                @php
                    $c++;
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
                            Aluno: {{ $dados->Aluno ?? $dados->Nome }}
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


















