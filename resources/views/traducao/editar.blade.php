@extends('layout.layout')

@section('title', 'Home')

@section('breadcrumb')
    @parent
@endsection

@section('content')
<form role="form" method="post" action="{{url('traducao/update/'.$traducao->TraducaoID)}}">
    @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Alterar</h1>
        <form>
            <div class="form-group">
                <label for="validationCustom01">Br</label>
                <input type="text" class="form-control" name="TraducaoTextoBr" id="validationCustom01" required @if(isset($traducao))value="{{ old('', $traducao->TraducaoTextoBr) }}"@endif  />
            </div>
            <div class="form-group">
                <label for="validationCustom01">Us</label>
                <input type="text" class="form-control" name="TraducaoTextoUs" id="validationCustom01" @if(isset($traducao))value="{{ old('', $traducao->TraducaoTextoUs) }}"@endif />
            </div>
            <div class="form-group">
                <label for="validationCustom01">Es</label>
                <input type="text" class="form-control" name="TraducaoTextoEs" id="validationCustom01" @if(isset($traducao))value="{{ old('', $traducao->TraducaoTextoEs) }}"@endif />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
        </form>
    </div>
@endsection
