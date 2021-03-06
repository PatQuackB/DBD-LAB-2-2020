<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

class CommuneController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $commune = Commune::all();
        //$commune = Commune::all()->where($commune->softDelete,false);
        return response()->json($commune);
    }

    public function filtrarPorComuna(Request $request, $id)
    {
        $user = User::find($id);
        $commune = Commune::all()->where('softDelete',false);
        $productos = DB::table('number_addresses')
            ->where('number_addresses.idComuna', $request->idComuna)
            ->join('street_addresses', 'street_addresses.id', '=', 'number_addresses.idCalle')
            ->join('stalls', 'stalls.idCalle', '=', 'street_addresses.id')
            ->join('product_stalls', 'stalls.id', '=', 'product_stalls.idPuesto')
            ->join('products', 'products.id', '=', 'product_stalls.idProducto')
            ->join('product_unit_of_measures', 'products.id', '=', 'product_unit_of_measures.idProducto')
            ->join('unit_of_measures', 'unit_of_measures.id', '=', 'product_unit_of_measures.idUnidadMedida')
            ->get();
            //print_r($productos);
            
        return  view('home', compact('user', 'productos', 'commune'));
    }


    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if ($request->nombreComuna != null) {
            if (is_string($request->nombreComuna)) {
                // Si es string
                $commune = new Commune();
                $commune->nombreComuna = $request->nombreComuna;
                $commune->softDelete = False;
                $commune->save();
                return response()->json([
                    "message" => "Se ha creado una comuna",
                    "id" => $commune->id
                ], 202);
            } else {
                // Si no es string
                return response()->json(["message" => "NombreComuna debe ser un string."]);
            }
        }
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $commune = Commune::find($id);
        if ($commune != null) {
            if ($commune->softDelete != True) return response()->json($commune);
            return response()->json(["message" => "La comuna está eliminada."]);
        }
        return response()->json(["message" => "El id no existe"]);
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $commune = Commune::find($id);
        if ($commune != null) {
            // Si id no es nulo
            if ($request->nombreComuna != null) {
                // Si request no es nulo
                if (is_string($request->nombreComuna)) {
                    // Si request es string
                    $commune->nombreComuna = $request->nombreComuna;
                    $commune->save();
                    return response()->json($commune);
                } else {
                    // Si no es string
                    return response()->json(["message" => "NombreComuna debe ser un string."]);
                }
            } else {
                // Si es nulo
                return response()->json($commune);
            }
        }
        return response()->json(["message" => "El id no existe"]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $commune = Commune::find($id);
        if ($commune != null) {
            if ($commune->softDelete) {
                return response()->json(["message" => "La comuna ya está eliminada."]);
            }
            $commune->softDelete = True;
            $commune->save();
            return response()->json(["message" => "La comuna ha sido eliminada."]);
        }
        return response()->json(["message" => "El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $commune = Commune::find($id);
        if ($commune != null) {
            if ($commune->softDelete) {
                $commune->softDelete = False;
                $commune->save();
                return response()->json([
                    "message" => "Se ha recuperado la categoria",
                    "id" => $commune->id
                ], 202);
            }
            return response()->json(["message" => "No es posible realizar la operación debido a que la comuna no está eliminada."]);
        }
        return response()->json(["message" => "El id no existe."]);
    }
}
