<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class empleados extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="empleados";
	protected $primaryKey = 'id_empleado';                 
    protected $fillable=["id_empleado", "nombre_empleado", "apellido_pempleado","apellido_mempleado","celular_empleado","email_empleado"
                          ,"calle_empleado","codigo_postalempleado","sexo_empleado","id_tipo_empleado","id_municipio"
                          ,"id_estado","contratopdf","deleted_at"];
}
