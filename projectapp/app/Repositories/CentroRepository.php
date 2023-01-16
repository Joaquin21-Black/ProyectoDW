<?php

namespace App\Repositories;

use App\Models\Centro_Distribucion;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CentroRepository
{
    public function registrarCentro($request)
    {
        try
        {
            $cd = Centro_Distribucion::create([
                "cd_codigo" => $request->cd_codigo,
                "cd_direccion" => $request->cd_direccion,
                "cd_telefono" => $request->cd_telefono
            ]);
            return response()->json(["mensaje"=>"Se crea en centro de distribución","datos" => $cd], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }

    public function modificarCentro($request)
    {
        try {
            $cd = Centro_Distribucion::findorFail($request->id);
            isset($request->cd_codigo) && $cd->cd_codigo = $request->cd_codigo;
            isset($request->cd_direccion) && $cd->cd_direccion = $request->cd_direccion;
            isset($request->cd_telefono) && $cd->cd_telefono = $request->cd_telefono;
            $cd->save();

            $cd = Centro_Distribucion::where('id', $request->id)
                ->update([
                    'cd_codigo' => $request->cd_codigo,
                    'cd_direccion' => $request->cd_direccion,
                    'cd_telefono' => $request->cd_telefono
                ]);

            return response()->json(["mensaje"=>"Se actualizaro el centro de distribución","datos" => $cd], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::info([
                "error" => $e,
                "mensaje" => $e->getMessage(),
                "linea" => $e->getLine(),
                "archivo" => $e->getFile(),
            ]);
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function eliminarCentro($request)
    {
        try
        {
            $cd = Centro_Distribucion::find($request->id);
            if(!$cd)
            {
                throw new Exception("Detente");
            }
            $cd->delete();

            return response()->json(["mensaje"=>"Se elimino al centro de distribución","Eliminados"=>"Adios"], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}