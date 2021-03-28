<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class tipofacturas extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="tipofacturas";
	protected $primaryKey = 'id_tipofactura';                 
    protected $fillable=["id_tipofactura", "nombre_tipofactura","deleted_at"];
}
 