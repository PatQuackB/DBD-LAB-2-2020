<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fair;

class FairController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$fair = Fair::all();
        $fair = Fair::all()->where($fair->softDelete,false);
        return response()->json($fair);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->nombreFeria != null){
            // si atributo no es nulo
            if(is_string($request->nombreFeria)){ 
                // si es string
                $fair = new Fair();
                $fair->nombreFeria = $request->nombreFeria;
                $fair->softDelete = False;
                $fair->save();
                return response()->json(["message"=> "Se ha creado una feria.", "id"=> $fair->id], 202);
            }
            return response()->json(["message"=>"Nombre feria debe ser string."]);
        }
        return response()->json(["message"=>"Nombre feria es obligatorio."]);
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
        $fair = Fair::find($id);
        if($fair != null){
            // Si no es nulo
            // atributo
            if($request->nombreFeria != null){
                // si atributo no es nulo
                if(is_string($request->nombreFeria)){ 
                    // si es string
                    $fair->nombreFeria = $request->nombreFeria;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Nombre feria debe ser string."]);
                }
            }
            $fair->save();
            return response()->json($fair);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $fair = Fair::find($id);
        if($fair != null){
            if($fair->softDelete){
                return response()->json(["message"=>"La feria ya está eliminada."]);         
            }
            $fair->softDelete = True;
            $fair->save();
            return response()->json(["message"=>"La feria ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $fair = Fair::find($id);
        if($fair != null){
            if($fair->softDelete){
                $fair->softDelete = False;
                $fair->save();
                return response()->json([
                    "message"=> "Se ha recuperado la feria.",
                    "id"=> $fair->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la feria no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
