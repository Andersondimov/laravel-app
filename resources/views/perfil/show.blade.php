@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
        @csrf
        <div class="bd-example">
            <h1 class="bd-title" id="content">Perfil</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Perfil</th>
                    <th>Cod. Perfil</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Perfils)>0)
                    @foreach ( $Perfils as $perfil )
                        <tr>
                            <td>{{ $perfil->Perfil }}</td>
                            <td>{{ $perfil->PerfilCod }}</td>
                            <td>
                                @if($perfil->PerfilStatus == 1)
                                    Ativo
                                @elseif($perfil->PerfilStatus == 2)
                                    Inativo
                                @else($perfil->PerfilStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('perfil/editar/'.$perfil->PerfilID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhum Perfil Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('PerfilController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection