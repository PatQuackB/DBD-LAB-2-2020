<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;

class CommuneController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $commune = Commune::all();
        return response()->json($commune);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $commune = new Commune();
        $commune->nombreComuna = $request->nombreComuna;
        $commune->save();
        return response()->json([
            "message"=> "Se ha creado una categoria",
            "id"=> $commune->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $commune = Commune::find($id);
        if($commune != null){
            return response()->json($commune);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $commune = Commune::find($id);
        if($commune != null){
            $commune->nombreComuna= $request->nombreComuna;
            $commune->save();
            return response()->json($commune);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }
}
