<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Escola extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'EscolaID';
    protected $fillable = ['Escola', 'EscolaCod', 'EscolaStatus','EscolaDTAtivacao','EscolaDTInativacao','EscolaDTBloqueio'
        ,'EscolaSenha','EscolaValorFixo','EscolaValorVaviavel','EscolaPontuacaoIni','EscolaMotivoBloqueio','EscolaTelefone'
        ,'EscolaCelular','EscolaCNPJ','EscolaCelularPix','RedeID'];
    protected $guarded = ['EscolaID'];
    protected $table = 'Escola';
}
