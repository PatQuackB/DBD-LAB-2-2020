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
        $user = new User();
        $user->rutUsuario = $request->rutUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->idRol = $request->idRol;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->idCalle = $request->idNombreCalle;
        

        $user->softDelete = false;

        $user->save();
        return redirect('iniciarSesion');
    }





    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $user = User::find($id);
        if ($user != null) {
            return view('perfil', compact('user'));
        }
        return view('perfil', compact('user')); //                  REVISAR AQUI
    }

    public function irPerfil($id)
    {
        $user = User::find($id);
        $rol = Role::find($user->idRol);
        $calle = StreetAddress::find($user->idCalle);
        $numeroCalle = NumberAddress::all()->where('idCalle', $calle->id)->first();
        //print($numeroCalle);
        $comuna = Commune::all()->where('id', $numeroCalle->idComuna)->first();
        $region = Region::find($comuna->idRegion);

        return view('perfil', compact('user', 'calle', 'numeroCalle', 'comuna', 'region','rol'));
    }
    public function homeBack($id)
    {
        $user = User::find($id);
        $commune = Commune::all()->where('softDelete',false);
        $productos = DB::table('products')
            ->join('product_unit_of_measures', 'products.id', '=', 'product_unit_of_measures.idProducto')
            ->join('unit_of_measures', 'unit_of_measures.id', '=', 'product_unit_of_measures.idUnidadMedida')
            ->get();
        return view('home', compact('user', 'productos', 'commune'));
    }

    public function showEditarPerfil($id)
    {
        $user = User::find($id);
        $region = Region::all();
        $commune = Commune::all()->where('softDelete',false);
        $numberAddress = NumberAddress::all()->where('softDelete',false);
        $streetAddress = StreetAddress::all()->where('softDelete',false);

        $rolSeleccionada = Role::find($user->idRol);
        $calleSeleccionada = StreetAddress::find($user->idCalle);
        $numeroCalleSeleccionada = NumberAddress::all()->where('idCalle', $calleSeleccionada->id)->first();
        //print($numeroCalle);
        $comunaSeleccionada = Commune::all()->where('id', $numeroCalleSeleccionada->idComuna)->first();
        $regionSeleccionada = Region::find($comunaSeleccionada->idRegion);


        return view('perfilModificar', compact('user', 'region', 'commune', 'numberAddress', 'streetAddress', 'rolSeleccionada', 'calleSeleccionada', 'numeroCalleSeleccionada', 'comunaSeleccionada', 'regionSeleccionada'));
            //return response()->json($user);
        //return view('perfil')->with('user',$user);
        //return view('perfil', compact('user'));
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($request->rutUsuario != NULL)
        $user->rutUsuario = $request->rutUsuario;
        $user->nombreUsuario = $request->nombreUsuario;
        $user->apellidoUsuario = $request->apellidoUsuario;
        $user->correoUsuario = $request->correoUsuario;
        $user->contraseniaUsuario = $request->contraseniaUsuario;
        $user->idRol = $request->idRol;
        $user->softDelete = false;
        $user->save();

        $rol = Role::find($user->idRol);
        $calle = StreetAddress::find($user->idCalle);
        $numeroCalle = NumberAddress::all()->where('idCalle', $calle->id)->first();
        $comuna = Commune::all()->where('id', $numeroCalle->idComuna)->first();
        $region = Region::find($comuna->idRegion);

        return view('perfil', compact('user', 'calle', 'numeroCalle', 'comuna', 'region','rol'));
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
            if ($user->softDelete) {
                return response()->json(["message" => "El usuario ya está eliminado."]);
            }
            $user->softDelete = True;
            $user->save();
            return response()->json(["message" => "El usuario ha sido eliminado."]);
        }
        return response()->json(["message" => "El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $user = User::find($id);
        if ($user != null) {
            if ($user->softDelete) {
                $user->softDelete = False;
                $user->save();
                return response()->json([
                    "message" => "Se ha recuperado el usuario.",
                    "id" => $user->id
                ], 202);
            }
            return response()->json(["message" => "No es posible realizar la operación debido a que el usuario no está eliminado."]);
        }
        return response()->json(["message" => "El id no existe."]);
    }

    // Show nuevo
    public function nuevoShow(Request $request)
    {
        $productos = DB::table('products')
            ->join('product_unit_of_measures', 'products.id', '=', 'product_unit_of_measures.idProducto')
            ->join('unit_of_measures', 'unit_of_measures.id', '=', 'product_unit_of_measures.idUnidadMedida')
            ->get();

        $user = User::all()->where('softDelete', false)
            ->where('correoUsuario', $request->correoUsuario)
            ->where('contraseniaUsuario', $request->contraseniaUsuario)->first();

        $commune = Commune::all()->where('softDelete',false);
        if ($user != NULL) {
            return view('home', compact('user', 'productos', 'commune'));
        }
        return redirect('iniciarSesion');
    }
}
