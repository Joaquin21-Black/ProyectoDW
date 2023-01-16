<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_cd extends Model
{
    public $table = "stock_cd";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'scd_cantidad',
        'scd_lote'
    ];

    public function medicamento(){
        return $this->belongsTo(Medicamento::class, 'scd_id_medicamento', 'id');
    }

    public function centro_distribucion(){
        return $this->belongsTo(Centro_Distribucion::class, 'scd_centro_dist', 'id');
    }
    use HasFactory;
}
