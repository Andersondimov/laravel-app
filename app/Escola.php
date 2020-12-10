<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Escola extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'EscolaID';
    protected $fillable = ['Escola', 'EscolaCod', 'EscolaStatus','EscolaDTAtivacao','EscolaDTInativacao','EscolaDTBloqueio','EscolaDTProspect'
        ,'EscolaSenha','EscolaValorFixo','EscolaValorVaviavel','EscolaMotivoBloqueio','EscolaTelefone'
        ,'EscolaCelular','EscolaCNPJ','EscolaCelularPix','RedeID','EscolaDiaVencimento','EscolaDTExpiracao'];
    protected $guarded = ['EscolaID'];
    protected $table = 'Escola';
}
