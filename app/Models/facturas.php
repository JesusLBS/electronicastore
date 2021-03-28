<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class facturas extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="facturas";
	protected $primaryKey = 'id_factura';                 
    protected $fillable=["id_factura", "rfc_cliente", "email_cliente","nombre_cliente","celular_cliente","calle_cliente"
                          ,"codigo_postalcliente","id_municipio","id_estado","id_razonsocial","id_tipofactura","deleted_at"];
}
 