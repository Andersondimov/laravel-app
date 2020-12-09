<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilTela extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PerfilTelaID';
    protected $fillable = ['PerfilTela', 'PerfilTelaStatus'];
    protected $guarded = ['PerfilTelaID', 'PerfilTelaDTAtivacao', 'PerfilTelaDTInativacao', 'PerfilTelaDTBloqueio'];
    protected $table = 'PerfilTela';
}
