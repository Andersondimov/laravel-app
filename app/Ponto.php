<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PontoID';

    protected $fillable = 
    [

        'Ponto', 
        'PontoQuantidade', 
        'PontoStatus'
    
    ];

    protected $guarded = 
    [

        'PontoID', 
        'PontoDTAtivacao', 
        'PontoDTInativacao', 
        'PontoDTBloqueio'
    
    ];
    
    protected $table = 'Ponto';
}
