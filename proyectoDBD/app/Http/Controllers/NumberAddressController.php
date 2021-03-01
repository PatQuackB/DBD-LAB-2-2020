<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NumberAddress;

class NumberAddressController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$numberAddress = NumberAddress::all();
        $numberAddress = NumberAddress::all()->where($numberAddress->softDelete,false);
        return response()->json($numberAddress);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->numeroDireccion != null){
            // si atributo no es nulo
            if(is_string($request->numeroDireccion)){ 
                // si es string
                $numberAddress = new NumberAddress();
                $numberAddress->numeroDireccion = $request->numeroDireccion;
                $numberAddress->softDelete = False;
                $numberAddress->save();
                return response()->json(["message"=> "Se ha creado un número de dirección.", "id"=> $numberAddress->id], 202);
            }
            return response()->json(["message"=>"Numero dirección debe ser string."]);
        }
        return response()->json(["message"=>"Numero dirección es obligatorio."]);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $numberAddress = NumberAddress::find($id);
        if($numberAddress != null){
            return response()->json($numberAddress);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $numberAddress = NumberAddress::find($id);
        if($numberAddress != null){
            // Si no es nulo
            // atributo
            if($request->numeroDireccion != null){
                // si atributo no es nulo
                if(is_string($request->numeroDireccion)){
                    // si es string
                    $numberAddress->numeroDireccion = $request->numeroDireccion;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Numero dirección debe ser string."]);
                }
            }
            $numberAddress->save();
            return response()->json($numberAddress);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $numberAddress = NumberAddress::find($id);
        if($numberAddress != null){
            if($numberAddress->softDelete){
                return response()->json(["message"=>"El número de dirección ya está eliminado."]);         
            }
            $numberAddress->softDelete = True;
            $numberAddress->save();
            return response()->json(["message"=>"El número de dirección ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $numberAddress = NumberAddress::find($id);
        if($numberAddress != null){
            if($numberAddress->softDelete){
                $numberAddress->softDelete = False;
                $numberAddress->save();
                return response()->json([
                    "message"=> "Se ha recuperado el número de dirección.",
                    "id"=> $numberAddress->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el número de dirección no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
