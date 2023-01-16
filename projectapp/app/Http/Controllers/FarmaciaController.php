<?php

namespace App\Http\Controllers;

use App\Repositories\FarmaciaRepository;
use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    protected FarmaciaRepository $inteRepo;
    public function __construct(FarmaciaRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }

    public function registrarFarmacia(Request $request)
    {
        return $this->inteRepo->registrarFarmacia($request);
    }

    public function modificarFarmacia(Request $request)
    {
        return $this->inteRepo->eliminarFarmacia($request);
    }

    public function eliminarFarmacia(Request $request)
    {
        return $this->inteRepo->eliminarFarmacia($request);
    }
}