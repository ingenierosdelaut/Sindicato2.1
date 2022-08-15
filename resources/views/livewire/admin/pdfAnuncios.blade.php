<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<header>
    <img class="img-fluid" src="{{ 'static/images/sututslrc.png' }}" width="100" height="100" alt="">
</header>


<main>
    <div class="createdby">
        <p>El documento fue creado por: <b> {{ $data->nombre }} {{ $data->apellido }}</b> el dia:
            <b>{{ $date }}</b>
        </p>
    </div>

    <div class="container">
        <h2>Reporte de usuarios registrados</h2>
    </div>

    <table class="table table-striped">
        <thead class="table-dark" style="text-aling-center">
            <tr>
                <td scope="col">#ID</td>
                <td scope="col">Título</td>
                <td scope="col">Especificaciones</td>
                <td scope="col">Publicado Por</td>
                <td scope='col'>Se Publicó El Día</td>
            </tr>
        </thead>
        @foreach ($anuncios as $anuncio)
            <tbody>

                <tr>
                    <td scope="row">{{ $anuncio->id }}</td>
                    <td>{{ $anuncio->titulo }}</td>
                    <td>{{ $anuncio->contenido }}</td>
                    <td>{{ $anuncio->nombre }} {{ $anuncio->apellido }}</td>
                    <td>{{ $anuncio->created_at }}</td>
                </tr>

            </tbody>
        @endforeach
    </table>
</main>

<footer>
    <h3>https://sindicato.sututslrc.org/</h3>
</footer>

</html>
