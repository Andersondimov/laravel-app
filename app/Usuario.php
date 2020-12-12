<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'UsuarioID';

    protected $fillable = 
    [

        'Usuario', 
        'UsuarioLogin', 
        'UsuarioStatus', 
        'UsuarioNome', 
        'UsuarioSenha', 
        'UsuarioEmail', 
        'UsuarioCelular', 
        'UsuarioMatricula'
    
    ];

    protected $guarded = 
    [

        'UsuarioID', 
        'UsuarioDTAtivacao', 
        'UsuarioDTInativacao', 
        'UsuarioDTBloqueio'
    
    ];
    
    protected $table = 'Usuario';
}
