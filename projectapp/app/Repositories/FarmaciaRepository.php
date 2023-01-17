<?php

namespace App\Repositories;

use App\Models\Farmacia;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class FarmaciaRepository
{
    public function registrarFarmacia($request)
    {
        try
        {
            $farm = Farmacia::get();
            isset($request->farm_nombre) && $farm->farm_nombre = $request->farm_nombre;
            $farm->save();
            
            $farm = Farmacia::create([
                "farm_nombre" => $request->farm_nombre,
                "farm_direccion" => $request->farm_direccion,
                "farm_mail" => $request->farm_mail
            ]);
            return response()->json(["mensaje"=>"Se crea una farmacia","datos" => $farm], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }

    public function modificarFarmacia($request)
    {
        try {
            $farm = Farmacia::findorFail($request->id);
            isset($request->farm_nombre) && $farm->farm_nombre = $request->farm_nombre;
            isset($request->farm_direccion) && $farm->farm_direccion = $request->farm_direccion;
            isset($request->farm_mail) && $farm->farm_mail = $request->farm_mail;
            $farm->save();

            $farm = Farmacia::where('id', $request->id)
                ->update([
                    'farm_nombre' => $request->farm_nombre,
                    'farm_direccion' => $request->farm_direccion,
                    'farm_mail' => $request->farm_mail
                ]);

            return response()->json(["mensaje"=>"Se actualizo la farmacia","datos" => $farm], Response::HTTP_OK);
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

    public function eliminarFarmacia($request)
    {
        try
        {
            $farm = Farmacia::find($request->id);
            if(!$farm)
            {
                throw new Exception("Detente");
            }
            $farm->delete();

            return response()->json(["mensaje"=>"Se elimino la farmacia","Eliminado"=>"Adios"], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}