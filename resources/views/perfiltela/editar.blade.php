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
<form role="form" method="post" action="{{url('perfiltela/update/'.$perfiltela->PerfilTelaID)}}">
    @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">PerfilTela</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do PerfilTela</label>
                <input type="text" class="form-control" name="PerfilTela" @if(isset($perfiltela))value="{{ old('', $perfiltela->PerfilTela) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="RedeStatus">
                    <option value="1" @if(isset($perfiltela) && $perfiltela->PerfilTelaStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($perfiltela) && $perfiltela->PerfilTelaStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($perfiltela) && $perfiltela->PerfilTelaStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control"
                        value="Data Ativação: {{ \Carbon\Carbon::parse($perfiltela->PerfilTelaDTAtivacao)->format('d/m/Y H:i:s') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control"
                        value="Data Inativação: {{ \Carbon\Carbon::parse($perfiltela->PerfilTelaDTInativacao)->format('d/m/Y H:i:s') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control"
                        value="Data Bloqueio: {{ \Carbon\Carbon::parse($perfiltela->PerfilTelaDTBloqueio)->format('d/m/Y H:i:s') }}">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</body>
</html>
