<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">DSM-53</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('lista')}}">Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('nuevo')}}">Nuevo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <hr><br>
            <div class="card mb-3" style="max-width:70%">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('archivos/' . $alumno->foto)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class"card-title">{{$alumno->app.' '.$alumno->apm.', '.$alumno->nombre}}</h5>
                            <p class="card-text">
                                <b>Matricula: </b>{{$alumno->matricula}}<br>
                                <b>Fecha de nacimiento: </b>{{$alumno->fn}}<br>
                                <b>Género: </b>{{$alumno->gen}}<br>
                                <b>Grupo: </b>{{$alumno->id_grupo}}<br>
                                <b>Email: </b>{{$alumno->email}}<br>
                                <b>Contraseña: </b>{{$alumno->pass}}<br>
                            </p>
                            <p class="card-text"><small class="text-muted">{{$alumno->created_at}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <br>
            <footer class="bd-footer py-3 mt-3 text-center">Desarrollo Móvil Multiplataforma, &#169UTVT - 2022</footer>
        </div>
</body>

</html>