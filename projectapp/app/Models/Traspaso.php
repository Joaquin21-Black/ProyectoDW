<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traspaso extends Model
{
    public $table = "traspaso";
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $fillable = [
        'tras_estado'
    ];

    public function centro_distribucion_origen(){
        return $this->belongsTo(Centro_Distribucion::class, 'tras_cd_origen', 'id');
    }

    public function centro_distribucion_destino(){
        return $this->belongsTo(Centro_Distribucion::class, 'tras_cd_destino', 'id');
    }

    public function detalle_traspaso(){
        return $this->hasMany(Detalle_Traspaso::class, 'id', 'det_traspaso_id');
    }
    use HasFactory;
}
