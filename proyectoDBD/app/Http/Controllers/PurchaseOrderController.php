<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$purchaseOrder = PurchaseOrder::all();
        $purchaseOrder = PurchaseOrder::all()->where($purchaseOrder->softDelete,false);
        return response()->json($purchaseOrder);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $purchaseorder = new PurchaseOrder();
        $purchaseorder->numeroCompra = $request->numeroCompra;
        $purchaseorder->fechaCompra = $request->fechaCompra;
        $purchaseorder->montoTotal = $request->montoTotal;
        $purchaseorder->softDelete = False;
        $purchaseorder->save();
        return response()->json([
            "message"=> "Se ha creado una orden de compra.",
            "id"=> $purchaseorder->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            return response()->json($purchaseOrder);
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
