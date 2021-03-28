<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class vias extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="vias";
	protected $primaryKey = 'id_via';                 
    protected $fillable=["id_via", "tipo_via","descripcion_via","deleted_at"];
}
 