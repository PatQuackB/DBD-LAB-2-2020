<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $product = Product::all()->where("softDelete", False);
        return response()->json($product); 
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->nombreProducto != null){
            // si atributo no es nulo
            if(is_string($request->nombreProducto)){ 
                // si es string
                if($request->precioProducto != null){
                    if(is_integer($request->precioProducto)){ 
                        if($request->stockProducto != null){
                            if(is_integer($request->stockProducto)){ 
                                $product = new Product();
                                $product->nombreProducto = $request->nombreProducto;
                                $product->precioProducto = $request->precioProducto;
                                $product->stockProducto = $request->stockProducto;
                                $product->softDelete = False;
                                $product->save();
                                return response()->json([
                                    "message"=> "Se ha creado un producto.",
                                    "id"=> $product->id
                                ], 202);
                            }
                            return response()->json(["message"=>"Stock producto debe ser número."]);
                        }
                        return response()->json(["message"=>"Stock producto es obligatorio."]);
                    }
                    return response()->json(["message"=>"Precio producto debe ser número."]);
                }
                return response()->json(["message"=>"Precio producto es obligatorio."]);
            }
            return response()->json(["message"=>"Nombre producto debe ser string."]);
        }
        return response()->json(["message"=>"Nombre producto es obligatorio."]);
        
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $product = Product::find($id);
        if($product != null){
            if($product->softDelete != True)return response()->json($product);
            return response()->json(["message"=>"El producto está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product != null){
            if($product->softDelete != False){
                return response()->json(["message"=>"El producto deseado no puede ser modificado debido a que se encuentra eliminado/oculto"]);
            }
            // Si no es nulo
            // atributo
            if($request->nombreProducto != null){
                // si atributo no es nulo
                if(is_string($request->nombreProducto)){ 
                    // si es string
                    $product->nombreProducto = $request->nombreProducto;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Nombre producto debe ser string."]);
                }
            }
            if($request->precioProducto != null){
                if(is_integer($request->precioProducto)){ 
                    $product->precioProducto = $request->precioProducto;
                }
                else{
                    return response()->json(["message"=>"Precio producto debe ser número."]);
                }
            }
            if($request->stockProducto != null){
                if(is_integer($request->stockProducto)){ 
                    $product->stockProducto = $request->stockProducto;
                }
                else{
                    return response()->json(["message"=>"Stock producto debe ser número."]);
                }
            }
            $product->save();
            return response()->json($product);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product != null){
            if($product->softDelete){
                return response()->json(["message"=>"El producto ya está eliminado."]);         
            }
            $product->softDelete = True;
            $product->save();
            return response()->json(["message"=>"El producto ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $product = Product::find($id);
        if($product != null){
            if($product->softDelete){
                $product->softDelete = False;
                $product->save();
                return response()->json([
                    "message"=> "Se ha recuperado el producto.",
                    "id"=> $product->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el producto no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
