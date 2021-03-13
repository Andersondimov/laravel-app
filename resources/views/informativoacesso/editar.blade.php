@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <h1 class="bd-title" id="content">Informativo de Acesso</h1>
        <form role="form" method="post" action="{{route('informativoacesso.update',$informativoacesso->InformativoAcessoID)}}">
            @csrf
            @include('informativoacesso.input')
        </form>
@endsection