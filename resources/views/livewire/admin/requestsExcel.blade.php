<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('static/css/app.css') }}">
</head>

<div class="container">
    <h1><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h1>

    <h2>Lista de solicitudes</h2>
</div>

<table class="table text-center table-striped">
    <thead class="table-dark">
        <tr>
            <td scope="col"><b>ID</b></td>
            <td scope="col"><b>Nombre</b></td>
            <td scope="col"><b>Estado</b></td>
            <td scope="col"><b>Fecha en que se Solicito</b></td>
            <td scope="col"><b>Motivo</b></td>
        </tr>
    </thead>
    @foreach ($requests as $request)
        <tbody>
            <tr>
                <!--ID-->
                <td scope="row">{{ $request->id }}</td>
                <!--Nombre-->
                <td>{{ $request->nombre }} {{ $request->apellido }}</td>
                <!--Estado-->
                @if ($request->estado == 0)
                    <td><span>Pendiente</span></td>
                @elseif ($request->estado == 1)
                    <td><span>Aceptada</span></td>
                @elseif ($request->estado == 2)
                    <td><span>Denegada</span></td>
                @elseif ($request->estado == 3)
                    <td><span>Cancelada</span></td>
                @endif
                <!--Fecha-->
                <td>{{ $request->created_at }}</td>
                <!--Motivo-->
                <td>{{ $request->motivo }}</td>
            </tr>

        </tbody>
    @endforeach
</table>
