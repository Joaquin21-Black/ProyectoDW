<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Ingreso extends Model
{
    public $table = "detalle_ingreso";
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $fillable = [
        'det_ing_lote',
        'det_ing_cantidad'
    ];

    public function medicamento(){
        return $this->belongsTo(Medicamento::class, 'id_medicamento', 'id');
    }

    public function ingreso(){
        return $this->belongsTo(Ingreso::class, 'det_ingreso_id', 'id');
    }
    use HasFactory;
}
