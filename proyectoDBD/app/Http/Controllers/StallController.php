<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stall;

class StallController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $stall = Stall::all();
        return response()->json($stall);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            return response()->json($stall);
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
