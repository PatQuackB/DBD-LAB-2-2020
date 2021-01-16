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
        //$unitOfMeasure = UnitOfMeasure::all()->where($unitOfMeasure->softDelete,false);
        return response()->json($unitOfMeasure);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $unitOfMeasure = new UnitOfMeasure();
        $unitOfMeasure->nombreUnidadMedida = $request->nombreUnidadMedida;
        $unitOfMeasure->softDelete = False;
        $unitOfMeasure->save();
        return response()->json([
            "message"=> "Se ha creado una orden de despacho.",
            "id"=> $unitOfMeasure->id
        ], 202);   
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $unitOfMeasure = UnitOfMeasure::find($id);
        if($unitOfMeasure != null){
            return response()->json($unitOfMeasure);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $unitOfMeasure = UnitOfMeasure::find($id);
        if($unitOfMeasure != null){
            $unitOfMeasure->nombreUnidadMedida= $request->nombreUnidadMedida;
            $unitOfMeasure->save();
            return response()->json($unitOfMeasure);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $unitOfMeasure = UnitOfMeasure::find($id);
        if($unitOfMeasure != null){
            if($unitOfMeasure->softDelete){
                return response()->json(["message"=>"La unidad de medida ya está eliminada."]);         
            }
            $unitOfMeasure->softDelete = True;
            $unitOfMeasure->save();
            return response()->json(["message"=>"La unidad de medida ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $unitOfMeasure = UnitOfMeasure::find($id);
        if($unitOfMeasure != null){
            if($unitOfMeasure->softDelete){
                $unitOfMeasure->softDelete = False;
                $unitOfMeasure->save();
                return response()->json([
                    "message"=> "Se ha recuperado la unidad de medida",
                    "id"=> $unitOfMeasure->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la unidad de medida no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
