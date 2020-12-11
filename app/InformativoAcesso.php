<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformativoAcesso extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'InformativoAcessoID';
    protected $fillable = ['InformativoAcesso', 'InformativoAcessoDTFim', 'InformativoAcessoDTIni'];
    protected $table = 'InformativoAcesso';
}
