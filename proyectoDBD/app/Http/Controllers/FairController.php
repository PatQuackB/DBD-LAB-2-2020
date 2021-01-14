<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fair;

class FairController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $fair = Fair::all();
        return response()->json($fair);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $fair = Fair::find($id);
        if($fair != null){
            return response()->json($fair);
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
