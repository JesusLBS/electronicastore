<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class monedas extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="monedas";
	protected $primaryKey = 'id_moneda';                 
    protected $fillable=["id_moneda", "tipo_moneda","deleted_at"];
}
