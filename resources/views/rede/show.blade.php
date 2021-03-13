@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
            @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Rede</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Rede</th>
                    <th>Cod. Rede</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Redes)>0)
                    @foreach ( $Redes as $rede )
                        <tr>
                            <td>{{ $rede->Rede }}</td>
                            <td>{{ $rede->RedeCod }}</td>
                            <td>
                                @if($rede->RedeStatus == 1)
                                    Ativo
                                @elseif($rede->RedeStatus == 2)
                                    Inativo
                                @else($rede->RedeStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('rede/editar/'.$rede->RedeID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhuma Rede Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('RedeController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection