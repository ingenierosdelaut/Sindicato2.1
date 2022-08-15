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
            <h2>Reporte de usuarios registrados</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col"><b>Nombre</b></th>
                    <th scope="col"><b>Apellido</b></th>
                    <th scope="col"><b>Correo</b></th>
                    <th scope="col"><b>Tipo de agremiado</b></th>
                    <th scope="col"><b>Carrera</b></th>
                    <th scope="col"><b>Tipo de docente</b></th>
                    <th scope="col"><b>Departamento</b></th>
                    <th scope="col"><b>Puesto</b></th>
                    <th scope="col"><b>Fecha de ingreso</b></th>
                    <th scope="col"><b>Fecha de afiliación</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td scope="row">{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->tipo_agremiado }}</td>
                        <td>{{ $usuario->carrera }}</td>
                        <td>{{ $usuario->puestoD }}</td>
                        <td>{{ $usuario->departamento }}</td>
                        <td>{{ $usuario->puestoA }}</td>
                        <td>{{ $usuario->fecha_ingreso }}</td>
                        <td>{{ $usuario->fecha_afiliacion }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div>
            <script type="text/php">
                    if (isset($pdf)) {
                        $size = 14;
                        $text = date('d.m.Y');
                        $pdf->page_text($text, $size);
                    }
                </script>
        </div>
        <div style="width:auto">
            <div style="float:left;width:10%">testing</div>
            <div style="float:left;width:10%">testing123</div>
        </div> --}}
    </main>

</body>

<footer>
    <h3>https://sindicato.sututslrc.org/</h3>
</footer>


</html>
