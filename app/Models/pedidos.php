<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class pedidos extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="pedidos";
	protected $primaryKey = 'id_pedido';                 
    protected $fillable=["id_pedido", "fecha_pedido","fechaentrega_pedido","hora_pedido","estatus","total","total_piezas","id","deleted_at"];
}





