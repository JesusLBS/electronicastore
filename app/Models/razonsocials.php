<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class razonsocials extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="razonsocials";
	protected $primaryKey = 'id_razonsocial';                 
    protected $fillable=["id_razonsocial", "tipo_razonsocial","deleted_at"];
}
 