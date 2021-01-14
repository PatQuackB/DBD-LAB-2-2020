<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $category = new Category();
        $category->nombreCategoria= $request->nombreCategoria;
        $category->save();
        return response()->json([
            "message"=> "Se ha creado una categoria",
            "id"=> $category->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $category = Category::find($id);
        if($category != null){
            return response()->json($category);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category != null){
            $category->nombreCategoria= $request->nombreCategoria;
            $category->save();
            return response()->json($category);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }
}
