<?php

namespace App\Http\Controllers;

use App\Repositories\CentroRepository;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    protected CentroRepository $inteRepo;
    public function __construct(CentroRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }

    public function registrarCentro(Request $request)
    {
        return $this->inteRepo->registrarCentro($request);
    }

    public function modificarCentro(Request $request)
    {
        return $this->inteRepo->eliminarCentro($request);
    }

    public function eliminarCentro(Request $request)
    {
        return $this->inteRepo->eliminarCentro($request);
    }
}