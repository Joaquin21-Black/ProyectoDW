<?php

namespace App\Repositories;

use App\Models\Medicamento;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MedicamentoRepository
{
    public function registrarMedicamento($request)
    {
        try
        {
            $med = Medicamento::create([
                "med_nombre" => $request->med_nombre,
                "med_compuesto" => $request->med_compuesto,
            ]);
            return response()->json(["mensaje"=>"Se crea un medicamento","datos" => $med], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }

    public function modificarMedicamento($request)
    {
        try {
            $med = Medicamento::findorFail($request->id);
            isset($request->med_nombre) && $med->med_nombre = $request->med_nombre;
            isset($request->med_compuesto) && $med->med_compuesto = $request->med_compuesto;
            $med->save();

            $med = Medicamento::where('id', $request->id)
                ->update([
                    'med_nombre' => $request->med_nombre,
                    'med_compuesto' => $request->med_compuesto
                ]);

            return response()->json(["mensaje"=>"Se actualizo el medicamento","datos" => $med], Response::HTTP_OK);
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

    public function eliminarMedicamento($request)
    {
        try
        {
            $med = Medicamento::find($request->id);
            if(!$med)
            {
                throw new Exception("Detente");
            }
            $med->delete();

            return response()->json(["mensaje"=>"Se elimino el medicamento","Eliminados"=>"Adios"], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}