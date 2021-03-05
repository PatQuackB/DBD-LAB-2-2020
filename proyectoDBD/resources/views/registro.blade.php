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

            <a href="/laravel"><img src="https://www.flaticon.es/svg/vstatic/svg/1147/1147934.svg?token=exp=1614741773~hmac=482e5d0e878d1b48e873083b880d5fa5" alt="" width="30" height="20" class="d-inline-block align-top"></a>
            <a class="navbar-brand" href="/welcome">Fenlinea</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav position-absolute end-0">
                    <a class="nav-link" aria-current="page" href="/registro">Registrarse</a>
                    <a href="/registro"><img src="https://www.flaticon.es/svg/vstatic/svg/4298/4298122.svg?token=exp=1614751637~hmac=51e58cf8e57f2527819b39213274e371" alt="" width="20" height="40" class="d-inline-block align-bottom"></a>
                    <a class="nav-link" href="/iniciarSesion">Iniciar Sesión</a>
                    <a href="/iniciarSesion"><img src="https://www.flaticon.es/svg/vstatic/svg/328/328371.svg?token=exp=1614741116~hmac=ce0d37136c5d4a530f0a619d5ef3c69b" alt="" width="20" height="40" class="d-inline-block align-bottom"></a>
                    &nbsp &nbsp &nbsp
                </div>
            </div>
        </div>
    </nav>

    <h1>Registro</h1>

    <div class="container">
        <form action="{{route('userStore')}}" method="POST">
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
                <input type="radio" name="idRol" value="2"> Vendedor(a)  
                <input type="radio" name="idRol" value="1"> Comprador(a)
            </div>
            <br>
            <!--
            <div class="form-group">
                <label for="region">Region</label>
                <select name="idRegion">
                    @forelse ($region as $region)
                    <option value="{{$region->id}}">{{ $region->nombreRegion }}</option>
                    @empty
                    Sin regiones
                    @endforelse
                </select>
            </div>
            -->
            <br>
            <div class="form-group">
                <label for="region">Comuna</label>
                <select name="idComuna">
                    @forelse ($commune as $commune)
                    <option value="{{$commune->id}}">{{ $commune->nombreComuna }}</option>
                    @empty
                    Sin comunas
                    @endforelse
                </select>
            </div>
            <br>
            <!--
            <div class="form-group">
                <label for="region">Nombre calle</label>
                <select name="nombreCalle">
                    @forelse ($streetAddress as $streetAddress)
                    <option value="{{$streetAddress->nombreCalle}}">{{ $streetAddress->nombreCalle }}</option>
                    @empty
                    Sin calles
                    @endforelse
                </select>
            </div>
            -->
            <br>
            <div class="form-group">
                <label for="region">Número calle</label>
                <select name="numeroCalle">
                    @forelse ($numberAddress as $numberAddress)
                    <option value="{{$numberAddress->numeroCalle}}">{{ $numberAddress->numeroCalle }}</option>
                    @empty
                    Sin numeros
                    @endforelse
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>

</html>