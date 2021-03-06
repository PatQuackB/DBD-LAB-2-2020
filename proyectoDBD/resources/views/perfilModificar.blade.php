<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>

  <link rel="stylesheet" href="../css/estructuraGenericaStyle.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a href="/homeBack/{{$user->id}}"><img src="../img/cuteFoodSVG/apple.svg" alt="Logo" width="60" height="40" class="d-inline-block align-top"></a>
      <a class="navbar-brand" href="/homeBack/{{$user->id}}" style="font-size: 44px">Fenlinea </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav position-absolute end-0">
          @if($user->idRol == 2)
          <a class="nav-link" style="padding-top: 10.5%;" aria-current="page" href="">Crear producto</a>
          <a href="" style="padding-right: 5%;"><img src="../img/iconosMercadoSVG/crearProducto.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom"></a>
          @else
          @endif
          <a class="nav-link" style="padding-top: 10.5%;" aria-current="page" href="/laravel">Carrito</a>
          <a href="/welcome" style="padding-right: 5%;"><img src="../img/iconosMercadoSVG/carrito.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom"></a>

          <a class="nav-link" style="padding-top: 10.5%;" href="/perfilShow/{{$user->id}}">Perfil</a>
          <a href="/perfilShow/{{$user->id}}" style="padding-right: 5%;"><img src="../img/iconosMercadoSVG/barba.svg" alt="Perfil" width="35" height="70" class="d-inline-block align-bottom"></a>

          <a class="nav-link" style="padding-top: 10.5%;" href="/welcome">Cerrar sesión</a>
          <a href="/welcome" style="padding-right: 5%;"><img src="../img/iconosMercadoSVG/037-dust.svg" alt="logout" width="35" height="70" class="d-inline-block align-bottom"></a>

          &nbsp &nbsp &nbsp
        </div>
      </div>
    </div>
  </nav>

  <h1>Modificar Perfil</h1>

  <div class="container">
    <form action="{{route('userUpdate', $user->id)}}" method="POST">
      @method('PUT')

      <div class="form-group">
        <label for="exampleInputNombre">Nombres</label>
        <input type="text" pattern=".{1,25}" class="form-control" name="nombreUsuario" placeholder="{{ $user->nombreUsuario }}" required>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputApellido">Apellidos</label>
        <input type="text" pattern=".{1,25}" class="form-control" name="apellidoUsuario" placeholder="{{ $user->apellidoUsuario }}" required>
      </div>
      <br>
      <div class="form-group">
        <label for="txt_rut">Rut (sin puntos y con guion)</label>
        <input type="text" class="form-control" id="txt_rut" onkeyup="checkRut(this)" name="rutUsuario" placeholder="{{ $user->rutUsuario }}" required>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputCorreo">Correo</label>
        <input type="email" class="form-control" name="correoUsuario" placeholder="{{ $user->correoUsuario }}" required>
      </div>
      <br>
      <div class="form-group">
        <label for="psw">Contraseña</label>
        <input type="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" name="contraseniaUsuario" placeholder="********" required>
      </div>
      <div id="message">
                <h5>La contraseña debe contener al menos:</h5>
                <p id="letter" class="invalid">Una <b>letra</b> minuscula</p>
                <p id="capital" class="invalid">Una <b>letra</b> mayuscula</p>
                <p id="number" class="invalid">Un <b>numero</b></p>
                <p id="length" class="invalid">Minimo <b>8 caracteres</b></p>
      </div>      
      <br>

      <div class="form-grupo">
        <label>Seleccione su rol dentro de la página: </label>
        <br>
        @if($rolSeleccionada == "2")
        <input type="radio" name="idRol" value="2" required checked="checked"> Vendedor(a)
        <input type="radio" name="idRol" value="1" required> Comprador(a)
        @else
        <input type="radio" name="idRol" value="2" required> Vendedor(a)
        <input type="radio" name="idRol" value="1" required checked="checked"> Comprador(a)
        @endif
      </div>
      <br>
      <div class="form-group"  class="required">
        <label for="region">Region</label>
        <select name="idRegion"  class="form-select" id="validationDefault04" required>
          <option disabled value="">Seleccione una Comuna</option>
          @forelse ($region as $region)
            @if($regionSeleccionada->id == $region->id)
              <option value="{{$region->id}}" selected>{{ $region->nombreRegion }}</option>
            @else
              <option value="{{$region->id}}">{{ $region->nombreRegion }}</option>
            @endif
          @empty
          Sin regiones
          @endforelse
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="region">Comuna</label>
        <select name="idComuna" class="form-select" id="validationDefault04" required>
          <option disabled value="">Seleccione una Comuna</option>
          @forelse ($commune as $commune)
            @if($comunaSeleccionada->id == $commune->id)
              <option value="{{$commune->id}}" selected>{{ $commune->nombreComuna }}</option>
            @else
              <option value="{{$commune->id}}">{{ $commune->nombreComuna }}</option>
            @endif
          @empty
          Sin comunas
          @endforelse
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="region">Nombre calle</label>
        <select name="idNombreCalle" class="form-select" id="validationDefault04" required>
          <option disabled value="">Seleccione una Calle</option>
          @forelse ($streetAddress as $streetAddress)
            @if($calleSeleccionada->id == $streetAddress->id)
              <option value="{{$streetAddress->id}}" selected>{{ $streetAddress->nombreCalle }}</option>
            @else
              <option value="{{$streetAddress->id}}">{{ $streetAddress->nombreCalle }}</option>
            @endif
          @empty
          Sin calles
          @endforelse
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="region">Número calle</label>
        <select name="idNumeroCalle" class="form-select" id="validationDefault04" required>
          <option disabled value="">Seleccione N° Calle</option> 
          @forelse ($numberAddress as $numberAddress)
            @if($numeroCalleSeleccionada->id == $numberAddress->id)
              <option value="{{$numberAddress->id}}" selected>{{ $numberAddress->numeroCalle }}</option>
            @else
              <option value="{{$numberAddress->id}}">{{ $numberAddress->numeroCalle }}</option>
            @endif
          @empty
          Sin numeros
          @endforelse
        </select>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Modificar Datos</button>
    </form>
  </div>




  <!-- PIE DE PAGINA -->
  <footer>
    <div class="pie">
      <div class="col-sm-7" id="info" style="width: 50%;">
        <h3>Mas información de la empresa</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>

      <div class="col-sm-2" style="width: 20%;">
        <h3>Redes sociales</h3>
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
        <h3>Contáctanos</h3>
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
        © 2020 Todos los derechos reservados | <a href="">PAGINA</a>
      </div>
      <div class="politicas">
        <a href="">EMPRESA</a> |
        <a href="">Privación y Política</a> |
        <a href="">Términos y Condiciones</a>
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
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}

</script>

<style>

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
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

</style>

