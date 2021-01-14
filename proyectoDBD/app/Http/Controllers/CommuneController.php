<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use Illuminate\Support\Facades\Validator;

class CommuneController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$commune = Commune::all();
        $commune = Commune::all()->where($commune->softDelete,false);
        return response()->json($commune);
    }
    

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombreComuna' => 'required'
         ]
        );
        if($this == null)return response()->json(["message"=> "No se ha creado"]);
        $commune = new Commune();
        $commune->nombreComuna = $request->nombreComuna;
        $commune->softDelete = False;
        $commune->save();
        return response()->json([
            "message"=> "Se ha creado una comuna",
            "id"=> $commune->id
        ], 202);

        /* Copia aqui abajo
        $commune = new Commune();
        $commune->nombreComuna = $request->nombreComuna;
        $commune->softDelete = False;
        $commune->save();
        return response()->json([
            "message"=> "Se ha creado una categoria",
            "id"=> $commune->id
        ], 202);
        hasta aqui arriba *//*
        $request->validate([
            'nombreComuna' => 'required|unique:communes|max:255',
        ]);*/
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $commune = Commune::find($id);
        if($commune != null){
            if($commune->softDelete != True)return response()->json($commune);
            return response()->json(["message"=>"La comuna está eliminada."]);
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
        $commune = Commune::find($id);
        if($commune != null){
            if($commune->softDelete){
                return response()->json(["message"=>"La comuna ya está eliminada."]);         
            }
            $commune->softDelete = True;
            $commune->save();
            return response()->json(["message"=>"La comuna ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $commune = Commune::find($id);
        if($commune != null){
            if($commune->softDelete){
                $commune->softDelete = False;
                $commune->save();
                return response()->json([
                    "message"=> "Se ha recuperado la categoria",
                    "id"=> $commune->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la comuna no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    
}
