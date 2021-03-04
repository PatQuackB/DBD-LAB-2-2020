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
                <input type="radio" name="idRol" value="2">Vendedor
                <input type="radio" name="idRol" value="1">Comprador
            </div>
            <!--
            <div class="form-group">
            
                <label for="region">Region</label>
                <select name="idRegion">
                    @forelse ($region as $region)
                            <option value="{{$region->id}}">{{ $region->nombreRegion }}</option>
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
            -->
            <br>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>

</html>