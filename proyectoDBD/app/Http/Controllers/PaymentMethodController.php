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
        if($request->estadoPago != null){
            // si atributo no es nulo
            if(is_integer($request->estadoPago)){
                // si es entero
                if($request->tipoTarjeta != null){
                    if(is_integer($request->tipoTarjeta)){ 
                        if($request->nombreBanco != null){
                            if(is_string($request->nombreBanco)){ 
                                if($request->ultimosNumerosTarjeta != null){
                                    if(is_string($request->ultimosNumerosTarjeta)){ 
                                        if($request->mesVencimiento != null){
                                            if(is_integer($request->mesVencimiento)){ 
                                                if($request->anioVencimiento != null){
                                                    if(is_integer($request->anioVencimiento)){ 
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
                                                    return response()->json(["message"=>"Año vencimiento debe ser número."]);
                                                }
                                                return response()->json(["message"=>"Año vencimiento es obligatorio."]);
                                            }
                                            return response()->json(["message"=>"Mes vencimiento debe ser número."]);
                                        }
                                        return response()->json(["message"=>"Mes vencimiento es obligatorio."]);
                                    }
                                    return response()->json(["message"=>"Ultimos números tarjeta debe ser string."]);
                                }
                                return response()->json(["message"=>"Ultimos números tarjeta es obligatorio."]);
                            }
                            return response()->json(["message"=>"Nombre banco debe ser string."]);
                        }
                        return response()->json(["message"=>"Nombre banco es obligatorio."]);
                    }
                    return response()->json(["message"=>"Tipo tarjeta debe ser número."]);
                }
                return response()->json(["message"=>"Tipo tarjeta es obligatorio."]);
            }
            return response()->json(["message"=>"Estado pago debe ser número."]);
        }
        return response()->json(["message"=>"Estado pago es obligatorio."]);
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
            // Si no es nulo
            // atributo
            if($request->estadoPago != null){
                // si atributo no es nulo
                if(is_integer($request->estadoPago)){ 
                    // si es entero
                    $paymentMethod->estadoPago = $request->estadoPago;
                }
                else{
                    // si no es entero
                    return response()->json(["message"=>"Estado pago debe ser número."]);
                }
            }
            if($request->tipoTarjeta != null){
                if(is_integer($request->tipoTarjeta)){ 
                    $paymentMethod->tipoTarjeta = $request->tipoTarjeta;
                }
                else{
                    return response()->json(["message"=>"Tipo tarjeta debe ser número."]);
                }
            }
            if($request->nombreBanco != null){
                if(is_string($request->nombreBanco)){ 
                    $paymentMethod->nombreBanco = $request->nombreBanco;
                }
                else{
                    return response()->json(["message"=>"Nombre banco debe ser string."]);
                }
            }
            if($request->ultimosNumerosTarjeta != null){
                if(is_string($request->ultimosNumerosTarjeta)){ 
                    $paymentMethod->ultimosNumerosTarjeta = $request->ultimosNumerosTarjeta;
                }
                else{
                    return response()->json(["message"=>"Ultimos números tarjeta debe ser string."]);
                }
            }
            if($request->mesVencimiento != null){
                if(is_integer($request->mesVencimiento)){ 
                    $paymentMethod->mesVencimiento = $request->mesVencimiento;
                }
                else{
                    return response()->json(["message"=>"Mes vencimiento debe ser número."]);
                }
            }
            if($request->anioVencimiento != null){
                if(is_integer($request->anioVencimiento)){ 
                    $paymentMethod->anioVencimiento = $request->anioVencimiento;
                }
                else{
                    return response()->json(["message"=>"Año vencimiento debe ser número."]);
                }
            }
            $paymentMethod->save();
            return response()->json($paymentMethod);
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
