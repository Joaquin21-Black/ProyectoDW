<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    public $table = "ingreso";
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $fillable = [
        'ingr_fecha'
    ];

    public function centro_distribucion(){
        return $this->belongsTo(Centro_Distribucion::class, 'ingr_centro_dist', 'id');
    }

    public function detalle_ingreso(){
        return $this->hasMany(Detalle_Ingreso::class, 'id', 'det_ingreso_id');
    }
    
    use HasFactory;
}
