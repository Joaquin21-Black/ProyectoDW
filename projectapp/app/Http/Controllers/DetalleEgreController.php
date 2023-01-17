<?php

namespace App\Http\Controllers;
use App\Repositories\DetalleEgreRepository;

use Illuminate\Http\Request;

class DetalleEgreController extends Controller
{
    protected DetalleEgreRepository $inteRepo;
    public function __construct(DetalleEgreRepository $inteRepo)
    {
        $this->inteRepo = $inteRepo;
    }
    public function registroDetalle(Request $request)
    {
        return $this->inteRepo->registroDetalle($request);
    }
}
