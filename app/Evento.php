<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'price'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'products';
}
