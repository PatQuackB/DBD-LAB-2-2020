<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NumberAddress;

class NumberAddressController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $numberAddress = NumberAddress::all();
        return response()->json($numberAddress);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
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
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }
}
