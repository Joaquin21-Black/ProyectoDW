<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    public $table = "egreso";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'egre_fecha'
    ];

    public function farmacia(){
        return $this->belongsTo(Farmacia::class, 'egre_farmacia_id', 'id');
    }

    public function centro_distribucion(){
        return $this->belongsTo(Centro_Distribucion::class, 'egre_centro_dist', 'id');
    }

    public function detalle_egreso(){
        return $this->hasMany(Detalle_Egreso::class, 'id', 'det_egreso_id');
    }
    
    use HasFactory;
}
