<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('static/css/app.css') }}">
</head>

<div class="container">
    <h1><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h1>

    <h2>Lista de documentos</h2>
</div>

<table class="table text-center table-striped">
    <thead class="table-dark">
        <tr>
            <td scope="col"><b>ID</b></td>
            <td scope="col"><b>Título</b></td>
            <td scope="col"><b>Estado</b></td>
            <td scope="col"><b>Fecha de publicación</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($documentos as $documento)
            <tr>
                <td scope="row">{{ $documento->id }}</td>
                <td>{{ $documento->titulo }}</td>
                @if ($documento->estado == 1)
                    <td><span class="badge badge-pill badge-success">Activo</span></td>
                @elseif ($documento->estado == 0)
                    <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                @endif
                <td>{{ $documento->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
