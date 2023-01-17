<?php

namespace App\Repositories;

use App\Models\Egreso;
use App\Models\Centro_Distribucion;
use App\Models\Farmacia;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class EgresoRepository
{
    public function registroEgreso($request)
    {
        try
        {
            $cd = Centro_Distribucion::select('id')->where('id', $request->id_cd)->get();
            $farm = Farmacia::select('id')->where('id', $request->id_farm)->get();

            $egreso = Egreso::create([
                'egre_fecha' => $request->fecha ,
                'egre_centro_dist' => $cd,
                'egre_farmacia' => $farm,
            ]);

            return response()->json(["mensaje"=>"Se guardaron los egresos", "datos" => $egreso], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}