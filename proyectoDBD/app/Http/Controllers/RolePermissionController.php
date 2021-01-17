<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class RolePermissionController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $rolePermission = RolePermission::all();
        return response()->json($rolePermission);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $role = Role::find($request->idRol);
        $permission = Permission::find($request->idPermiso);

        if($role->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que rol esta eliminado/oculto."]);
        if($permission->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que permiso esta eliminado/oculto."]);

        if($role == null and $permission == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($role == null)return response()->json(["message"=> "El identificador de rol no existe."]);
        if($permission == null)return response()->json(["message"=> "El identificador de permiso no existe."]);

        $rolePermission = new RolePermission();
        $rolePermission->idRol = $request->idRol;        
        $rolePermission->idPermiso = $request->idPermiso;
        $rolePermission->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $rolePermission->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $rolePermission = RolePermission::find($id);
        if($rolePermission != null){
            return response()->json($rolePermission);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    /*public function update(Request $request, $id)
    {
        
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        
    }*/
}
