<div>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('static/css/app.css') }}">

    <div class="container">
        <img src="{{ 'static/images/sututslrc.png' }}" alt="" width="120" height="120">
    </div>
    <br>
    <div class="container">
        {{-- <img src="{{ asset('static/images/sututslrc.png') }}" width="150" height="150" alt=""> --}}

        <h1><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h1>

        <h2>Lista de usuarios</h2>
        <br>
    </div>

    <div class="container">
        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <th><b>Nombre</b></th>
                    <th><b>Apellido</b></th>
                    <th><b>Fecha de Nacimiento</b></th>
                    <th><b>Telefono</b></th>
                    <th><b>Estado Civil</b></th>
                    <th><b>Nacionalidad</b></th>
                    <th><b>Ciudad</b></th>
                    <th><b>Colonia</b></th>
                    <th><b>Domicilio</b></th>
                    <th><b>Grado Maximo</b></th>
                    <th><b>Departamento</b></th>
                    <th><b>Carrera</b></th>
                    <th><b>CURP</b></th>
                    <th><b>RFC</b></th>
                    <th><b>Clave de elector</b></th>
                    <th><b>Fecha de ingreso</b></th>
                    <th><b>Fecha de Afiliación</b></th>
                    <th><b>Datos de Contacto</b></th>
                    <th><b>Nombre de Contacto</b></th>
                    <th><b>Parentesco</b></th>
                    <th><b>Telefono</b></th>
                    <th><b>Estado</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->nacimiento }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->estadoCivil }}</td>
                        <td>{{ $usuario->nacionalidad }}</td>
                        <td>{{ $usuario->ciudad }}</td>
                        <td>{{ $usuario->colonia }}</td>
                        <td>{{ $usuario->domicilio }}</td>
                        <td>{{ $usuario->gradoMax }}</td>
                        <td>{{ $usuario->departamento }}</td>
                        <td>{{ $usuario->carrera }}</td>
                        <td>{{ $usuario->curp }}</td>
                        <td>{{ $usuario->rfc }}</td>
                        <td>{{ $usuario->ine }}</td>
                        <td>{{ $usuario->fecha_ingreso }}</td>
                        <td>{{ $usuario->fecha_afiliacion }}</td>
                        <td> info ==> </td>
                        <td> {{ $usuario->nombreP }} </td>
                        <td> {{ $usuario->parentesco }} </td>
                        <td> {{ $usuario->telContacto }} </td>
                        @if ($usuario->estado == 1)
                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                        @elseif ($usuario->estado == 0)
                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
