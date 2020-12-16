<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoCompra extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'AlunoCompraID';

    protected $fillable = 
    [

         
        'AlunoCompra', 
        'AlunoCompraStatus', 
        'AlunoCompraQuantidade'
    
    ];

    protected $guarded = 
    [

        'AlunoCompraID',
        'AlunoCompraDTAtivacao', 
        'AlunoCompraDTInativacao', 
    
    ];
    
    protected $table = 'AlunoCompra';
}
