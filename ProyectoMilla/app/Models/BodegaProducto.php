<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodegaProducto extends Model
{
    use HasFactory;

    //Nombre de la tabla
    protected $table = 'bodegasproductos';

    //Campos de la tabla 
    protected $fillable = ['id_producto', 'id_bodega', 'cantidad'];
}
