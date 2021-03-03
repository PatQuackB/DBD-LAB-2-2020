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
       
            <a href="/welcome"><img src="img/cuteFoodSVG/apple.svg" alt="Logo" width="60" height="40" class="d-inline-block align-top"></a>
            <a class="navbar-brand" href="/welcome" style="font-size: 44px">Fenlinea </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav position-absolute end-0">
                <a class="nav-link" style="padding-top: 10.5%;" aria-current="page" href="/laravel">Carrito</a>
                <a href="/welcome" style="padding-right: 5%;"><img src="img/iconosMercadoSVG/005-milk carton.svg" alt="Carrito" width="35" height="70" class="d-inline-block align-bottom" ></a>

                <a class="nav-link" style="padding-top: 10.5%;" href="/user/{{$user->id}}">Perfil</a>
                <a href="/user/{{$user->id}}" style="padding-right: 5%;"><img src="img/iconosMercadoSVG/barba.svg" alt="Perfil" width="35" height="70" class="d-inline-block align-bottom"></a>
                &nbsp &nbsp &nbsp
            </div>
            </div>
        </div>
    </nav>

    <h1>Hola! {{$user->id}}</h1>




    <!-- PIE DE PAGINA -->
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
</body>
</html>