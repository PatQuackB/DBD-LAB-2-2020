<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $paymentMethod = PaymentMethod::all();
        return response()->json($paymentMethod);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if($paymentMethod != null){
            return response()->json($paymentMethod);
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
