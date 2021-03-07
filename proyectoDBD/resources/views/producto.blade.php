<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producto</title>

  <link href="../css/estructuraStyle.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <!-- Head DE PAGINA -->
  <nav class="nav navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a href="/homeBack/{{$user->id}}"><img src="../img/cuteFoodSVG/apple.svg" alt="Logo" width="60" height="40" class="d-inline-block align-top"></a>
      <a class="navbar-brand" href="/homeBack/{{$user->id}}">Fenlinea </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav position-absolute end-0">
          @if($user->idRol == 2)
          <a class="nav-link" id="botonSuperior" aria-current="page" href="{{route('crearProducto', $user->id)}}">Crear producto</a>
          <a href="{{route('crearProducto', $user->id)}}"><img src="../img/iconosMercadoSVG/crearProducto.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom"></a>

          <a class="nav-link" id="botonSuperior" aria-current="page" href="{{route('irPuesto', $user->id)}}">Mi Puesto</a>
          <a href="{{route('irPuesto', $user->id)}}"><img src="../img/iconosMercadoSVG/miPuesto.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom"></a>
          @else
          @endif
          <a class="nav-link" id="botonSuperior" aria-current="page" href="/carrito/{{$user->id}}">Carrito</a>
          <a href="/carrito/{{$user->id}}"><img src="../img/iconosMercadoSVG/carrito.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom"></a>

          <a class="nav-link" id="botonSuperior" href="/perfilShow/{{$user->id}}">Perfil</a>
          <a href="/perfilShow/{{$user->id}}"><img src="../img/iconosMercadoSVG/barba.svg" alt="Perfil" width="35" height="70" class="d-inline-block align-bottom"></a>

          <a class="nav-link" id="botonSuperior" href="/welcome">Cerrar sesión</a>
          <a href="/welcome"><img src="../img/iconosMercadoSVG/037-dust.svg" alt="logout" width="35" height="70" class="d-inline-block align-bottom"></a>

          &nbsp &nbsp &nbsp
        </div>
      </div>
    </div>
  </nav>

  <h1>Producto</h1>

  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $product->nombreProducto }}</h5>
      <p class="card-text"></p>
      <p>Precio: {{ $product->precioProducto }} / {{ $product->nombreUnidadMedida }}</p>
      <p>Stock: {{ $product->stockProducto }}</p>
      <hr color="blue" size=3>
      @forelse($feriantes as $feriantes)
      <p></p>
      <h6>Nombre Puesto:</h6> {{$feriantes->nombrePuesto}}</p>
      <p>
      <h6>Nombre Feriante:</h6> {{ $feriantes->nombreUsuario }}</p>
      <form action="{{route('agregarAlCarrito', $user->id)}}" method="POST">
        <label for="cantidad">Cantidad:</label>
        <input type="number" pattern=".{1,2}" id="cantidad" name="cantidadProducto" min="1" max="99" placeholder="--" required>
        <input type="hidden" id="idProducto" name="idProducto" value="{{$product->id}}">
        <br>
        <button type="submit" id="boton" class="btn btn-primary">Agregar al carrito</button>
      </form>
      <hr color="blue" size=3>
      @empty
      <p>Sin feriantes</p>
      @endforelse
    </div>
  </div>








  <!--Pie de página-->
  <footer>
    <div class="pie">
      <div class="col-sm-7" id="info" style="width: 50%;">
        <h3 id="titulosPie">Mas información de la empresa</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>

      <div class="col-sm-2" style="width: 20%;">
        <h3 id="titulosPie">Redes sociales</h3>
        <div class="rowFooter">
          <a href=""><img src="../img/rrss/facebook.png"></a>
          <label>Síguenos en Facebook</label>
        </div>
        <div class="rowFooter">
          <a href=""><img src="../img/rrss/twitter.png"></a>
          <label>Síguenos en Twitter</label>
        </div>
        <div class="rowFooter">
          <a href=""><img src="../img/rrss/instagram.png"></a>
          <label>Síguenos en Instagram</label>
        </div>

      </div>

      <div class="col-sm-3" style="width: 30%;">
        <h3 id="titulosPie">Contáctanos</h3>
        <div class="rowFooter">
          <img src="../img/rrss/house.png">
          <label>Calle 1234,
            Comuna
            Ciudad
          </label>
        </div>

        <div class="rowFooter">
          <img src="../img/rrss/smartphone.png">
          <label>+56 9 1234 5678</label>
        </div>

        <div class="rowFooter">
          <img src="../img/rrss/contact.png">
          <label>correo.electronico@mail.com</label>
        </div>
      </div>
    </div>

    <div class="copy-right">
      <div class="copyright">
        © 2020 Todos los derechos reservados | <a href="" style="text-decoration: none;">PAGINA</a>
      </div>
      <div class="politicas">
        <a href="" style="text-decoration: none;">EMPRESA</a> |
        <a href="" style="text-decoration: none;">Privación y Política</a> |
        <a href="" style="text-decoration: none;">Términos y Condiciones</a>
      </div>
    </div>
  </footer>
</body>

</html>