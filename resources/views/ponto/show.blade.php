@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Ponto</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Quantidade</th>
                    <th>Operacao</th>
{{--                    <th>Status</th>--}}
{{--                    <th>Atualizar</th>--}}
                </tr>
                </thead>
                <tbody>
                @if(count($Pontos)>0)
                    @foreach ( $Pontos as $ponto )
                        <tr>
                            <td>{{ $ponto->Escola}}</td>
                            <td>{{ $ponto->PontoQuantidade }}</td>
                            <td>
                                @if($ponto->PontoOperacao == 1)
                                    Adicionado
                                @else($ponto->PontoOperacao != 2)
                                    Subtraido
                                @endif
                            </td>
{{--                            <td>--}}
{{--                                <a href="{{ url('ponto/editar/'.$ponto->PontoID) }}">Alterar</a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Nenhum Ponto Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('PontoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection