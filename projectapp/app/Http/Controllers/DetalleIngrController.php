<?php

namespace App\Http\Controllers;
use App\Repositories\DetalleIngrRepository;

use Illuminate\Http\Request;

class DetalleIngrController extends Controller
{
    protected DetalleIngrRepository $inteRepo;
    public function __construct(DetalleIngrRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }
    public function registroDetalle(Request $request)
    {
        return $this->inteRepo->registroDetalle($request);
    }
}
