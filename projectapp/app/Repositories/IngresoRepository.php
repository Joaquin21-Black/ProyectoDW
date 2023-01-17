<?php

namespace App\Repositories;

use App\Models\Ingreso;
use App\Models\Centro_Distribucion;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class IngresoRepository
{
    public function registroIngreso($request)
    {
        try
        {
            $cd = Centro_Distribucion::select('id')->where('id', $request->id_cd)->get();

            $ingreso = Ingreso::create([
                'ingr_fecha' => $request->fecha ,
                'ingr_centro_dist' => $cd
            ]);

            return response()->json(["mensaje"=>"Se guardaron los ingresos", "datos" => $ingreso], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}