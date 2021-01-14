<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrderPurchaseOrder;

class DeliveryOrderPurchaseOrderController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $deliveryOrderPurchaseOrder = DeliveryOrderPurchaseOrder::all();
        return response()->json($deliveryOrderPurchaseOrder);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $deliveryOrderPurchaseOrder = DeliveryOrderPurchaseOrder::find($id);
        if($deliveryOrderPurchaseOrder != null){
            return response()->json($deliveryOrderPurchaseOrder);
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
