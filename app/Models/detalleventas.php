<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class detalleventas extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="detalleventas";
	protected $primaryKey = 'id_detalleventa';                 
    protected $fillable=["id_detalleventa", "cantidad", "id_venta","id_producto","deleted_at"];
}
 