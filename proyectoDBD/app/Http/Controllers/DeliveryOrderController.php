<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;

class DeliveryOrderController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$deliveryOrder = DeliveryOrder::all();
        $deliveryOrder = DeliveryOrder::all()->where($deliveryOrder->softDelete,false);
        return response()->json($deliveryOrder);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $deliveryOrder = new DeliveryOrder();
        $deliveryOrder->estadoDespacho = $request->estadoDespacho;
        $deliveryOrder->tipoDespacho = $request->tipoDespacho;
        $deliveryOrder->softDelete = False;
        $deliveryOrder->save();
        return response()->json([
            "message"=> "Se ha creado una orden de despacho.",
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
        $deliveryOrder = DeliveryOrder::find($id);
        if($deliveryOrder != null){
            $deliveryOrder->estadoDespacho= $request->estadoDespacho;
            $deliveryOrder->tipoDespacho= $request->tipoDespacho;
            $deliveryOrder->save();
            return response()->json($deliveryOrder);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $deliveryOrder = DeliveryOrder::find($id);
        if($deliveryOrder != null){
            if($deliveryOrder->softDelete){
                return response()->json(["message"=>"La orden de despacho ya está eliminada."]);         
            }
            $deliveryOrder->softDelete = True;
            $deliveryOrder->save();
            return response()->json(["message"=>"La orden de despacho ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $deliveryOrder = DeliveryOrder::find($id);
        if($deliveryOrder != null){
            if($deliveryOrder->softDelete){
                $deliveryOrder->softDelete = False;
                $deliveryOrder->save();
                return response()->json([
                    "message"=> "Se ha recuperado la orden de despacho",
                    "id"=> $deliveryOrder->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la orden de despacho no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
