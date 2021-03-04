<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$subCategory = SubCategory::all();
        $subCategory = SubCategory::all()->where($subCategory->softDelete,false);
        return response()->json($subCategory);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->nombreSubCategoria != null){
            // si atributo no es nulo
            if(is_string($request->nombreSubCategoria)){
                // si es string
                $subCategory = new SubCategory();
                $subCategory->nombreSubCategoria = $request->nombreSubCategoria;
                $subCategory->softDelete = False;
                $subCategory->save();
                return response()->json([
                    "message"=> "Se ha creado una orden una subcategoria.",
                    "id"=> $subCategory->id
                ], 202);
            }
            return response()->json(["message"=>"Nombre sub categoría debe ser string."]);
        }
        return response()->json(["message"=>"Nombre sub categoría es obligatorio."]);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory != null){
            return response()->json($subCategory);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory != null){
            // Si no es nulo
            // atributo
            if($request->nombreSubCategoria != null){
                // si atrlto no es nulo
                if(is_string($request->nombreSubCategoria)){
                    // si es string
                    $subCategory->nombreSubCategoria = $request->nombreSubCategoria;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Nombre sub categoría debe ser string."]);
                }
            }
            $subCategory->save();
            return response()->json($subCategory);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory != null){
            if($subCategory->softDelete){
                return response()->json(["message"=>"La subcategoría ya está eliminada."]);         
            }
            $subCategory->softDelete = True;
            $subCategory->save();
            return response()->json(["message"=>"La subcategoría ha sido eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory != null){
            if($subCategory->softDelete){
                $subCategory->softDelete = False;
                $subCategory->save();
                return response()->json([
                    "message"=> "Se ha recuperado la subcategoría.",
                    "id"=> $subCategory->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que la subcategoría no está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
