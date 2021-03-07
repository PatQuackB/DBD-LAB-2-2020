<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo de Pago</title>

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


    <h1>Método Pago</h1>
    <br>




    <div class="container">
        <form action="{{route('crearMetodoPago', $user->id)}}" method="POST">

            <div class="form-group" class="required">
                <label for="region">Tipo Tarjeta</label>
                <select name="tipoTarjeta" class="form-select" id="validationDefault04" required>
                    <option selected disabled value="">Selecciones un tipo de tarjeta</option>
                    <option value=1>Tarjeta Débito</option>
                    <option value=2>Tarjeta Crédito</option>
                </select>
            </div>
            <br>

            <div class="form-group" class="required">
                <label for="region">Nombre banco</label>
                <select name="nombreBanco" class="form-select" id="validationDefault04" required>
                    <option selected disabled value="">Selecciones su banco</option>
                    <option value="Banco Estado">Banco Estado</option>
                    <option value="Prepago TENPO">Prepago TENPO</option>
                    <option value="Prepago LOS HEROES">Prepago LOS HEROES</option>
                    <option value="COOPEUCH">COOPEUCH</option>
                    <option value="Banco BBVA">Banco BBVA</option>
                    <option value="Banco Consorcio">Banco Consorcio</option>
                    <option value="Banco Ripley">Banco Ripley</option>
                    <option value="Banco Falabella">Banco Falabella</option>
                    <option value="Banco Security">Banco Security</option>
                    <option value="The Bank of Tokyo-Mitsubishi">The Bank of Tokyo-Mitsubishi</option>
                    <option value="Banco Itau Chile">Banco Itau Chile</option>
                    <option value="Banco Santander Chile">Banco Santander Chile</option>
                    <option value="HSBC Bank (Chile)">HSBC Bank (Chile)</option>
                    <option value="Banco Bice">Banco Bice</option>
                    <option value="CORPBANCA">CORPBANCA</option>
                    <option value="Banco de Credito e Inversiones">Banco de Credito e Inversiones</option>
                    <option value="Scotiabank">Scotiabank</option>
                    <option value="Banco Internacional">Banco Internacional</option>
                    <option value="Banco de Chile-Edwards">Banco de Chile-Edwards</option>
                </select>
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputUltimosNumerosTarjeta">Numero Tarjeta (solo numeros; sin espacios)</label>
                <input type="text" pattern=".{16,16}" class="form-control" name="ultimosNumerosTarjeta" required placeholder="1111 2222 3333 4444">
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputMesVencimiento">Mes vencimiento</label>
                <input type="number" pattern=".{1,2}" id="mes" name="mesVencimiento" min="1" max="12" placeholder="--" required>
            </div>
            <br>

            <div class="form-group">
                <label for="exampleInputAnioVencimiento">Año vencimiento</label>
                <input type="number" pattern=".{2,2}" id="mes" name="anioVencimiento" min="21" max="25" placeholder="--" required>
            </div>
            <br>

            <button type="submit" id="boton" class="btn btn-primary">Pagar</button>
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