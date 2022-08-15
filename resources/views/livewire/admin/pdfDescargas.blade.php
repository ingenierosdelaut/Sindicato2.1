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
            <h2>Reporte de descargas realizadas por los agremiados en el sitio web.</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Documento</td>
                    <td>Fecha</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($descargas as $descarga)
                    <tr>
                        <td>{{ $descarga->id }}</td>
                        <td>{{ $descarga->nombre }} {{ $descarga->apellido }}</td>
                        <td>{{ $descarga->titulo }}</td>
                        <td>{{ $descarga->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

<footer>
    <h3>https://sindicato.sututslrc.org/</h3>
</footer>

</html>
