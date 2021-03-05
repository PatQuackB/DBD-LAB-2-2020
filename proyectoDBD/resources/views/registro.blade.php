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

            <a href="/welcome"><img src="../img/cuteFoodSVG/apple.svg" alt="Logo" width="60" height="40" class="d-inline-block align-top"></a>
            <a class="navbar-brand" href="/welcome">Fenlinea</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav position-absolute end-0">
                    <a class="nav-link" aria-current="page" href="/registro">Registrarse</a>
                    <a href="/registro"><img src="../img/cuteFoodSVG/bananas.svg" alt="" width="20" height="40" class="d-inline-block align-bottom"></a>
                    <a class="nav-link" href="/iniciarSesion">Iniciar Sesión</a>
                    <a href="/iniciarSesion"><img src="../img/cuteFoodSVG/orange.svg" alt="" width="20" height="40" class="d-inline-block align-bottom"></a>
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
                <input type="text" class="form-control" name="nombreUsuario" required>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputApellido">Apellidos</label>
                <input type="text" class="form-control" name="apellidoUsuario" required>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputRut">Rut (sin puntos y con guion)</label>
                <input type="text" class="form-control" name="rutUsuario" required>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputCorreo">Correo</label>
                <input type="text" class="form-control" name="correoUsuario" required>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputNombre">Contraseña</label>
                <input type="password" class="form-control" name="contraseniaUsuario" required>
            </div>
            <br>
            <div class="form-grupo">
                <label>Seleccione su rol dentro de la página: </label>
                <br>
                <input type="radio" name="idRol" value="2" required> Vendedor(a)  
                <input type="radio" name="idRol" value="1" required> Comprador(a)
            </div>
            <br>
            <div class="form-group">
                <label for="region">Region</label>
                <select name="idRegion">
                    <option selected>Selecciones una Region</option>
                    @forelse ($region as $region)
                    <option value="{{$region->id}}">{{ $region->nombreRegion }}</option>
                    @empty
                    Sin regiones
                    @endforelse
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="region">Comuna</label>
                <select name="idComuna">
                    <option selected>Selecciones una Comuna</option>
                    @forelse ($commune as $commune)
                    <option value="{{$commune->id}}">{{ $commune->nombreComuna }}</option>
                    @empty
                    Sin comunas
                    @endforelse
                </select>
            </div>
            <br>

            <div class="form-group">
                <label for="region">Nombre calle</label>
                <select name="idNombreCalle">
                    <option selected>Selecciones una Calle</option>
                    @forelse ($streetAddress as $streetAddress)
                    <option value="{{$streetAddress->id}}">{{ $streetAddress->nombreCalle }}</option>
                    @empty
                    Sin calles
                    @endforelse
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="region">Número calle</label>
                <select name="idNumeroCalle">
                    <option selected>Selecciones N° Calle</option> 
                    @forelse ($numberAddress as $numberAddress)
                    <option value="{{$numberAddress->id}}">{{ $numberAddress->numeroCalle }}</option>
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