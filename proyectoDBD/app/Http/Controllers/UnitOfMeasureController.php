<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitOfMeasure;

class UnitOfMeasureController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $unitOfMeasure = UnitOfMeasure::all();
        return response()->json($unitOfMeasure);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $unitOfMeasure = UnitOfMeasure::find($id);
        if($unitOfMeasure != null){
            return response()->json($unitOfMeasure);
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
