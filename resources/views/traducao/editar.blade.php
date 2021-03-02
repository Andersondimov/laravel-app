<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/components/forms/">
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/assets/css/docs.min.css" rel="stylesheet">
</head>
<body>
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

</body>
</html>
