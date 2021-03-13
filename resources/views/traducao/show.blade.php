@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Lista de Palavras</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>BR</th>
                    <th>US</th>
                    <th>ES</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Traducoes)>0)
                    @foreach ( $Traducoes as $Traducao )
                        <tr>
                            <td>{{ $Traducao->TraducaoTextoBr }}</td>
                            <td>{{ $Traducao->TraducaoTextoUs }}</td>
                            <td>{{ $Traducao->TraducaoTextoEs }}</td>
                            <td>
                                <a href="{{ url('traducao/editar/'.$Traducao->TraducaoID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhuma Palavra Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('TraducaoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection
