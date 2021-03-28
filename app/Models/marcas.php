<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class marcas extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="marcas";
	protected $primaryKey = 'id_marca';                 
    protected $fillable=["id_marca", "nombre_marca","deleted_at"];
}
