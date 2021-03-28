<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class proveedores extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="proveedores";
	protected $primaryKey = 'id_proveedor';                 
    protected $fillable=["id_proveedor", "nombre_proveedor", "rfc_proveedor","celular_proveedor"
                        ,"email_proveedor","tipopersona_proveedor","id_razonsocial","deleted_at"];
}
 