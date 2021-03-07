<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PurchaseOrder;
use App\Models\User;
use App\Models\PurchaseOrderProduct;
use App\Models\PaymentMethodUser;

class PurchaseOrderController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $purchaseOrder = PurchaseOrder::all();
        //$purchaseOrder = PurchaseOrder::all()->where($purchaseOrder->softDelete,false);
        return response()->json($purchaseOrder);
    }

    public function irCrearOrden(Request $request, $id)
    {
        $ordenCompra = new PurchaseOrder();
        $ordenCompra->numeroCompra = uniqid();
        $ordenCompra->fechaCompra = now();

        $carrito = session()->get('carrito');
        $valorTotal = 0;
        
        foreach($carrito as $producto){
            $valorTotal = $valorTotal + $producto['total'];
        }

        $ordenCompra->montoTotal = $valorTotal;
        $ordenCompra->softDelete = False;
        $ordenCompra->idUsuario = $id;
        $ordenCompra->save();

        foreach($carrito as $producto){;
            $ordenCompraProducto = new PurchaseOrderProduct();
            $ordenCompraProducto->idProducto = $producto['idProducto'];
            $ordenCompraProducto->idOrdenCompra = $ordenCompra->id;
            $ordenCompraProducto->save();
        }

        $user = User::find($id);
        session()->put('ultimaOrden', $ordenCompra->id);
        print_r(session()->get('ultimaOrden'));

        return view('metodoPago', compact('user', 'ordenCompra'));
    } 

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->numeroCompra != null){
            // si atributo no es nulo
            if(is_string($request->numeroCompra)){ 
                // si es string
                if($request->fechaCompra != null){
                    //if($request->fechaCompra instanceof(DateTime)){ 
                        if($request->montoTotal != null){
                            if(is_integer($request->montoTotal)){ 
                                $purchaseorder = new PurchaseOrder();
                                $purchaseorder->numeroCompra = $request->numeroCompra;
                                $purchaseorder->fechaCompra = now();//$request->fechaCompra;
                                $purchaseorder->montoTotal = $request->montoTotal;
                                $purchaseorder->softDelete = False;
                                $purchaseorder->save();
                                return response()->json([
                                    "message"=> "Se ha creado una orden de compra.",
                                    "id"=> $purchaseorder->id
                                ], 202);
                            }
                            return response()->json(["message"=>"Monto total debe ser un número."]);
                        }
                        return response()->json(["message"=>"Monto total es obligatorio."]);
                    //}
                    return response()->json(["message"=>"Fecha compra debe ser una fecha."]);
                }
                return response()->json(["message"=>"Fecha compra es obligatorio."]);
            }
            return response()->json(["message"=>"Numero compra debe ser string."]);
        }
        return response()->json(["message"=>"Numero compra es obligatorio."]);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            return response()->json($purchaseOrder);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            // Si no es nulo
            // atributo
            if($request->numeroCompra != null){
                // si atributo no es nulo
                if(is_string($request->numeroCompra)){ 
                    // si es string
                    $purchaseOrder->numeroCompra = $request->numeroCompra;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Numero compra debe ser string."]);
                }
            }
            if($request->fechaCompra != null){
                //if($request->fechaCompra instanceof DateTime){ 
                    $purchaseOrder->fechaCompra = $request->fechaCompra;
                //}
                //else{
                    return response()->json(["message"=>"Fecha compra debe ser una fecha."]);
                //}
            }
            if($request->montoTotal != null){
                if(is_integer($request->montoTotal)){ 
                    $purchaseOrder->montoTotal = $request->montoTotal;
                }
                else{
                    return response()->json(["message"=>"Monto total debe ser un número."]);
                }
            }
            $purchaseOrder->save();
            return response()->json($purchaseOrder);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            if($purchaseOrder->softDelete){
                return response()->json(["message"=>"La orden de compra ya está eliminada."]);         
            }
            $purchaseOrder->softDelete = True;
            $purchaseOrder->save();
            return response()->json(["message"=>"La orden de compra ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        if($purchaseOrder != null){
            if($purchaseOrder->softDelete){
                $purchaseOrder->softDelete = False;
                $purchaseOrder->save();
                return response()->json([
                    "message"=> "Se ha recuperado la orden de compra.",
                    "id"=> $purchaseOrder->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la orden de compra no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
