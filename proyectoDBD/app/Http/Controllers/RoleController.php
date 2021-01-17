<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $role = Role::all()->where("softDelete", False);
        return response()->json($role);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->nombreRol != null){
            // si atributo no es nulo
            if(is_string($request->nombreRol)){ 
                // si es string
                $role = new Role();
                $role->nombreRol = $request->nombreRol;
                $role->softDelete = False;
                $role->save();
                return response()->json([
                    "message"=> "Se ha creado un rol.",
                    "id"=> $role->id
                ], 202);
            }
            return response()->json(["message"=>"Nombre rol debe ser string."]);
        }
        return response()->json(["message"=>"RUT usuario es obligatorio."]);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $role = Role::find($id);
        if($role != null){
            if($role->softDelete != True)return response()->json($role);
            return response()->json(["message"=>"El rol está eliminada."]);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if($role != null){
            if($role->softDelete != False){
                return response()->json(["message"=>"El rol deseado no puede ser modificado debido a que se encuentra eliminado/oculto"]);
            }
            // Si no es nulo
            // atributo
            if($request->nombreRol != null){
                // si atributo no es nulo
                if(is_string($request->nombreRol)){
                    // si es string
                    $role->nombreRol = $request->nombreRol;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Nombre rol debe ser string."]);
                }
            }
            $role->save();
            return response()->json($role);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
    
    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $role = Role::find($id);
        if($role != null){
            if($role->softDelete){
                return response()->json(["message"=>"El rol ya está eliminado."]);         
            }
            $role->softDelete = True;
            $role->save();
            return response()->json(["message"=>"El rol ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $role = Role::find($id);
        if($role != null){
            if($role->softDelete){
                $role->softDelete = False;
                $role->save();
                return response()->json([
                    "message"=> "Se ha recuperado el rol.",
                    "id"=> $role->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el rol no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
