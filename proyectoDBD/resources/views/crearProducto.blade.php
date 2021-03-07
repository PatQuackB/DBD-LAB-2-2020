<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Producto</title>
  <link href="../css/estructuraStyle.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
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

  <h1>Crear Producto</h1>

  <div class="container">
    <form class="row g-3 needs-validation" action="{{route('crearNuevoProducto', $user->id)}}" method="POST">
      <div class="form-group">
        <label for="exampleInputNombre">Nombre</label>
        <input type="text" pattern=".{1,50}" class="form-control" name="nombreProducto" required placeholder="Ingrese nombre del producto. (Max 50 caracteres)">
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputStock">Stock</label>
        <input type="number" class="form-control" name="stockProducto" required placeholder="Ingrese el stock del producto">
      </div>
      <br>
      <div class="col-md-7">
        <label for="exampleInputApellido">Precio Producto</label>
        <input type="number" class="form-control" name="precioProducto" required placeholder="Ingrese el precio del producto.">
      </div>
      <br>
      <div class="col-md-5">
        <label for="validationCustom04">Unidad de medida</label>
        <select class="form-select" name="idUnidadMedida" required>
          <option selected disabled value="">Seleccione una unidad de medida</option>
          @forelse ($unidadMedida as $unidadMedida)
          <option value="{{$unidadMedida->id}}">{{ $unidadMedida->nombreUnidadMedida }}</option>
          @empty
          <option disabled value="">No hay unidades de medida disponibles</option>
          @endforelse
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="validationCustom04">Nombre Puesto</label>
        <select class="form-select" name="idPuesto" required>
          <option selected disabled value="">Seleccione un puesto</option>
          @forelse ($stalls as $puesto)
          <option value="{{$puesto->idStall}}">{{ $puesto->nombrePuesto }}</option>
          @empty
          <option disabled value="">No hay puestos creados.</option>
          @endforelse
        </select>
      </div>
      <div class="col-12">
        <button type="submit" id="boton" class="btn btn-primary">Crear Producto</button>
      </div>

      @if($productoCreado == true)
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Producto creado con exito.
      </div>
      @else
      @endif

    </form>


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

<script>
  var myInput = document.getElementById("psw");
  var letter = document.getElementById("letter");
  var capital = document.getElementById("capital");
  var number = document.getElementById("number");
  var length = document.getElementById("length");

  // When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }

  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }

  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }

  function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    // Despejar Guión
    valor = valor.replace('-', '');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-' + dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
      rut.setCustomValidity("RUT Incompleto");
      return false;
    }

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {

      // Obtener su Producto con el Múltiplo Correspondiente
      index = multiplo * valor.charAt(cuerpo.length - i);

      // Sumar al Contador General
      suma = suma + index;

      // Consolidar Múltiplo dentro del rango [2,7]
      if (multiplo < 7) {
        multiplo = multiplo + 1;
      } else {
        multiplo = 2;
      }

    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
      rut.setCustomValidity("RUT Inválido");
      return false;
    }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
  }
</script>

<style>
  /* The message box is shown when the user clicks on the password field */
  #message {
    display: none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
  }

  #message p {
    padding: 10px 35px;
    font-size: 18px;
  }

  /* Add a green text color and a checkmark when the requirements are right */
  .valid {
    color: green;
  }

  .valid:before {
    position: relative;
    left: -35px;
    content: "\2713";
  }

  /* Add a red text color and an "x" icon when the requirements are wrong */
  .invalid {
    color: red;
  }

  .invalid:before {
    position: relative;
    left: -35px;
    content: "\2717";
  }

  /* The alert message box */
  .alert {
    padding: 20px;
    background-color: #f44336;
    /* Red */
    color: white;
    margin-bottom: 15px;
  }

  /* The close button */
  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  /* When moving the mouse over the close button */
  .closebtn:hover {
    color: black;
  }
</style>