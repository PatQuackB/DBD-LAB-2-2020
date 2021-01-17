<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stall;
use App\Models\ProductStall;

class ProductStallController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $productStall =ProductStall::all();
        return response()->json($productStall); 
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $stall = Stall::find($request->idPuesto);
        $product = Product::find($request->idProducto);

        if($stall->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que puesto esta eliminado/oculto."]);
        if($product->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que producto esta eliminado/oculto."]);

        if($stall == null and $product == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($stall == null)return response()->json(["message"=> "El identificador de puesto no existe."]);
        if($product == null)return response()->json(["message"=> "El identificador de producto no existe."]);

        $productStall = new ProductStall();
        $productStall->idPuesto = $request->idPuesto;        
        $productStall->idProducto = $request->idProducto;
        $productStall->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $productStall->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $productStall = ProductStall::find($id);
        if($productStall != null){
            return response()->json($productStall);
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
