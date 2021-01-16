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
        //$deliveryOrder = DeliveryOrder::all()->where($deliveryOrder->softDelete,false);
        return response()->json($deliveryOrder);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->estadoDespacho != null){
            if(is_integer($request->estadoDespacho)){ // añadir min y max
                if($request->tipo_despacho != null){
                    if(is_integer($request->tipoDespacho)){
                        $deliveryOrder = new DeliveryOrder();
                        $deliveryOrder->softDelete = False;
                        $deliveryOrder->save();
                        return response()->json([
                            "message"=> "Se ha creado una orden de despacho.",
                            "id"=> $deliveryOrder->id
                        ], 202);
                    }
                    return response()->json(["message"=>"Tipo despacho debe ser número."]);
                }
                return response()->json(["message"=>"Tipo despacho es obligatorio."]);
            }
            return response()->json(["message"=>"Estado despacho debe ser número."]);
        }
        return response()->json(["message"=>"Estado despacho es obligatorio."]);
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
            // Si no es nulo
            // atributo
            if($request->estadoDespacho != null){
                // si atributo no es nulo
                if(is_integer($request->estadoDespacho)){ // añadir min y max
                    // si es entero
                    $deliveryOrder->estadoDespacho = $request->estadoDespacho;
                }
                else{
                    // si no es entero
                    return response()->json(["message"=>"Estado despacho debe ser número."]);
                }
            }
            if($request->tipoDespacho != null){
                if(is_integer($request->tipoDespacho)){ // añadir min y max
                    $deliveryOrder->tipoDespacho = $request->tipoDespacho;
                }
                else{
                    return response()->json(["message"=>"Tipo despacho debe ser número."]);
                }
            }
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
