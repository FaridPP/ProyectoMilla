<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    //Nombre de la tabla
    protected $table = 'categoria';

    //Llave primaria
    protected $primaryKey = 'codigo';

    //Campos de la tabla
    protected $fillable = ['nombre'];
}