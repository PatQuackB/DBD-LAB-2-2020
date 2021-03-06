<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserStall;
use Illuminate\Http\Request;
use App\Models\Stall;

class StallController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $stall = Stall::all();
        //$stall = Stall::all()->where($stall->softDelete,false);
        return response()->json($stall);
    }

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if($request->nombrePuesto != null){
            // si atributo no es nulo
            if(is_string($request->nombrePuesto)){
                // si es string
                $stall = new Stall();
                $stall->nombrePuesto = $request->nombrePuesto;
                $stall->softDelete = False;
                $stall->save();
                return response()->json([
                    "message"=> "Se ha creado un puesto.",
                    "id"=> $stall->id
                ], 202);
            }
            return response()->json(["message"=>"Nombre puesto debe ser string."]);
        }
        return response()->json(["message"=>"Nombre puesto es obligatorio."]);
    }
    

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            return response()->json($stall);
        }
        return response()->json(["message"=>"El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            // Si no es nulo
            // atributo
            if($request->nombrePuesto != null){
                // si atributo no es nulo
                if(is_string($request->nombrePuesto)){
                    // si es string
                    $stall->nombrePuesto = $request->nombrePuesto;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"Nombre puesto debe ser string."]);
                }
            }
            $stall->save();
            return response()->json($stall);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            if($stall->softDelete){
                return response()->json(["message"=>"El puesto ya está eliminado."]);         
            }
            $stall->softDelete = True;
            $stall->save();
            return response()->json(["message"=>"El puesto ha sido eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $stall = Stall::find($id);
        if($stall != null){
            if($stall->softDelete){
                $stall->softDelete = False;
                $stall->save();
                return response()->json([
                    "message"=> "Se ha recuperado el puesto.",
                    "id"=> $stall->id
                ], 202);
            }
            return response()->json(["message"=>"No es posible realizar la operación debido a que el puesto no está eliminado."]);
        }
        return response()->json(["message"=>"El id no existe."]);
    }

    
    public function irPuesto($id)
    {
        $user = User::find($id);
        //$userStall = UserStall::all()->where('idUsuario', $user->id);
        //$stall = Stall::find($userStall->idPuesto);

        $stalls = DB::table('users')
            ->join('user_stalls', 'users.id', '=', 'user_stalls.idUsuario')
            ->join('stalls', 'stalls.id', '=', 'user_stalls.idPuesto')
            ->select('stalls.id as idStall', 'users.id as idUser', 'stalls.nombrePuesto', 'stalls.idCalle')
            ->get()
            ->where('idUser', $user->id);
        //print_r($stalls);
        return view('puesto', compact('user', 'stalls'));
    }


}
