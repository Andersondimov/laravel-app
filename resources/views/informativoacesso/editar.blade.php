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
        <form role="form" method="post" action="{{route('informativoacesso.update',$informativoacesso->InformativoAcessoID)}}">
            @csrf
            @include('informativoacesso.input')
        </form>
@endsection