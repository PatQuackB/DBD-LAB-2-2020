<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function update(Request $request, $id)
    {
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }
}
