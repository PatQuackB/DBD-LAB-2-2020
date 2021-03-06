<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>

  <link rel="stylesheet" href="css/estructuraGenericaStyle.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>


<body class="container-fluid">

  <h1>Carrito de Compras</h1>
  <br>

  <h2> Productos Seleccionados </h2>
  <br>
  @forelse($carrito as $producto)
  $valorTotal = $valorTotal + $producto['total'];
  <div class="card">
    <div class="card-header">
      <h3>{{$producto['nombre']}}</h3>
    </div>
    <div class="card-body">
      <p>Precio: ${{$producto['precio']}}</p>
      <p>Cantidad: {{$producto['cantidad']}}</p>
      <p>Total del producto: ${{$producto['total']}}</p>
    </div>
  </div>
  <br>
  @empty
  <p>Sin productos</p>
  @endforelse

  <div class="card">
    <div class="card-header">
        <h3>Total de la compra: ${{$valorTotal}}</h3>
    </div>
  </div>
</body>

</html>