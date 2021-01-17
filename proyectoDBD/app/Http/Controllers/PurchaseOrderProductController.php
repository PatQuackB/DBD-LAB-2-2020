<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\Product;
use App\Models\PurchaseOrderProduct;

class PurchaseOrderProductController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $purchaseorderProduct = PurchaseorderProduct::all();
        return response()->json($purchaseorderProduct); 
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $purchaseOrder = PurchaseOrder::find($request->idOrdenCompra);
        $product = Product::find($request->idProducto);

        if($purchaseOrder->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que orden de compra esta eliminado/oculto."]);
        if($product->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que producto esta eliminado/oculto."]);

        if($purchaseOrder == null and $product == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($purchaseOrder == null)return response()->json(["message"=> "El identificador de orden de compra no existe."]);
        if($product == null)return response()->json(["message"=> "El identificador de producto no existe."]);

        $purchaseOrderProduct = new PurchaseOrderProduct();
        $purchaseOrderProduct->idOrdenCompra = $request->idOrdenCompra;        
        $purchaseOrderProduct->idProducto = $request->idProducto;
        $purchaseOrderProduct->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $purchaseOrderProduct->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $purchaseOrderProduct = PurchaseOrderProduct::find($id);
        if($purchaseOrderProduct != null){
            return response()->json($purchaseOrderProduct);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    /*public function update(Request $request, $id)
    {
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }*/
}
