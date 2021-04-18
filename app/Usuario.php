<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
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

    public function getAuthPassword()
    {
        return $this->UsuarioSenha;
    }
}
