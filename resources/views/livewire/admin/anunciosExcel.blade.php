<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<h1><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h1>
<h2>Lista de Anuncios</h2>

<table>
    <thead>
        <tr>
            <td><b>ID</b></td>
            <td><b>Título<b></td>
            <td><b>Contenido</b></td>
            <td><b>Publicado Por<b></td>
            <td><b>Se Publico El Dia</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($anuncios as $anuncio)
            <tr>
                <td>{{ $anuncio->id }}</td>
                <td>{{ $anuncio->titulo }}</td>
                <td>{{ $anuncio->contenido }}</td>
                <td>{{ $anuncio->nombre }} {{ $anuncio->apellido }}</td>
                <td>{{ $anuncio->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
