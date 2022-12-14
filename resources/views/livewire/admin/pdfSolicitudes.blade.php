<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<header>
    <img class="img-fluid" src="{{ 'static/images/sututslrc.png' }}" width="100" height="100" alt="">
</header>

<body>
    <main>

        <div class="createdby">
            <p>El documento fue creado por: <b> {{ $data->nombre }} {{ $data->apellido }}</b> el dia:
                <b>{{ $date }}</b>
            </p>
        </div>

        <div class="container">
            <h2>Reporte de solicitudes realizadas por los agremiados en el sitio web.</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <td scope="col">Nombre</td>
                    <td scope="col">Estado</td>
                    <td scope="col">Día Solicitado</td>
                    <td scope="col">Día de la solicitud</td>
                    <td scope="col">Motivo</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <!--ID-->
                        {{-- <td scope="row">{{ $request->id }}</td> --}}
                        <!--Nombre-->
                        <td>{{ $request->nombre }} {{ $request->apellido }}</td>
                        <!--Estado-->
                        @if ($request->estado == 0)
                            <td><span class="badge badge-pill badge-warning">Pendiente</span></td>
                        @elseif ($request->estado == 1)
                            <td><span class="badge badge-pill badge-success">Aceptada</span></td>
                        @elseif ($request->estado == 2)
                            <td><span class="badge badge-pill badge-danger">Denegada</span></td>
                        @elseif ($request->estado == 3)
                            <td><span class="badge badge-pill badge-danger">Cancelada</span></td>
                        @endif
                        <!--Fecha-->
                        <td>{{ $request->created_at }}</td>
                        <td>{{ $request->fecha }}</td>
                        <!--Motivo-->
                        @if ($request->motivo != null)
                            <td>{{ $request->motivo }}</td>
                        @elseif ($request->estado == 0)
                            <td>Acciones por realizar</td>
                        @else
                            <td>Cumplio con los requisitos</td>
                        @endif
                @endforeach
                </tr>
            </tbody>
        </table>
    </main>
</body>

<footer>
    <h3>https://sindicato.sututslrc.org/</h3>
</footer>

</html>
