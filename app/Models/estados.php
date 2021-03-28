<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class estados extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="estados";
	protected $primaryKey = 'id_estado';                 
    protected $fillable=["id_estado", "nombre_estado","deleted_at"];
}
