<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioEscola extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'UsuarioEscolaID';

    protected $fillable = 
    [
        'UsuarioEscola',
        'UsuarioEscolaStatus',
        'UsuarioEscolaDTAtivacao',
        'UsuarioEscolaDTInativacao',
        'UsuarioEscolaDTBloqueio'
        
    ];

    protected $guarded = 
    [
        'UsuarioEscolaStatus',
        'UsuarioEscolaDTAtivacao',
        'UsuarioEscolaDTInativacao',
        'UsuarioEscolaDTBloqueio'
    ];

    protected $table = 'UsuarioEscola';
}
