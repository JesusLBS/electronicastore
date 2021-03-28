<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;


class roles extends Model
{
    use HasFactory;
    use Softdeletes;

    protected $table="roles";
	protected $primaryKey = 'id_rol';                 
    protected $fillable=["id_rol", "rol","deleted_at"];
    
}
 
