<?php

namespace App\Http\Controllers;

use App\Repositories\MedicamentoRepository;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    protected MedicamentoRepository $inteRepo;
    public function __construct(MedicamentoRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }

    public function registrarMedicamento(Request $request)
    {
        return $this->inteRepo->registrarMedicamento($request);
    }

    public function eliminarMedicamento(Request $request)
    {
        return $this->inteRepo->eliminarMedicamento($request);
    }
}