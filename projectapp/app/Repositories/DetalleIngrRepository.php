<?php

namespace App\Repositories;

use App\Models\Ingreso;
use App\Models\Medicamento;
use App\Models\Detalle_Ingreso;
use App\Models\Stock_cd;

use Exception;
use Faker\Provider\Medical;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class IngresoRepository
{
    public function registroDetalle($request)
    {
        try
        {
            $ingreso = Ingreso::select('id')->where('id', $request->id_ingr)->get();
            $medicamento = Medicamento::select('id')->where('id', $request->id_med)->get();

            $detalle = Detalle_Ingreso::create([
                'det_ing_lote' => $request->lote,
                'det_ing_cantidad' => $request->cantidad,
                'det_ingreso_id' => $ingreso,
                'id_medicamento' => $medicamento
            ]);

            // Se actualiza la cantidad del stock
            // TO DO: verificar que el stock existe, si no existe crearlo
            $stock = Stock_cd::select('scd_cantidad')->where('scd_id_medicamento', $medicamento)->get();
            $dif = $stock + $detalle->det_ing_cantidad;
            $stock = Stock_cd::where('scd_id_medicamento', $medicamento)->update([
                'scd_cantidad' => $dif
            ]);

            return response()->json(["mensaje"=>"Se guardaron los detalles", "datos" => $detalle], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}