<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioEscolaInformativoAcesso extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'UsuarioEscolaInformativoAcessoID';

    protected $fillable = 
    [

         
        'UsuarioEscolaInformativoAcesso', 
        'UsuarioEscolaInformativoAcesso'
    
    ];

    protected $guarded = 
    [

        'UsuarioEscolaInformativoAcessoIDID',
        'UsuarioEscolaInformativoAcessoIDDTAcao'
    
    ];
    
    protected $table = 'UsuarioEscolaInformativoAcesso';
}

