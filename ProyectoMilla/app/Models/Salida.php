<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    public $timestamps = false;

    //Nombre de la tabla
    protected $table = 'salidas';

    //Llave primaria de mi tabla
    protected $primaryKey = 'codigo';

    //Campos de la tabla 
    protected $fillable = ['id_producto', 'id_bodega','fecha', 'cantidad'];
}
