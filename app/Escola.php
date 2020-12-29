<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Escola extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'EscolaID';
    protected $fillable = [
        'Escola', 
        'EscolaCod', 
        'EscolaStatus',
        'EscolaDTAtivacao',
        'EscolaDTInativacao',
        'EscolaDTBloqueio',
        'EscolaDTProspect',
        'EscolaSenha',
        'EscolaEmail',
        'EscolaValorFixo',
        'EscolaValorVaviavel',
        'EscolaMotivoBloqueio',
        'EscolaTelefone',
        'EscolaCelular',
        'EscolaCNPJ',
        'EscolaCelularPix',
        'EscolaNomeMoeda',
        'RedeID',
        'EscolaDiaVencimento',
        'EscolaDTExpiracao'];
    protected $casts = [
        'EscolaDTExpiracao' => 'date'
    ];
    public function setEscolaDTExpiracaoAttribute($value)
    {
        $this->attributes['EscolaDTExpiracao'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    protected $guarded = ['EscolaID'];
    protected $table = 'Escola';
}
