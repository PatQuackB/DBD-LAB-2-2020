<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\PurchaseOrder;
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
        $deliveryOrder = DeliveryOrder::find($request->idDespacho);
        $purchaseOrder = PurchaseOrder::find($request->idOrdenCompra);

        if($deliveryOrder == null and $purchaseOrder == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($deliveryOrder == null)return response()->json(["message"=> "El identificador de orden de compra no existe."]);
        if($purchaseOrder == null)return response()->json(["message"=> "El identificador de orden de despacho no existe."]);

        $deliveryOrderPurchaseOrder = new DeliveryOrderPurchaseOrder();
        $deliveryOrderPurchaseOrder->idDespacho = $request->idDespacho;        
        $deliveryOrderPurchaseOrder->idOrdenCompra = $request->idOrdenCompra;
        $deliveryOrderPurchaseOrder->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $deliveryOrderPurchaseOrder->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $deliveryOrderPurchaseOrder = DeliveryOrderPurchaseOrder::find($id);
        if($deliveryOrderPurchaseOrder != null){
            return response()->json($deliveryOrderPurchaseOrder);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Modificar una tupla especifica (put)          NO TIENE SENTIDO UPDATEAR UNA TABLA INTERMEDIA
    /*
    public function update(Request $request, $id)
    {
        
    }*/

    //Borrar una tupla específica (delete)
    /*
    public function destroy($id)
    {
        
    }
    */
}
