<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $user = User::all();
        //$user = User::all()->where($user->softDelete,false);
        return response()->json($user);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $user = new User();
        $user->rutUsuario = $request->rutUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->correoUsuarioVerificado = now();//$request->correoUsuarioVerificado;
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->softDelete = False;
        $user->save();
        return response()->json([
            "message"=> "Se ha creado un usuario.",
            "id"=> $user->id
        ], 202);
    }
    

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $user = User::find($id);
        if($user != null){
            return response()->json($user);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user != null){
            $user->rutUsuario= $request->rutUsuario;
            $user->nombreUsuario= $request->nombreUsuario;
            $user->apellidoUsuario= $request->apellidoUsuario;
            $user->correoUsuario= $request->correoUsuario;
            $user->contraseniaUsuario= $request->contraseniaUsuario;
            $user->save();
            return response()->json($user);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $user = User::find($id);
        if($user != null){
            if($user->softDelete){
                return response()->json(["message"=>"El usuario ya está eliminado."]);         
            }
            $user->softDelete = True;
            $user->save();
            return response()->json(["message"=>"El usuario ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $user = User::find($id);
        if($user != null){
            if($user->softDelete){
                $user->softDelete = False;
                $user->save();
                return response()->json([
                    "message"=> "Se ha recuperado el usuario.",
                    "id"=> $user->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el usuario no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }
}
