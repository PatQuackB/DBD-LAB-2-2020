<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $region = Region::all();
        //$region = Region::all()->where($region->softDelete,false);
        return response()->json($region);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $region = new Region();
        $region->nombreRegion = $request->nombreRegion;
        $region->softDelete = False;
        $region->save();
        return response()->json([
            "message"=> "Se ha creado una región",
            "id"=> $region->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $region = Region::find($id);
        if($region != null){
            if($region->softDelete != True)return response()->json($region);
            return response()->json(["message"=>"La región está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $region = Region::find($id);
        if($region != null){
            $region->nombreRegion= $request->nombreRegion;
            $region->save();
            return response()->json($region);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $region = Region::find($id);
        if($region != null){
            if($region->softDelete){
                return response()->json(["message"=>"La región ya está eliminada."]);         
            }
            $region->softDelete = True;
            $region->save();
            return response()->json(["message"=>"La región ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $region = Region::find($id);
        if($region != null){
            if($region->softDelete){
                $region->softDelete = False;
                $region->save();
                return response()->json([
                    "message"=> "Se ha recuperado la región",
                    "id"=> $region->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la región no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
