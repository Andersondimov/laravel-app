@extends('layout.layout')

@section('title', 'Editar Informativo Acesso')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Informativo Acesso </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('informativoacesso.list') }}">Lista Informativo Acesso </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar Informativo Acesso </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{route('informativoacesso.update',$informativoacesso->InformativoAcessoID)}}">
            @csrf
            @include('informativoacesso.input')
        </form>
@endsection