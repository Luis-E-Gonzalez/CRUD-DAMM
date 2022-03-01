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
        <form action="{{route('lista')}}" method="GET" name="filtros">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label">Buscar:</label>
                <input type="text" class="form-control" name="buscar" placeholder="Ingresa nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Grupo:</label>
                <select name="id_grupo" class="form-select">
                    <option value="0">--Seleccione un grupo--</option>
                    @foreach($grupos as $grupo)
                    <option value="{{$grupo->id_grupo}}">{{$grupo->clave}}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-grid-gap2">
                <input type="submit" value="Buscar" class="btn btn-primary" />
            </div>
        </form>
        <hr><br>

        {{$alumnos1->links()}}
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Género</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Otros</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos1 as $alumno)
                <tr>
                    <th scope="row">{{$alumno->id_alumno}}</th>
                    <td><img src="{{asset('archivos/' . $alumno->foto)}}" width="30px"></td>
                    <td>{{$alumno->app.' '.$alumno->apm.', '.$alumno->nombre}}</td>
                    <td>{{$alumno->gen}}</td>
                    <td>{{$alumno->fn}}</td>
                    <td>
                        @foreach($grupos as $grupo)
                        @if($grupo->id_grupo === $alumno->id_grupo)
                        {{$grupo->clave}}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('detalle',['id'=>$alumno->id_alumno])}}" class="btn btn-outline-primary btn-sm">Detalle-Route</a>
                        <a href="{{url('/detalle/'.$alumno->id_alumno)}}" class="btn btn-outline-primary btn-sm">Detalle-URL</a>
                        <a href="{{route('editar',['id'=>$alumno->id_alumno])}}" class="btn btn-outline-primary btn-sm">Editar</a>
                        <form name="borrar1" action="{{route('borrar1',['id'=>$alumno->id_alumno])}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" value="Borrar 1" onclick="return confirm('¿Está seguro de querer eliminiar este alumno?')">
                        </form>
                        <a href="{{route('borrar2',['id'=>$alumno->id_alumno])}}" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Está seguro de querer eliminiar este alumno?')">Borrar 2</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <br>
        {{$alumnos1->links()}}
        <footer class="bd-footer py-3 mt-3 text-center">Desarrollo Móvil Multiplataforma, &#169UTVT - 2022</footer>
    </div>
</body>

</html>