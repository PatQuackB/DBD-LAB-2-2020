<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $category = Category::all();
        //$category = Category::all()->where($category->softDelete,false);
        return response()->json($category);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->nombreCategoria != null){
                if(is_string($request->nombreCategoria)){
                    // Si es string
                    $category = new Category();
                    $category->nombreCategoria = $request->nombreCategoria;
                    $category->softDelete = False;
                    $category->save();
                    return response()->json([
                        "message"=> "Se ha creado una comuna",
                        "id"=> $category->id
                    ], 202);
                }else{
                    // Si no es string
                    return response()->json(["message"=>"NombreCategoria debe ser un string."]);
                }
        }else{
            // Si es nulo
            return response()->json($category);
        }
    }
    
    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $category = Category::find($id);
        if($category != null){
            if($category->softDelete != True)return response()->json($category);
            return response()->json(["message"=>"La categoría está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category != null){
            if($request->nombreCategoria != null){
                if(is_string($request->nombreCategoria)){
                    $category->nombreCategoria= $request->nombreCategoria;
                    $category->save();
                    return response()->json($category);
                }else{
                    return response()->json(["message"=>"NombreCategoría debe ser un string."]);
                }
            }else{
                return response()->json($category);
            }
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category != null){
            if($category->softDelete){
                return response()->json(["message"=>"La categoría ya está eliminada."]);         
            }
            $category->softDelete = True;
            $category->save();
            return response()->json(["message"=>"La categoría ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $category = Category::find($id);
        if($category != null){
            if($category->softDelete){
                $category->softDelete = False;
                $category->save();
                return response()->json([
                    "message"=> "Se ha recuperado la categoria",
                    "id"=> $category->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la categoría no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
