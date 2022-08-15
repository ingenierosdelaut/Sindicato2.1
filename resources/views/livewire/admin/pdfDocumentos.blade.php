<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<header>
    <img src="{{ 'static/images/sututslrc.png' }}" width="100" height="100" alt="logo">
</header>

<body>
    <main>
        <div class="createdby">
            <p>El documento fue creado por: <b> {{ $data->nombre }} {{ $data->apellido }}</b> el dia:
                <b>{{ $date }}</b>
            </p>
        </div>

        <div class="container">
            <h2>Reporte de documentos subidos al sitio web.</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Título </th>
                    <th scope="col">Se subió</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td>{{ $documento->titulo }}</td>
                        <td>{{ $documento->created_at }}</td>
                        @if ($documento->estado == 1)
                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                        @else
                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                        @endif
                    </tr>



                    </div>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

<footer>
    <h3>https://sindicato.sututslrc.org/</h3>
</footer>

</html>
