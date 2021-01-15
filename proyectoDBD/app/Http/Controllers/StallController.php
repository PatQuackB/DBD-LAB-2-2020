<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stall;

class StallController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$stall = Stall::all();
        $stall = Stall::all()->where($stall->softDelete,false);
        return response()->json($stall);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $stall = new Stall();
        $stall->nombrePuesto = $request->nombrePuesto;
        $stall->softDelete = False;
        $stall->save();
        return response()->json([
            "message"=> "Se ha creado un puesto.",
            "id"=> $stall->id
        ], 202);
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
        $stall = Stall::find($id);
        if($stall != null){
            $stall->nombrePuesto= $request->nombrePuesto;
            $stall->save();
            return response()->json($stall);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            if($stall->softDelete){
                return response()->json(["message"=>"El puesto ya está eliminado."]);         
            }
            $stall->softDelete = True;
            $stall->save();
            return response()->json(["message"=>"El puesto ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            if($stall->softDelete){
                $stall->softDelete = False;
                $stall->save();
                return response()->json([
                    "message"=> "Se ha recuperado el puesto.",
                    "id"=> $stall->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el puesto no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
