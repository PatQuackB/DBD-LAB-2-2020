<?php

namespace App\Http\Controllers;
//use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Region;
use App\Models\Commune;
use App\Models\StreetAddress;
use App\Models\NumberAddress;
use App\Models\Role;


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
    /*
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
    }*/

    


    public function store(Request $request)
    {
        $region = new Region();
        $region->nombreRegion = $request->nombreRegion;
        $region->softDelete = False;
        $region->save(); 

        $commune = new Commune();
        $commune->nombreComuna = $request->nombreComuna;
        $commune->idRegion = $region->id;
        $commune->softDelete = False;
        $commune->save();

        $streetAddress = new StreetAddress();
        $streetAddress->nombreCalle = $request->nombreCalle;
        $streetAddress->softDelete = False;
        $streetAddress->save();

        $numberAddress = new NumberAddress();
        $numberAddress->numeroCalle = $request->numeroCalle;
        $numberAddress->idCalle = $streetAddress->id;
        $numberAddress->idComuna = $commune->id;
        $numberAddress->softDelete = False;
        $numberAddress->save();

        $role = new Role();
        $role->nombreRol = $request->nombreRol;
        $role->softDelete = False;
        $role->save();

        $user = new User();
        $user->rutUsuario = $request->rutUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->idCalle = $streetAddress->id;
        $user->idRol = $role->id;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->softDelete = False;
        $user->save();
        return redirect('welcome');
                                                    
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
        $user = User::find($id);
        $region = new Region();
        $region->nombreRegion = $request->nombreRegion;
        $region->softDelete = False;
        $region->save(); 

        $commune->nombreComuna = $request->nombreComuna;
        $commune->idRegion = $region->id;
        $commune->softDelete = False;
        $commune->save();

        $streetAddress = new StreetAddress();
        $streetAddress->nombreCalle = $request->nombreCalle;
        $streetAddress->softDelete = False;
        $streetAddress->save();

        $numberAddress = new NumberAddress();
        $numberAddress->numeroCalle = $request->numeroCalle;
        $numberAddress->idCalle = $streetAddress->id;
        $numberAddress->idComuna = $commune->id;
        $numberAddress->softDelete = False;
        $numberAddress->save();

        $role = new Role();
        $role->nombreRol = $request->nombreRol;
        $role->softDelete = False;
        $role->save();


        $user->rutUsuario = $request->rutUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->idCalle = $streetAddress->id;
        $user->idRol = $role->id;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->softDelete = False;
        $user->save();
        /*return redirect('welcome');





        $user = User::find($id);
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->rutUsuario = $request->rutUsuario;
        $user->save();*/
        return view('perfil', compact('user'));
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