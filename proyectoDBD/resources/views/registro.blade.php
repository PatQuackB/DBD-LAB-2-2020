<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estructuraGenericaStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
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

                <a class="nav-link" style="padding-top: 10.5%;" href="/laravel">Perfil</a>
                <a href="/welcome" style="padding-right: 5%;"><img src="img/iconosMercadoSVG/barba.svg" alt="Perfil" width="35" height="70" class="d-inline-block align-bottom"></a>
                &nbsp &nbsp &nbsp
            </div>
            </div>
        </div>
    </nav>

    <h1>Registro</h1>

    <div class="container">
        <form action="{{route('UserStore')}}" method="POST">
            <div class="form-group">
                <label for="exampleInputNombre">Nombres</label>
                <input type="text" class="form-control" name="nombreUsuario" placeholder="Elsa">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputApellido">Apellidos</label>
                <input type="text" class="form-control" name="apellidoUsuario" placeholder="Polindo">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputRut">Rut</label>
                <input type="text" class="form-control" name="rutUsuario" placeholder="69469469-4">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputCorreo">Correo</label>
                <input type="text" class="form-control" name="correoUsuario" placeholder="elsa.polindo@gmail.com">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputNombre">Contraseña</label>
                <input type="password" class="form-control" name="contraseniaUsuario" placeholder="Htf32TKo8">
            </div>
            <br>
            <!--
            <select class="form-select" aria-label="Default select example">
                <option selected>Region</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <br>
            <select class="form-select " aria-label="Default select example">
                <option selected>Comuna</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <br>
            <select class="form-select" aria-label="Default select example">
                <option selected>Rol</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <br>
            -->
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>
</html>