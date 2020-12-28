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
<form role="form" method="post" action="{{url('perfil/update/'.$perfil->PerfilID)}}">
    @csrf
    <div class="bd-example">
        <h1 class="bd-title" id="content">Perfil</h1>
        <form>
            <div class="form-group">
                <label for="validationCustom01">Nome do Perfil</label>
                <input type="text" class="form-control" name="Perfil" id="validationCustom01" required @if(isset($perfil))value="{{ old('', $perfil->Perfil) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="validationCustom01">Cod. Perfil</label>
                    <input type="text" class="form-control" name="PerfilCod" id="validationCustom01" required @if(isset($perfil))value="{{ old('', $perfil->PerfilCod) }}"@endif placeholder="Cod." />
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="PerfilStatus">
                    <option value="1" @if(isset($perfil) && $perfil->PerfilStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($perfil) && $perfil->PerfilStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($perfil) && $perfil->PerfilStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                               @if(isset($perfil->PerfilDTAtivacao) && $perfil->PerfilDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($perfil->PerfilDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($perfil->PerfilDTInativacao) && $perfil->PerfilDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($perfil->PerfilDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($perfil->PerfilDTBloqueio) && $perfil->PerfilDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($perfil->PerfilDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</body>
</html>
