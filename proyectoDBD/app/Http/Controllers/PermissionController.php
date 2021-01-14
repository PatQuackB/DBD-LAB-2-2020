<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        //$permission = Permission::all();
        $permission = Permission::all()->where($permission->softDelete,false);
        return response()->json($permission);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->nombrePermiso = $request->nombrePermiso;
        $permission->softDelete = False;
        $permission->save();
        return response()->json(["message"=> "Se ha creado un permiso.", "id"=> $permission->id], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $permission = Permission::find($id);
        if($permission != null){
            return response()->json($permission);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if($permission != null){
            if($permission->softDelete){
                return response()->json(["message"=>"El permiso ya está eliminado."]);         
            }
            $permission->softDelete = True;
            $permission->save();
            return response()->json(["message"=>"El permiso ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $permission = Permission::find($id);
        if($permission != null){
            if($permission->softDelete){
                $permission->softDelete = False;
                $permission->save();
                return response()->json([
                    "message"=> "Se ha recuperado el permiso.",
                    "id"=> $permission->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el permiso no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
