<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stall;
use App\Models\UserStall;

class UserStallController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $userStall = UserStall::all();
        return response()->json($userStall);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        $user = User::find($request->idUsuario);
        $stall = Stall::find($request->idPuesto);

        if($user->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que usuario esta eliminado/oculto."]);
        if($stall->softDelete != False)return response()->json(["message"=> "No se puede crear la relacion, por que puesto esta eliminado/oculto."]);

        if($user == null and $stall == null)return response()->json(["message"=> "Ninguno de los identificadores existe."]);
        if($user == null)return response()->json(["message"=> "El identificador de usuario no existe."]);
        if($stall == null)return response()->json(["message"=> "El identificador de puesto no existe."]);

        $userStall = new UserStall();
        $userStall->idUsuario = $request->idUsuario;        
        $userStall->idPuesto = $request->idPuesto;
        $userStall->save();

        return response()->json([
            "message"=> "Se ha creado la relación.",
            "id"=> $userStall->id
        ], 202);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $userStall = UserStall::find($id);
        if($userStall != null){
            return response()->json($userStall);
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
