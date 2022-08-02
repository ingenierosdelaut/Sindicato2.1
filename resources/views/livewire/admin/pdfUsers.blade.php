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
                    <th scope="col"><b>Departamento</b></th>
                    <th scope="col"><b>Puesto</b></th>
                    <th scope="col"><b>Carrera</b></th>
                    <th scope="col"><b>Curp</b></th>
                    <th scope="col"><b>RFC</b></th>
                    <th scope="col"><b>Clave de Elector</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td scope="row">{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->departamento }}</td>
                        <td>{{ $usuario->puesto }}</td>
                        <td>{{ $usuario->carrera }}</td>
                        <td>{{ $usuario->curp }}</td>
                        <td>{{ $usuario->rfc }}</td>
                        <td>{{ $usuario->ine }}</td>
                        {{-- @if ($usuario->estado == 1)
                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                        @elseif ($usuario->estado == 0)
                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                        @endif --}}

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
