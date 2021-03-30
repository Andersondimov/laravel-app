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


<div class="row">
    <div class="col-md-9">
        <div class="ibox ">
            <div class="ibox-content animated rollIn" id="ibox-content">
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
                                @if ($dados->Action == 'Compra')
                                    <div class="alert alert-warning">
                                        <h5>{{$dados->Action}}</h5>
                                    </div>
                                @else
                                    <div class="alert alert-success">
                                        <h5>{{$dados->Action}}</h5>
                                    </div>
                                @endif

                                <p>
                                    <button class="btn-primary dim btn-default-dim" type="button"><i class="fa fa-dollar"></i>
                                        {{$dados->QTD}}
                                    </button>
                                </p>
                                <p>
                                    <button class="btn-primary dim btn-default-dim" type="button"><i class="fa fa-user"></i>&nbsp;&nbsp;
                                        {{ $dados->Aluno ?? $dados->Nome }}
                                    </button>

                                </p>
                                <span class="vertical-date">
                                    <p class="text-info">{{ \Carbon\Carbon::parse($dados->DT)->format('d/m/Y H:i:s') }}</p>
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
    </div>
    <div class="col-md-3">
        @if(isset($AlunoCarteiraTot) && $AlunoCarteiraTot != '')
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-dollar fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> Total de Pontos </span>
                    <h2 class="font-bold">{{$AlunoCarteiraTot}}</h2>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection 


















