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

class DetalleIngrRepository
{
    public function registroDetalle($request)
    {
        try
        {
            $ingreso = Ingreso::select('id')->where('id', $request->id_ingr)->first();
            $ing_cd = Ingreso::select('ingr_centro_dist')->where('id', $request->id_ingr)->first();
            $medicamento = Medicamento::select('id')->where('id', $request->id_med)->first();

            $detalle = Detalle_Ingreso::create([
                'det_ing_lote' => $request->lote,
                'det_ing_cantidad' => $request->cantidad,
                'det_ingreso_id' => $ingreso,
                'id_medicamento' => $medicamento
            ]);

            // Se actualiza la cantidad del stock
            $s = Stock_cd::where('scd_id_medicamento', $medicamento)->first();
            if(isset($s))
            {
                $stock = Stock_cd::select('scd_cantidad')->where('scd_id_medicamento', $medicamento)->get();
                $dif = $stock + $detalle->det_ing_cantidad;
                $stock = Stock_cd::where('scd_id_medicamento', $medicamento)->update([
                'scd_cantidad' => $dif
            ]);
            }
            else
            {
                $stock = Stock_cd::create([
                    'scd_cantidad' => $detalle->det_ing_cantidad,
                    'scd_lote' => $detalle->det_ing_lote,
                    'scd_id_medicamento' => $medicamento,
                    'scd_centro_dist' => $ing_cd,
                ]);
            }

            return response()->json(["mensaje"=>"Se guardaron los detalles", "datos" => $detalle], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}