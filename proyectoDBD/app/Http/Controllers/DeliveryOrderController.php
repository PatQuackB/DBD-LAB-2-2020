<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;

class DeliveryOrderController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $deliveryOrder = DeliveryOrder::all();
        return response()->json($deliveryOrder);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $deliveryOrder = new DeliveryOrder();
        $deliveryOrder->estadoDespacho= $request->estadoDespacho;
        $deliveryOrder->tipoDespacho= $request->tipoDespacho;
        $deliveryOrder->save();
        return response()->json([
            "message"=> "Se ha creado una categoria",
            "id"=> $deliveryOrder->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $deliveryOrder = DeliveryOrder::find($id);
        if($deliveryOrder != null){
            return response()->json($deliveryOrder);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }
}
