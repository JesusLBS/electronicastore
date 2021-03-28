<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class tipoempleados extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="tipoempleados";
	protected $primaryKey = 'id_tipo_empleado';                 
    protected $fillable=["id_tipo_empleado", "nombre_tipoempleado","deleted_at"];
}
 