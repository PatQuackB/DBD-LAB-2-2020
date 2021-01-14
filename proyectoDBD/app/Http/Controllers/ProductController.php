<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $product = Product::all();
        //$product = Product::all()->where($product->softDelete,false);
        return response()->json($product);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
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

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $product = Product::find($id);
        if($product != null){
            return response()->json($product);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product != null){
            $product->nombreProducto= $request->nombreProducto;
            $product->precioProducto= $request->precioProducto;
            $product->stockProducto= $request->stockProducto;
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
