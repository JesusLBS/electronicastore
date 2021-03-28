<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class ventas extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="ventas";
	protected $primaryKey = 'id_venta';                 
    protected $fillable=["id_venta", "nombre_razonsocial","tipocomprobante","seriecomprobante","fecha_hora","iva",
                         "total_venta","id_infcliente","id","deleted_at"];
}
