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
        'PontoStatus', 
        'PontoQuantidade'
    
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
