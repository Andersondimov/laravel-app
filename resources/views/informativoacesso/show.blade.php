@extends('layout.app')
@section('content')
        <div class="bd-example">
            <h1 class="bd-title" id="content">Informativo de Acesso</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Informativo</th>
                    <th>Vigência - Data Inicial</th>
                    <th>Vigência - Data Fim</th>
                    <th>Escola</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $InformativoAcessos as $informativoacesso )
                        <tr>
                            <td>{{ $informativoacesso->InformativoAcesso }}</td>
                            <td>{{ $informativoacesso->InformativoAcessoDTIni->format('d/m/Y') }}</td>
                            <td>{{ $informativoacesso->InformativoAcessoDTFim->format('d/m/Y') }}</td>
                            <td>{{ $informativoacesso->escola->Escola }}</td>        
                                <td>
                                    <a href="{{ url('informativoacesso/editar/'.$informativoacesso->InformativoAcessoID) }}">Alterar</a>
                                </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('InformativoAcessoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection