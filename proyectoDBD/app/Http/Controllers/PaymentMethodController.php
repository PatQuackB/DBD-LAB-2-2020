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
        //$paymentMethod = PaymentMethod::all()->where($paymentMethod->softDelete,false);
        return response()->json($paymentMethod);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $paymentMethod = new PaymentMethod();
        $paymentMethod->estadoPago = $request->estadoPago;
        $paymentMethod->tipoTarjeta = $request->tipoTarjeta;
        $paymentMethod->nombreBanco = $request->nombreBanco;
        $paymentMethod->ultimosNumerosTarjeta = $request->ultimosNumerosTarjeta;
        $paymentMethod->mesVencimiento = $request->mesVencimiento;
        $paymentMethod->anioVencimiento = $request->anioVencimiento;
        $paymentMethod->softDelete = False;
        $paymentMethod->save();
        return response()->json(["message"=> "Se ha creado un método de pago.", "id"=> $paymentMethod->id], 202);
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
        $paymentMethod = PaymentMethod::find($id);
        if($paymentMethod != null){
            $paymentMethod->nombreFeria= $request->nombreFeria;
            $paymentMethod->save();
            return response()->json($fair);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if($paymentMethod != null){
            if($paymentMethod->softDelete){
                return response()->json(["message"=>"El método de pago ya está eliminado."]);         
            }
            $paymentMethod->softDelete = True;
            $paymentMethod->save();
            return response()->json(["message"=>"El método de pago ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if($paymentMethod != null){
            if($paymentMethod->softDelete){
                $paymentMethod->softDelete = False;
                $paymentMethod->save();
                return response()->json([
                    "message"=> "Se ha recuperado el método de pago.",
                    "id"=> $paymentMethod->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el método de pago no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
