<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

    <link rel="stylesheet" href="css/estructuraGenericaStyle.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/home/$id"><img src="img/cuteFoodSVG/apple.svg" alt="Logo" width="60" height="40" class="d-inline-block align-top"></a>
            <a class="navbar-brand" href="/home/$id" style="font-size: 44px">Fenlinea </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav position-absolute end-0">
                <a class="nav-link" style="padding-top: 10.5%;" aria-current="page" href="/laravel">Carrito</a>
                <a href="/welcome" style="padding-right: 5%;"><img src="img/iconosMercadoSVG/005-milk carton.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom" ></a>

                <a class="nav-link" style="padding-top: 10.5%;" href="">Perfil</a>
                <a href="" style="padding-right: 5%;"><img src="img/iconosMercadoSVG/barba.svg" alt="Perfil" width="35" height="70" class="d-inline-block align-bottom"></a>
                &nbsp &nbsp &nbsp
            </div>
            </div>
        </div>
    </nav>

    <h1>Modificar Perfil</h1>
    <!--
    <div class="container">
        <form action="{{route('users.update', $user->id)}}" method="PUT">
            @method('PUT')
            
            <div class="form-group">
                <label for="exampleInputNombre">Nombres</label>
                <input type="text" class="form-control" name="nombreUsuario">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputApellido">Apellidos</label>
                <input type="text" class="form-control" name="apellidoUsuario">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputRut">Rut (sin puntos y con guion)</label>
                <input type="text" class="form-control" name="rutUsuario">
            </div>
            <br>
            
            <div class="form-group">
                <label for="region">Region</label>
                <select name="region">
                    @forelse ($regions as $regions)
                        <option value="{{ $regions->nombreRegion }}">{{ $regions->nombreRegion }}</option>

                    @empty
                      Sin regiones
                    @endforelse
                    <option value="I Region de Tarapaca">I Region de Tarapaca</option>
                    <option value="II Region de Antofagasta">II Region de Antofagasta</option>
                    <option value="III Region de Atacama">III Region de Atacama</option>
                    <option value="IV Region de Coquimbo">IV Region de Coquimbo</option>
                    <option value="V Region de Valparaiso">V Region de Valparaiso</option>
                    <option value="VI Region del Libertador General Bernardo OHiggins">VI Region del Libertador General Bernardo OHiggins</option>
                    <option value="VII Region del Maule">VII Region del Maule</option>
                    <option value="VIII Region del Biobio">VIII Region del Biobio</option>
                    <option value="IX Region de La Araucania">IX Region de La Araucania</option>
                    <option value="X Region de Los Lagos">X Region de Los Lagos</option>
                    <option value="XI Region Aysen del General Carlos Ibañez del Campo">XI Region Aysen del General Carlos Ibañez del Campo</option>
                    <option value="XII Region de Magallanes y Antartica Chilena">XII Region de Magallanes y Antartica Chilena</option>
                    <option value="XIII Region Metropolitana de Santiago">XIII Region Metropolitana de Santiago</option>
                    <option value="XIV Region de Los Rios">XIV Region de Los Rios</option>
                    <option value="XV Region de Arica y Parinacota">XV Region de Arica y Parinacota</option>
                    <option value="XVI Region de Ñuble">XVI Region de Ñuble</option>
                </select>
            </div>
            <br>
            
            <div class="form-group">
                <label for="exampleInputNombre">Comuna</label>
                <input type="text" class="form-control" name="nombreComuna">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputNombre">Nombre calle</label>
                <input type="text" class="form-control" name="nombreCalle">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputNombre">Número calle</label>
                <input type="text" class="form-control" name="numeroCalle">
            </div>
            
            <div class="form-group">
                <label for="exampleInputCorreo">Correo</label>
                <input type="text" class="form-control" name="correoUsuario">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputNombre">Contraseña</label>
                <input type="password" class="form-control" name="contraseniaUsuario">
            </div>
            <br>
    
            <div class="form-grupo">
                <label>Seleccione su rol dentro de la página: </label>
                <br>
                <label for="Vendedor">
                    <input type="radio" name="nombreRol" value="2">
                    Vendedor
                </label>
                <label for="Comprador">
                    <input type="radio" name="nombreRol" value="1">
                    Comprador
                </label>
            </div>
            

            <br>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
  -->



    <!-- PIE DE PAGINA -->
    <!--
    <footer>
          <div class= "pie">
            <div class ="col-sm-7" id="info" style="width: 50%;">
              <h3>Mas información de la empresa</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>

            <div class ="col-sm-2" style="width: 20%;">
                <h3>Redes sociales</h3>
                <div class="rowFooter">
                    <a href=""><img src="img/rrss/facebook.png"></a>
                    <label>Síguenos en Facebook</label>
                </div>
                <div class="rowFooter">
                  <a href=""><img src="img/rrss/twitter.png"></a>
                    <label>Síguenos en Twitter</label>
                </div>
                <div class="rowFooter">
                  <a href=""><img src="img/rrss/instagram.png"></a>
                    <label>Síguenos en Instagram</label>
                </div>
            
            </div>

            <div class ="col-sm-3" style="width: 30%;">
                <h3>Contáctanos</h3>
                <div class="rowFooter">
                  <img src="img/rrss/house.png">
                  <label>Calle 1234,
                    Comuna
                    Ciudad
                  </label>
                </div>

                <div class="rowFooter">
                  <img src="img/rrss/smartphone.png">
                  <label>+56 9 1234 5678</label>
                </div>

                <div class="rowFooter">
                  <img src="img/rrss/contact.png">
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
        -->
</body>
</html>