<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Egreso extends Model
{
    public $table = "detalle_egreso";
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $fillable = [
        'det_egr_lote',
        'det_egr_cantidad'
    ];

    public function medicamento(){
        return $this->belongsTo(Medicamento::class, 'id_medicamento', 'id');
    }

    public function egreso(){
        return $this->belongsTo(Egreso::class, 'det_egreso_id', 'id');
    }
    use HasFactory;
}
