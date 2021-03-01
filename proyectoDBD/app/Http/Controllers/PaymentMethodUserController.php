<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\PaymentMethodUser;

class PaymentMethodUserController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $paymentMethodUser = PaymentMethodUser::all();
        return response()->json($paymentMethodUser);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $paymentMethod = PaymentMethod::find($request->idPago);
        $user = User::find($request->idUsuario);

        if($paymentMethod == null and $user == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($paymentMethod == null)return response()->json(["message"=> "El identificador de método de pago no existe."]);
        if($user == null)return response()->json(["message"=> "El identificador de usuario no existe."]);

        $paymentMethodUser = new PaymentMethodUser();
        $paymentMethodUser->idPago = $request->idPago;        
        $paymentMethodUser->idUsuario = $request->idUsuario;
        $paymentMethodUser->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $paymentMethodUser->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $paymentMethodUser = PaymentMethodUser::find($id);
        if($paymentMethodUser != null){
            return response()->json($paymentMethodUser);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    /*
    public function update(Request $request, $id)
    {
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }
    */
}
