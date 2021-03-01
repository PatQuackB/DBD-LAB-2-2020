<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UnitOfMeasure;
use App\Models\ProductUnitOfMeasure;

class ProductUnitOfMeasureController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $productUnitOfMeasure = ProductUnitOfMeasure::all();
        return response()->json($productUnitOfMeasure);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $unitOfMeasure = UnitOfMeasure::find($request->idUnidadMedida);
        $product = Product::find($request->idProducto);

        if($unitOfMeasure == null and $product == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($unitOfMeasure == null)return response()->json(["message"=> "El identificador de unidad de medida no existe."]);
        if($product == null)return response()->json(["message"=> "El identificador de producto no existe."]);

        $productUnitOfMeasure = new ProductUnitOfMeasure();
        $productUnitOfMeasure->idUnidadMedida = $request->idUnidadMedida;        
        $productUnitOfMeasure->idProducto = $request->idProducto;
        $productUnitOfMeasure->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $productUnitOfMeasure->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $productUnitOfMeasure = ProductUnitOfMeasure::find($id);
        if($productUnitOfMeasure != null){
            return response()->json($productUnitOfMeasure);
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
