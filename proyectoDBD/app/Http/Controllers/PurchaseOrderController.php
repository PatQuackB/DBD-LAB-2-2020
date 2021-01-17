<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $purchaseorder = Purchaseorder::all()->where("softDelete", False);
        return response()->json($purchaseorder); 
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->numeroCompra != null){
            // si atributo no es nulo
            if(is_string($request->numeroCompra)){ 
                // si es string
                if($request->fechaCompra != null){
                    if($request->fechaCompra instanceof DateTime)){ 
                        if($request->montoTotal != null){
                            if(is_integer($request->montoTotal)){ 
                                $purchaseorder = new PurchaseOrder();
                                $purchaseorder->numeroCompra = $request->numeroCompra;
                                $purchaseorder->fechaCompra = now();//$request->fechaCompra;
                                $purchaseorder->montoTotal = $request->montoTotal;
                                $purchaseorder->softDelete = False;
                                $purchaseorder->save();
                                return response()->json([
                                    "message"=> "Se ha creado una orden de compra.",
                                    "id"=> $purchaseorder->id
                                ], 202);
                            }
                            return response()->json(["message"=>"Monto total debe ser un número."]);
                        }
                        return response()->json(["message"=>"Monto total es obligatorio."]);
                    }
                    return response()->json(["message"=>"Fecha compra debe ser una fecha."]);
                }
                return response()->json(["message"=>"Fecha compra es obligatorio."]);
            }
            return response()->json(["message"=>"Numero compra debe ser string."]);
        }
        return response()->json(["message"=>"Numero compra es obligatorio."]);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            if($purchaseOrder->softDelete != True)return response()->json($purchaseOrder);
            return response()->json(["message"=>"La orden de compra está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            if($purchaseOrder->softDelete != False){
                return response()->json(["message"=>"La Orden de compra deseada no puede ser modificada debido a que se encuentra eliminada/oculta"]);
            }
            // Si no es nulo
            // atributo
            if($request->numeroCompra != null){
                // si atributo no es nulo
                if(is_string($request->numeroCompra)){ 
                    // si es string
                    $purchaseOrder->numeroCompra = $request->numeroCompra;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Numero compra debe ser string."]);
                }
            }
            if($request->fechaCompra != null){
                if($request->fechaCompra instanceof DateTime)){ 
                    $purchaseOrder->fechaCompra = $request->fechaCompra;
                }
                else{
                    return response()->json(["message"=>"Fecha compra debe ser una fecha."]);
                }
            }
            if($request->montoTotal != null){
                if(is_integer($request->montoTotal)){ 
                    $purchaseOrder->montoTotal = $request->montoTotal;
                }
                else{
                    return response()->json(["message"=>"Monto total debe ser un número."]);
                }
            }
            $purchaseOrder->save();
            return response()->json($purchaseOrder);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            if($purchaseOrder->softDelete){
                return response()->json(["message"=>"La orden de compra ya está eliminada."]);         
            }
            $purchaseOrder->softDelete = True;
            $purchaseOrder->save();
            return response()->json(["message"=>"La orden de compra ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            if($purchaseOrder->softDelete){
                $purchaseOrder->softDelete = False;
                $purchaseOrder->save();
                return response()->json([
                    "message"=> "Se ha recuperado la orden de compra.",
                    "id"=> $purchaseOrder->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la orden de compra no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
