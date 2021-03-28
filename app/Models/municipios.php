<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class municipios extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="municipios";
	protected $primaryKey = 'id_municipio';                 
    protected $fillable=["id_municipio", "nombre_municipio","deleted_at"];
}

