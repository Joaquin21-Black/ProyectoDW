<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro_Distribucion extends Model
{

    public $table = 'centro_distribucion';
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'cd_codigo',
        'cd_direccion',
        'cd_telefono'
    ];

    public function egreso(){
        return $this->hasMany(Egreso::class, 'id', 'egre_centro_dist');
    }

    public function ingreso(){
        return $this->hasMany(Ingreso::class, 'id', 'ingr_centro_dist');
    }

    public function traspaso_origen(){
        return $this->hasMany(Traspaso::class, 'id', 'tras_cd_origen');
    }

    public function traspaso_destino(){
        return $this->hasMany(Traspaso::class, 'id', 'tras_cd_destino');
    }

    public function stock(){
        return $this->hasMany(Stock_cd::class, 'id', 'scd_centro_dist');
    }

    use HasFactory;
}
