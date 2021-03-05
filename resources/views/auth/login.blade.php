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
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="bd-example">
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>
            <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Logar
                </button>
            </div>
        </div>
    </div>
</form>
</body>
</html>

