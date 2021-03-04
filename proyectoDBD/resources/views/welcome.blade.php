<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido!</title>
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
                <a class="nav-link" aria-current="page" href="{{route('regionIndex')}}">Registrarse</a>
                <a href="/registro"><img src="https://www.flaticon.es/svg/vstatic/svg/4298/4298122.svg?token=exp=1614751637~hmac=51e58cf8e57f2527819b39213274e371" alt="" width="20" height="40" class="d-inline-block align-bottom"></a>
                <a class="nav-link" href="/iniciarSesion">Iniciar Sesión</a>
                <a href="/iniciarSesion"><img src="https://www.flaticon.es/svg/vstatic/svg/328/328371.svg?token=exp=1614741116~hmac=ce0d37136c5d4a530f0a619d5ef3c69b" alt="" width="20" height="40" class="d-inline-block align-bottom"></a>
                &nbsp &nbsp &nbsp
            </div>
            </div>
        </div>
    </nav>

    <h1>Página Welcome</h1>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://ih1.redbubble.net/image.1214836360.0014/poster,840x830,f8f8f8-pad,1000x1000,f8f8f8.jpg" alt="Card image cap">
    </div>
    
</body>
</html>