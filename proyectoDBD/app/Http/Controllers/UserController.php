<?php

namespace App\Http\Controllers;
//use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
        if($request->rutUsuario != null){
            // si atributo no es nulo
            if(is_string($request->rutUsuario)){ 
                // si es string
                if($request->nombreUsuario != null){
                    if(is_string($request->nombreUsuario)){ 
                        if($request->apellidoUsuario != null){
                            if(is_string($request->apellidoUsuario)){ 
                                if($request->correoUsuario != null){
                                    if(is_string($request->correoUsuario)){ 
                                        //if($request->correoUsuarioVerificado != null){
                                            //if($request->correoUsuarioVerificado instanceof DateTime){ 
                                                if($request->contraseniaUsuario != null){
                                                    if(is_string($request->contraseniaUsuario)){ 
                                                        $user = new User();
                                                        $user->rutUsuario = $request->rutUsuario;
                                                        $user->nombreUsuario = $request->nombreUsuario;
                                                        $user->idCalle = 1;
                                                        $user->idRol = 1;
                                                        $user->apellidoUsuario = $request->apellidoUsuario;
                                                        $user->correoUsuario = $request->correoUsuario;
                                                        //$user->correoUsuarioVerificado = now();//$request->correoUsuarioVerificado;
                                                        $user->contraseniaUsuario = $request->contraseniaUsuario;
                                                        $user->softDelete = False;
                                                        $user->save();
                                                        return redirect('welcome');
                                                    }
                                                    return response()->json(["message"=>"Contraseña usuario debe ser string."]);
                                                }
                                                return response()->json(["message"=>"Contraseña usuario es obligatorio."]);
                                            //}
                                            //return response()->json(["message"=>"Correo usuario verificado debe ser una fecha."]);
                                        //}
                                        //return response()->json(["message"=>"Correo usuario verificado es obligatorio."]);
                                    }
                                    return response()->json(["message"=>"Correo usuario debe ser string."]);
                                }
                                return response()->json(["message"=>"Correo usuario es obligatorio."]);
                            }
                            return response()->json(["message"=>"Apellido usuario debe ser string."]);
                        }
                        return response()->json(["message"=>"Apellido usuario es obligatorio."]);
                    }
                    return response()->json(["message"=>"Nombre usuario debe ser string."]);
                }
                return response()->json(["message"=>"Nombre usuario es obligatorio."]);
            }
            return response()->json(["message"=>"RUT usuario debe ser string."]);
        }
        return response()->json(["message"=>"RUT usuario es obligatorio."]);
    }
    

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {

        $user = User::find($id);
        if($user != null){
            return view('perfil', compact('user'));
            //return response()->json($user);
        }
        //return view('perfil')->with('user',$user);
        return view('perfil', compact('user'));
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        //return $request;
        $user = User::find($id);
        //print_r($request);
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->rutUsuario = $request->rutUsuario;
        $user->save();
        //return redirect('perfil')->with('user',$user);
        return view('perfil', compact('user'));
        if($user != null){
            // Si no es nulo
            // atributo
            /*if($request->rutUsuario != null){
                // si atributo no es nulo
                if(is_string($request->rutUsuario)){
                    // si es string
                    $user->rutUsuario = $request->rutUsuario;
                }
                else{
                    // si no es string
                    return response()->json(["message"=>"RUT usuario debe ser string."]);
                }
            }
            if($request->nombreUsuario != null){
                if(is_string($request->nombreUsuario)){
                    $user->nombreUsuario = $request->nombreUsuario;
                }
                else{
                    return response()->json(["message"=>"Nombre usuario debe ser string."]);
                }
            }
            if($request->apellidoUsuario != null){
                if(is_string($request->apellidoUsuario)){
                    $user->apellidoUsuario = $request->apellidoUsuario;
                }
                else{
                    return response()->json(["message"=>"Apellido usuario debe ser string."]);
                }
            }
            if($request->correoUsuario != null){
                if(is_string($request->correoUsuario)){
                    $user->correoUsuario = $request->correoUsuario;
                }
                else{
                    return response()->json(["message"=>"Correo usuario debe ser string."]);
                }
            }
            if($request->correoUsuarioVerificado != null){
                if($request->correoUsuarioVerificado instanceof DateTime){
                    $user->correoUsuarioVerificado = $request->correoUsuarioVerificado;
                }
                else{
                    return response()->json(["message"=>"Correo usuario verificado debe ser una fecha."]);
                }
            }
            if($request->contraseniaUsuario != null){
                if(is_string($request->contraseniaUsuario)){
                    $user->contraseniaUsuario = $request->contraseniaUsuario;
                }
                else{
                    return response()->json(["message"=>"Contraseña usuario debe ser string."]);
                }
            }*/
            
            //return redirect('user/{{$user->id}}');
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

    // Show nuevo
    public function nuevoShow(Request $request)
    {
        $productos = DB::table('products')
        ->join('product_unit_of_measures', 'products.id', '=', 'product_unit_of_measures.idProducto')
        ->join('unit_of_measures', 'unit_of_measures.id', '=', 'product_unit_of_measures.idUnidadMedida')
        ->get();
        
        $user = User::all()->where('softDelete',false)
        ->where('correoUsuario', $request->correoUsuario)
        ->where('contraseniaUsuario', $request->contraseniaUsuario)->first();

        if($user != NULL){
            return view('home')->with('user',$user)->with('productos', $productos);
            //return view('home')->with('user', $user);
        }
        return redirect('iniciarSesion');
    }
}