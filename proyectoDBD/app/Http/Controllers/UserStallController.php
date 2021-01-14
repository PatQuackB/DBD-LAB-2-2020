<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStall;

class UserStallController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $userStall = UserStall::all();
        return response()->json($userStall);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $userStall = UserStall::find($id);
        if($userStall != null){
            return response()->json($userStall);
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
