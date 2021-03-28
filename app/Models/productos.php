<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class productos extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="productos";
	protected $primaryKey = 'id_producto';                 
    protected $fillable=["id_producto", "nombre_producto", "descripcion_producto","numserie_producto"
                        ,"preciocompra_producto","precioventa_producto","garantiatienda_producto"
                        ,"id_pcategoria","id_marca","id_proveedor","imgpr","deleted_at"];
}
 