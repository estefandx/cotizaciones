<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Productos';
    protected $primaryKey = "producto_id";
    public     $timestamps = false;

    protected $fillable = [
       'nombre', 'marca', 'imagen',
    ];
}
