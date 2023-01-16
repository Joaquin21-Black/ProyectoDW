<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Traspaso extends Model
{
    public $table = "detalle_traspaso";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'det_tra_lote',
        'det_tra_cantidad'
    ];

    public function medicamento(){
        return $this->belongsTo(Medicamento::class, 'id_medicamento', 'id');
    }

    public function traspaso(){
        return $this->belongsTo(Traspaso::class, 'det_traspaso_id', 'id');
    }
    use HasFactory;
}
