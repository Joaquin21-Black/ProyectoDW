<?php

namespace App\Http\Controllers;
use App\Repositories\EgresoRepository;

use Illuminate\Http\Request;

class EgresoController extends Controller
{
    protected EgresoRepository $inteRepo;
    public function __construct(EgresoRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }

    public function registroEgreso(Request $request)
    {
        return $this->inteRepo->registroEgreso($request);
    }
}
