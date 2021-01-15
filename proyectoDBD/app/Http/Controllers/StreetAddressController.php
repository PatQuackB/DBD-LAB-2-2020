<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StreetAddress;

class StreetAddressController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$streetAddress = StreetAddress::all();
        $streetAddress = StreetAddress::all()->where($streetAddress->softDelete,false);
        return response()->json($streetAddress);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $streetAddress = new StreetAddress();
        $streetAddress->nombreCalle = $request->nombreCalle;
        $streetAddress->softDelete = False;
        $streetAddress->save();
        return response()->json([
            "message"=> "Se ha creado una direccion de calle.",
            "id"=> $streetAddress->id
        ], 202);
    }  
    

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $streetAddress = StreetAddress::find($id);
        if($streetAddress != null){
            return response()->json($streetAddress);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $streetAddress = StreetAddress::find($id);
        if($streetAddress != null){
            $streetAddress->nombreCalle= $request->nombreCalle;
            $streetAddress->save();
            return response()->json($streetAddress);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $streetAddress = StreetAddress::find($id);
        if($streetAddress != null){
            if($streetAddress->softDelete){
                return response()->json(["message"=>"La calle de dirección ya está eliminada."]);         
            }
            $streetAddress->softDelete = True;
            $streetAddress->save();
            return response()->json(["message"=>"La calle de dirección ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $streetAddress = StreetAddress::find($id);
        if($streetAddress != null){
            if($streetAddress->softDelete){
                $streetAddress->softDelete = False;
                $streetAddress->save();
                return response()->json([
                    "message"=> "Se ha recuperado la calle de dirección.",
                    "id"=> $streetAddress->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la calle de dirección no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
