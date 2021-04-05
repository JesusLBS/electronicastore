<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class detallepedidos extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="detallepedidos";
	protected $primaryKey = 'id_detallepedido';                 
    protected $fillable=["id_detallepedido", "precio_producto", "cantidad","subttal","id_pedido","id_producto","deleted_at"];
}









