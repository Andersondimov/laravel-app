@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Tela</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Tela</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Telas)>0)
                    @foreach ( $Telas as $tela )
                        <tr>
                            <td>{{ $tela->Tela }}</td>
                            <td>
                                @if($tela->TelaStatus == 1)
                                    Ativo
                                @elseif($tela->TelaStatus == 2)
                                    Inativo
                                @else($tela->TelaStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('tela/editar/'.$tela->TelaID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Nenhuma Tela Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('TelaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection
