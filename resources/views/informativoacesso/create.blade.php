@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
    <h1 class="bd-title" id="content">Informativo de Acesso</h1>
    <form role="form" method="post" action="{{action('InformativoAcessoController@store')}}">
        @csrf
        @include('informativoacesso.input')
    </form>  
@endsection
    