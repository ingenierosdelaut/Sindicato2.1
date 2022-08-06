<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<header>
    <h3>SUTUTSLRC</h3>
</header>

<body>
    <main>
        <div class="createdby">
            {{-- <img class="img-fluid" src="{{ asset('static/images/sututslrc.png') }}" width="150" height="150"
            alt=""> --}}

            <p>El documento fue creado por: <b> {{ $data->nombre }} {{ $data->apellido }}</b> el dia: </p>


        </div>

        <div class="container">
            {{-- <img src="{{ asset('static/images/sututslrc.png') }}" width="150" height="150" alt=""> --}}
            <h2>Reporte de usuarios registrados</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col"><b>Nombre</b></th>
                    <th scope="col"><b>Apellido</b></th>
                    <th scope="col"><b>Correo</b></th>
                    <th scope="col"><b>Domicilio</b></th>
                    <th scope="col"><b>Teléfono</b></th>
                    <th scope="col"><b>Estado Civil</b></th>
                    <th scope="col"><b>Nacionalidad</b></th>
                    <th scope="col"><b>Ciudad</b></th>
                    <th scope="col"><b>Colonia</b></th>
                    <th scope="col"><b>Tipo de agremiado</b></th>
                    <th scope="col"><b>Carrera</b></th>
                    <th scope="col"><b>Tipo de docente</b></th>
                    <th scope="col"><b>Departamento</b></th>
                    <th scope="col"><b>Puesto</b></th>
                    <th scope="col"><b>Clave de Elector</b></th>
                    <th scope="col"><b>Curp</b></th>
                    <th scope="col"><b>RFC</b></th>
                    <th scope="col"><b>Fecha nacimiento</b></th>
                    <th scope="col"><b>Fecha de ingreso</b></th>
                    <th scope="col"><b>Fecha de afiliación</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td scope="row">{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->domicilio }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->estadoCivil }}</td>
                        <td>{{ $usuario->nacionalidad }}</td>
                        <td>{{ $usuario->ciudad }}</td>
                        <td>{{ $usuario->colonia }}</td>
                        <td>{{ $usuario->tipo_agremiado }}</td>
                        <td>{{ $usuario->carrera}}</td>
                        <td>{{ $usuario->puestoD }}</td>
                        <td>{{ $usuario->departamento }}</td>
                        <td>{{ $usuario->puestoA }}</td>
                        <td>{{ $usuario->ine }}</td>
                        <td>{{ $usuario->curp }}</td>
                        <td>{{ $usuario->rfc }}</td>
                        <td>{{ $usuario->nacimiento }}</td>
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
<footer></footer>


</html>
