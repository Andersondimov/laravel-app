<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Perfil extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PerfilID';
    protected $fillable = ['Perfil', 'PerfilCod', 'PerfilStatus'];
    protected $guarded = ['PerfilID', 'PerfilDTAtivacao', 'PerfilDTInativacao', 'PerfilDTBloqueio'];
    protected $table = 'Perfil';
}
