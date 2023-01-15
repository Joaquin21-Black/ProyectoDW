<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    public $table = "medicamento";
    protected $primaryKey = 'id';
    public $incrementing = true;

    public $fillable = [
        'med_nombre',
        'med_compuesto'
    ];

    public function detalle_traspaso(){
        return $this->hasMany(Detalle_Traspaso::class, 'id', 'id_medicamento');
    }

    public function detalle_ingreso(){
        return $this->hasMany(Detalle_Ingreso::class, 'id', 'id_medicamento');
    }

    public function detalle_egreso(){
        return $this->hasMany(Detalle_Egreso::class, 'id', 'id_medicamento');
    }

    use HasFactory;
}
