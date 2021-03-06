<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStall;
use App\Models\User;
use App\Models\Region;
use App\Models\Commune;
use App\Models\StreetAddress;
use App\Models\NumberAddress;
use App\Models\UnitOfMeasure;
use App\Models\ProductUnitOfMeasure;
use App\Models\Role;

class ProductController extends Controller
{
    //Obtener todos los datos de la tabla (get)
    public function index()
    {
        $product = Product::all();

        return redirect('home');
    }

    public function irCrearProducto($id)
    {
        $user = User::find($id);
        $unidadMedida = UnitOfMeasure::all();
        $productoCreado = false;

        $stalls = DB::table('users')
            ->join('user_stalls', 'users.id', '=', 'user_stalls.idUsuario')
            ->join('stalls', 'stalls.id', '=', 'user_stalls.idPuesto')
            ->select('stalls.id as idStall', 'users.id as idUser', 'stalls.nombrePuesto', 'stalls.idCalle')
            ->get()
            ->where('idUser', $user->id);


        return view('crearProducto', compact('user', 'productoCreado', 'unidadMedida', 'stalls'));
    }    


    //Crear una nueva tupla (post)
    public function store2(Request $request, $id)
    {
        $user = User::find($id);
        $product = new Product();
        $unidadMedida = UnitOfMeasure::all();
        $product->nombreProducto = $request->nombreProducto;
        $product->precioProducto = $request->precioProducto;
        $product->stockProducto = $request->stockProducto;
        $product->softDelete = False;
        $product->save();
        $stalls = DB::table('users')
            ->join('user_stalls', 'users.id', '=', 'user_stalls.idUsuario')
            ->join('stalls', 'stalls.id', '=', 'user_stalls.idPuesto')
            ->select('stalls.id as idStall', 'users.id as idUser', 'stalls.nombrePuesto', 'stalls.idCalle')
            ->get()
            ->where('idUser', $user->id);

        $productoUnidadMedida = new ProductUnitOfMeasure();
        $productoUnidadMedida->idUnidadMedida = $request->idUnidadMedida;
        $productoUnidadMedida->idProducto = $product->id;
        $productoUnidadMedida->save();
        
        $puestoProducto = new ProductStall();
        $puestoProducto->idPuesto = $request->idPuesto;
        $puestoProducto->idProducto = $product->id;
        $puestoProducto->save();
        
        $productoCreado = true; 
        return view('crearProducto', compact('user', 'productoCreado', 'stalls', 'unidadMedida'));

    }   

    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
        if ($request->nombreProducto != null) {
            // si atributo no es nulo
            if (is_string($request->nombreProducto)) {
                // si es string
                if ($request->precioProducto != null) {
                    if (is_integer($request->precioProducto)) {
                        if ($request->stockProducto != null) {
                            if (is_integer($request->stockProducto)) {
                                $product = new Product();
                                $product->nombreProducto = $request->nombreProducto;
                                $product->precioProducto = $request->precioProducto;
                                $product->stockProducto = $request->stockProducto;
                                $product->softDelete = False;
                                $product->save();
                                return response()->json([
                                    "message" => "Se ha creado un producto.",
                                    "id" => $product->id
                                ], 202);
                            }
                            return response()->json(["message" => "Stock producto debe ser número."]);
                        }
                        return response()->json(["message" => "Stock producto es obligatorio."]);
                    }
                    return response()->json(["message" => "Precio producto debe ser número."]);
                }
                return response()->json(["message" => "Precio producto es obligatorio."]);
            }
            return response()->json(["message" => "Nombre producto debe ser string."]);
        }
        return response()->json(["message" => "Nombre producto es obligatorio."]);
    }

    //Obtener una tupla especifica de una tabla por id (get)
    public function show($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            return response()->json($product);
        }
        return response()->json(["message" => "El id no existe"]);
    }

    // Show 2
    public function show2($id)
    {
        $user = User::find($id);
        $rol = Role::find($user->idRol);
        //$product = Product::find($id);

    
        $feriantes = DB::table('product_stalls')
        ->where('product_stalls.idProducto', $id)
        ->join('stalls', 'stalls.id', '=', 'product_stalls.idPuesto')
        ->join('user_stalls', 'stalls.id', '=', 'user_stalls.idPuesto')
        ->join('users', 'users.id', '=', 'user_stalls.idUsuario')
        //->join()
        ->get();

        $product = Product::find($id);
        if ($product != null) {
            return view('producto', compact('product', 'user', 'rol', 'feriantes'));
        }
        return view('producto', compact('product', 'user', 'rol', 'feriantes'));
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product != null) {
            // Si no es nulo
            // atributo
            if ($request->nombreProducto != null) {
                // si atributo no es nulo
                if (is_string($request->nombreProducto)) {
                    // si es string
                    $product->nombreProducto = $request->nombreProducto;
                } else {
                    // si no es string
                    return response()->json(["message" => "Nombre producto debe ser string."]);
                }
            }
            if ($request->precioProducto != null) {
                if (is_integer($request->precioProducto)) {
                    $product->precioProducto = $request->precioProducto;
                } else {
                    return response()->json(["message" => "Precio producto debe ser número."]);
                }
            }
            if ($request->stockProducto != null) {
                if (is_integer($request->stockProducto)) {
                    $product->stockProducto = $request->stockProducto;
                } else {
                    return response()->json(["message" => "Stock producto debe ser número."]);
                }
            }
            $product->save();
            return response()->json($product);
        }
        return response()->json(["message" => "El id no existe."]);
    }

    //Borrar una tupla específica (delete)
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            if ($product->softDelete) {
                return response()->json(["message" => "El producto ya está eliminado."]);
            }
            $product->softDelete = True;
            $product->save();
            return response()->json(["message" => "El producto ha sido eliminado."]);
        }
        return response()->json(["message" => "El id no existe."]);
    }

    //Vuelve a false el atributo softDelete en una tupla específica 
    public function restore($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            if ($product->softDelete) {
                $product->softDelete = False;
                $product->save();
                return response()->json([
                    "message" => "Se ha recuperado el producto.",
                    "id" => $product->id
                ], 202);
            }
            return response()->json(["message" => "No es posible realizar la operación debido a que el producto no está eliminado."]);
        }
        return response()->json(["message" => "El id no existe."]);
    }

    // Controlador carrito
    public function eliminarSession()
    {
        session()->flush();
        return view('/welcome');
    }

    // Controlador carrito
    public function agregarAlCarrito($id)
    {
        $product = Product::find($id);

        $carrito = session()->get('carrito');

        // si el carrito es nulo, este es el primer producto
        if ($carrito == "vacio") {
            session()->forget('carrito');
            $carrito =
                [
                    $id =>
                    [
                        "nombre" => $product->nombreProducto,
                        "cantidad" => 1,
                        "precio" => $product->precioProducto,
                        "total" => $product->precioProducto
                    ]
                ];

            session()->put('carrito', $carrito);

            return redirect()->back()->with('success', 'Producto agregado al carrito.');
        }

        // si el producto no es nulo, y el producto esta, le agrega 1
        if (isset($carrito[$id])) {

            $carrito[$id]['cantidad']++;
            $carrito[$id]['total'] = $carrito[$id]['total'] + $product->precioProducto;

            session()->put('carrito', $carrito);

            return redirect()->back()->with('success', 'Producto incrementado en una unidad.');
        }

        // si el objeto no esta en el carrito, lo agrega con cantidad 1
        $carrito[$id] =
            [
                "nombre" => $product->nombreProducto,
                "cantidad" => 1,
                "precio" => $product->precioProducto,
                "total" => $product->precioProducto
            ];

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    // Ir al carrito
    public function carrito($id)
    {
        $user = User::find($id);
        session()->put('carrito', "Vacio");
        $carrito = session()->get('carrito');
        if(NULL == $carrito){
            return response()->json(["message" => "El carrito es nulo."]);
        }
        $valorTotal = 0;
        return view('carrito', compact('carrito', 'user', 'valorTotal'));
    }
}
