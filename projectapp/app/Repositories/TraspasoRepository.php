<?php

namespace App\Repositories;

use App\Models\Traspaso;
use App\Models\Centro_Distribucion;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TraspasoRepository
{
    public function registroEgreso($request)
    {
        try
        {
            $cd_origen = Centro_Distribucion::select('id')->where('id', $request->id_cd)->get();
            $cd_destino = Traspaso::select('id')->where('id', $request->id_cd)->get();

            $egreso = Traspaso::create([
                'tras_cd_destino' => $cd_destino,
                'tras_cd_origen' => $cd_origen,
                'tras_estado' => $request->tras_estado,
            ]);

            return response()->json(["mensaje"=>"Se guardaron los egresos", "datos" => $egreso], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}