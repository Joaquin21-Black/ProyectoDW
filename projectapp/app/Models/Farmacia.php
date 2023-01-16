<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{

    public $table = "farmacia";
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'farm_nombre',
        'farm_direccion',
        'farm_mail'
    ];

    public function egreso(){
        return $this->hasMany(Egreso::class, 'id', 'egre_farmacia_id');
    }

    use HasFactory;
}
