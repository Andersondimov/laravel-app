<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioEscola extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'UsuarioEscolaID';
    protected $fillable = [
        'UsuarioEscola',  
        'UsuarioEscolaStatus',
        'UsuarioEscolaDTAtivacao',
        'UsuarioEscolaDTInativacao',
        'UsuarioEscolaDTBloqueio',
        'UsuarioID',
        'UsuarioNome',
        'EscolaID'
    ];
    protected $guarded = ['UsuarioEscolaID'];
    protected $table = 'UsuarioEscola';
}
