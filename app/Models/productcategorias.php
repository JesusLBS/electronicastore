<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class productcategorias extends Model
{
    use HasFactory;
    use Softdeletes;
    
    protected $table="productcategorias";
	protected $primaryKey = 'id_pcategoria';                 
    protected $fillable=["id_pcategoria", "nombre_pcategoria","descripcion_pcategoria","deleted_at"];
}

 