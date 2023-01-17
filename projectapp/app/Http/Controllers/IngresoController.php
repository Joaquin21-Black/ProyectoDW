<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IngresoRepository;
use App\Repositories\DetalleIngrRepository;

class IngresoController extends Controller
{
    protected IngresoRepository $inteRepo;
    public function __construct(IngresoRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }
    
    public function registroIngreso(Request $request)
    {
        return $this->inteRepo->registroIngreso($request);
    }
}
