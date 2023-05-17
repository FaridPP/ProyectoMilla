<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Nombre de la tabla
    protected $table = 'productos';

    //Llave primaria de mi tabla
    protected $primaryKey = 'codigo';

    //Campos de la tabla 
    protected $fillable = ['nombre', 'id_categoria', 'precio'];
}
