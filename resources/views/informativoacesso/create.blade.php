@extends('layout.app')
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
    <form role="form" method="post" action="{{action('InformativoAcessoController@store')}}">
        @csrf
        @include('informativoacesso.input')
    </form>  
@endsection
    