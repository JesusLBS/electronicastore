<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class informacionclientes extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="informacionclientes";
	protected $primaryKey = 'id_infcliente';                 
    protected $fillable=["id_infcliente", "nombre_cliente", "apellido_pcliente","apellido_mcliente","direccion_cliente"
                        ,"departamento_cliente","colonia_cliente","ciudad_cliente","codigo_postalcliente"
                        ,"sexo_cliente","email_cliente","celular_cliente","referencia_cliente","id_estado","id_municipio","id_via","id","deleted_at"];
}
