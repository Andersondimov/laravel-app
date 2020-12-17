<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaixaEvento extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'FaixaEventoID';

    protected $fillable = 
    [

        'FaixaEventoID', 
        'FaixaEventoCod', 
        'FaixaEventoStatus', 
        'FaixaEventoNumIni', 
        'FaixaEventoNumFim', 
        'FaixaEventoDTIni', 
        'FaixaEventoDTIni', 
        'FaixaEventoPontoQuantidade',
        'EventoEscolaID'
    
    ];

    protected $guarded = 
    [

        'FaixaEventoID', 
        'UsuarioDTAtivacao', 
        'UsuarioDTInativacao', 
        'UsuarioDTBloqueio'
    
    ];
    
    protected $table = 'FaixaEvento';
}
