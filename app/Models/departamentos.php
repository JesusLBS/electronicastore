<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class departamentos extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="departamentos";
	protected $primaryKey = 'id_departamento';                 
    protected $fillable=["id_departamento", "nombre_departamento","deleted_at"];
}
 