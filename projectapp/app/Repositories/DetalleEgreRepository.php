<?php

namespace App\Repositories;

use App\Models\Egreso;
use App\Models\Medicamento;
use App\Models\Detalle_Ingreso;
use App\Models\Stock_cd;
use App\Models\Farmacia;


use Exception;
use Faker\Provider\Medical;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class EgresoRepository
{
    public function registroDetalle($request)
    {
        try
        {
            $egreso = Egreso::select('id')->where('id', $request->id_egre)->first();
            $egre_cd = Egreso::select('egre_centro_dist')->where('id', $request->id_egre)->first();
            $egre_farm = Egreso::select('egre_farmacia_id')->where('id', $request->id_egre)->first();
            $medicamento = Medicamento::select('id')->where('id', $request->id_med)->first();

            $detalle = Detalle_Ingreso::create([
                'det_egr_lote' => $request->lote,
                'det_egr_cantidad' => $request->cantidad,
                'det_egreso_id' => $egreso,
                'id_medicamento' => $medicamento
            ]);

            // Se actualiza la cantidad del stock
            $s = Stock_cd::where('scd_id_medicamento', $medicamento)->first();
            if(isset($s))
            {
                $stock = Stock_cd::select('scd_cantidad')->where('scd_id_medicamento', $medicamento)->get();
                $dif = $stock - $detalle->det_egr_cantidad;
                $stock = Stock_cd::where('scd_id_medicamento', $medicamento)->update([
                'scd_cantidad' => $dif
            ]);
            }
            else
            {
                return response()->json(["mensaje"=>"no hay stock", "datos"=>$detalle],Response::HTTP_OK);
                /*$stock = Stock_cd::create([
                    'scd_cantidad' => $detalle->det_ing_cantidad,
                    'scd_lote' => $detalle->det_ing_lote,
                    'scd_id_medicamento' => $medicamento,
                    'scd_centro_dist' => $egre_cd,
                ]);*/
            }

            return response()->json(["mensaje"=>"Se guardaron los detalles", "datos" => $detalle], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}