<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <!-- Page Content  -->
    <div class="">
        <div class="card text-center ">
            <div class="card-header text-center">
                <h2 class="info">Información personal del agremiado</H2>
            </div>

            <div class="card-body">
                <div class="row mb-1 g-3">
                    <div class="col">
                        <label>Nombre</label>
                        <input class="form-control" type="text" value="{{ $usuario->nombre }}" disabled>
                    </div>
                    <div class="col">
                        <label>Apellido</label>
                        <input class="form-control" type="text" value="{{ $usuario->apellido }}" disabled>
                    </div>
                    <div class="col">
                        <label>Correo</label>
                        <input class="form-control" type="text" value="{{ $usuario->email }}" disabled>
                    </div>
                </div>

                <div class="row mb-1 g-3">
                    <div class="col">
                        <label for="">Domicilio</label>
                        <input type="text" class="form-control" value="{{ $usuario->domicilio }}" disabled>
                    </div>

                    <div class="col">
                        <label for="">Estado Civil</label>
                        <input type="text" type="text" class="form-control" value="{{ $usuario->estadoCivil }}"
                            disabled>
                    </div>

                    <div class="col">
                        <label>Teléfono</label>
                        <input class="form-control" type="text" value="{{ $usuario->telefono }}" disabled>
                    </div>

                </div>

                <div class="row mb-1 g-3">
                    <div class="col">
                        <label for="">Nacionalidad</label>
                        <input type="text"type="text" class="form-control" value="{{ $usuario->nacionalidad }}"
                            disabled>
                    </div>
                    <div class="col">
                        <label for="">Ciudad</label>
                        <input type="text"type="text" class="form-control" value="{{ $usuario->ciudad }}"
                            disabled>
                    </div>
                    <div class="col">
                        <label for="">Colonia</label>
                        <input type="text"type="text" class="form-control" value="{{ $usuario->colonia }}"
                            disabled>
                    </div>
                </div>

                @if ($usuario->tipo_agremiado == 'Administrativo y Docente')
                    <div class="row mb-1 g-4">
                        <div class="col">
                            <label>Tipo de agremiado</label>
                            <input class="form-control" type="text" value="{{ $usuario->tipo_agremiado }}" disabled>
                        </div>

                        <div class="col">
                            <label>Departamento de trabajo</label>
                            <input class="form-control" type="text" value="{{ $usuario->departamento }}" disabled>
                        </div>

                        <div class="col-4">
                            <label>Puesto</label>
                            <input class="form-control" type="text" value="{{ $usuario->puestoA }}" disabled>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Tipo de Docente</label>
                            <input class="form-control" type="text" value="{{ $usuario->puestoD }}" disabled>
                        </div>

                        <div class="col-4">
                            <label>Carrera</label>
                            <input class="form-control" type="text" value="{{ $usuario->carrera }}" disabled>
                        </div>

                    </div>
                @elseif ($usuario->tipo_agremiado == 'Administrador')
                    <div class="row">
                        <div class="col">
                            <label>Tipo de agremiado</label>
                            <input class="form-control" type="text" value="{{ $usuario->tipo_agremiado }}" disabled>
                        </div>

                        <div class="col">
                            <label for="">Departamento</label>
                            <input class="form-control" type="text" value="{{ $usuario->departamento }}" disabled>
                        </div>

                        <div class="col">
                            <label>Puesto</label>
                            <input class="form-control" type="text" value="{{ $usuario->puestoA }}" disabled>
                        </div>
                    </div>
                @elseif ($usuario->tipo_agremiado == 'Docente')
                    <div class="row">
                        <div class="col">
                            <label>Tipo de agremiado</label>
                            <input class="form-control" type="text" value="{{ $usuario->tipo_agremiado }}" disabled>
                        </div>
                        <div class="col">
                            <label>Carrera</label>
                            <input class="form-control" type="text" value="{{ $usuario->carrera }}" disabled>
                        </div>
                        <div class="col">
                            <label>Tipo de docente</label>
                            <input class="form-control" type="text" value="{{ $usuario->puestoD }}" disabled>
                        </div>
                    </div>
                @endif


                <div class="row mb-1 g-3">
                    <div class="col">
                        <label>CURP</label>
                        <input class="form-control" type="text" value="{{ $usuario->curp }}" disabled>
                    </div>
                    <div class="col">
                        <label>RFC</label>
                        <input class="form-control" type="text" value="{{ $usuario->rfc }}" disabled>
                    </div>
                    <div class="col">
                        <label>Clave de Elector</label>
                        <input class="form-control" type="text" value="{{ $usuario->ine }}" disabled>
                    </div>
                </div>
                <div class="row mb-1 g-2">
                    <div class="col">
                        <label for="">Fecha de nacimiento</label>
                        <input type="text" class="form-control" value="{{ $usuario->nacimiento }}" disabled>
                    </div>
                    <div class="col">
                        <label>Fecha de afiliación</label>
                        <input class="form-control" type="text" value="{{ $usuario->fecha_afiliacion }}"
                            disabled>
                    </div>
                    <div class="col">
                        <label>Fecha de ingreso</label>
                        <input class="form-control" type="text" value="{{ $usuario->fecha_ingreso }}" disabled>
                    </div>
                </div>

                <div class="jumbotron mt-2">
                    <h3>Datos de contacto de emergencia</h3>
                    <div class="row g-3">
                        <div class="col">
                            <label for="">Nombre de contacto</label>
                            <input type="text" class="form-control" value="{{ $usuario->nombreP }}" disabled>
                        </div>
                        <div class="col">
                            <label for="">Parentesco</label>
                            <input type="text" class="form-control" value="{{ $usuario->parentesco }}" disabled>
                        </div>
                        <div class="col">
                            <label for="">Teléfono</label>
                            <input type="text" class="form-control" value="{{ $usuario->telContacto }}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('admin.usuarios') }}" class="btn btn-dark float-left"><i
                        class="fa fa-arrow-circle-left   "></i> Regresar</a>
                <a href="{{ route('admin.user-edit', $usuario) }}" class="btn btn-info float-right"><i
                        class="fa fa-edit"></i> Editar información</a>
            </div>
        </div>
    </div>
</div>
