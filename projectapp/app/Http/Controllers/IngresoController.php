<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IngresoRepository;
use App\Repositories\DetalleIngrRepository;

class IngresoController extends Controller
{
    protected IngresoController $inteRepo;
    public function __construct(IngresoController $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }

}
