<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('static/css/app.css') }}">
</head>

<div class="container">
    <h1><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h1>

    <h2>Lista de Descargas</h2>
</div>

<table class="table text-center table-striped">
    <thead class="table-dark">
        <tr>
            <td><b>ID</b></td>
            <td><b>Nombre</b></td>
            <td><b>Documento</b></td>
            <td><b>Fecha</b></td>
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
