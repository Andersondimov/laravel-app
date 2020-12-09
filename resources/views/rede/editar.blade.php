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
<form role="form" method="post" action="{{url('rede/update/'.$rede->RedeID)}}">
    @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Rede</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Rede</label>
                <input type="text" class="form-control" name="Rede" @if(isset($rede))value="{{ old('', $rede->Rede) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cod. Rede</label>
                    <input type="text" class="form-control" name="RedeCod" @if(isset($rede))value="{{ old('', $rede->RedeCod) }}"@endif placeholder="Cod." />
                </div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="RedeStatus">
                    <option value="1" @if(isset($rede) && $rede->RedeStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($rede) && $rede->RedeStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($rede) && $rede->RedeStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control"
                               value="Data Ativação: {{ \Carbon\Carbon::parse($rede->RedeDTAtivacao)->format('d/m/Y H:i:s') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control"
                               value="Data Inativação: {{ \Carbon\Carbon::parse($rede->RedeDTInativacao)->format('d/m/Y H:i:s') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control"
                               value="Data Bloqueio: {{ \Carbon\Carbon::parse($rede->RedeDTBloqueio)->format('d/m/Y H:i:s') }}">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</body>
</html>
