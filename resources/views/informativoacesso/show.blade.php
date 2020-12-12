@extends('layout.app')
@section('content')
        <div class="bd-example">
            <h1 class="bd-title" id="content">InformativoAcesso</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>InformativoAcesso</th>
                    <th>InformativoAcessoDTIni</th>
                    <th>InformativoAcessoDTFim</th>
                    <th>EscolaID</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $InformativoAcessos as $informativoacesso )
                        <tr>
                            <td>{{ $informativoacesso->InformativoAcesso }}</td>
                            <td>{{ $informativoacesso->InformativoAcessoDTIni }}</td>
                            <td>{{ $informativoacesso->InformativoAcessoDTFim }}</td>
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