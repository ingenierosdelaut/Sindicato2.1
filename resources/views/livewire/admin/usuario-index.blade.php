<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>


    <div class="row">
        <div class="col-4 mb-1">
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
                <input wire:model="search" name="buscar" id="buscar" type="text" class="form-control"
                    placeholder="Buscar">
            </div>
        </div>

        <div class="col-8 mt-2">
            <div class="dropdown">
                <button type="button" class="float-right mr-1 btn btn-sm btn-success dropdown-toggle user"
                    data-toggle="dropdown"><i class="fa fa-user-plus"></i>
                    Crear nuevo usuario
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.create-user') }}" type="button"> <i
                            class="fa fa-user"></i> Agremiado </a>
                    <a class="dropdown-item" href="{{ route('admin.create') }}" type="button"> <i
                            class="fa fa-address-book"></i>
                        SUTUT Admin</a>
                </div>
            </div>

            <div class="dropdown">
                <button type="button" class="float-right btn btn-sm btn-dark dropdown-toggle report"
                    data-toggle="dropdown"><i class="fa fa-file"></i>
                    Generar reporte
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.users.pdf', $search) }}"
                        name="exportPDF" type="submit"><i class="fa fa-file-pdf"></i> PDF </a>
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.users.excel') }}" type="button"><i
                            class="fa fa-file-excel-o"></i>
                        Excel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content  -->
    <div class="row">
        <div class="col text-center table-responsive">
            @if (count((array) $usuarios))
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>Nombre</th>
                            <th>Tipo de agremiado</th>
                            <th>Puesto Docente</th>
                            <th>Carrera</th>
                            <th>Departamento</th>
                            <th>Puesto Administrativo</th>
                            <th>Estado</th>
                            {{-- <th>Tipo de usuario</th> --}}
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                @if ($usuario->is_admin == 1)
                                    <td>
                                        <p>
                                            <b> <span style="color:#177c67;">{{ $usuario->nombre }}</span>
                                                <span style="color:grey;">
                                                    {{ $usuario->apellido }}</span> </b>
                                        </p>
                                    </td>
                                @else
                                    <td>
                                        <div style="width: 200px; overflow: hidden;">{{ $usuario->nombre }}
                                            {{ $usuario->apellido }} </div>
                                    </td>
                                @endif

                                <td>
                                    <div style="width: 175px; overflow: hidden;">{{ $usuario->tipo_agremiado }}</div>
                                </td>
                                <td>{{ $usuario->puestoD }}</td>
                                <td>
                                    <div style="width: 175px; overflow: hidden;">{{ $usuario->carrera }}</div>
                                </td>
                                <td>{{ $usuario->departamento }}</td>
                                <td>{{ $usuario->puestoA }}</td>
                                @if ($usuario->estado == 1)
                                    <td><span class="badge badge-pill badge-success">Activo</span></td>
                                @elseif ($usuario->estado == 0)
                                    <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                @endif

                                {{-- @if ($usuario->is_admin == 1)
                                    <td>SUTUT Admin</td>
                                @elseif ($usuario->is_admin == 0)
                                    <td>Agremiado</td>
                                @endif --}}

                                <td>
                                    <div style="width: 150px; overflow: hidden;">
                                        @if ($usuario->is_admin == 1)
                                            <a type="button" href="{{ route('show.admin', $usuario) }}"
                                                title="Información del adminstrador(Vista previa)"
                                                class="btn btn-info btn-sm info"><i class="fa fa-eye fa-sm"></i></a>
                                            <a type="button" href="{{ route('edit.admin', $usuario) }}"
                                                title="Editar información del administrador"
                                                class="btn btn-primary btn-sm "><i class="fa fa-edit fa-sm"></i></a>
                                        @else
                                            <a type="button" href="{{ route('admin.show-user', $usuario) }}"
                                                title="Información del usuario(Vista previa)"
                                                class="btn btn-info btn-sm info"><i class="fa fa-eye fa-sm"></i></a>
                                            <a type="button" href="{{ route('admin.user-edit', $usuario) }}"
                                                title="Editar información del agremiado"
                                                class="btn btn-primary btn-sm "><i class="fa fa-edit fa-sm"></i></a>
                                        @endif
                                        @if ($usuario->estado == 1)
                                            <button wire:click="disable({{ $usuario->id }})" type="button"
                                                title="Desactivar usuario" class="btn btn-warning btn-sm"><i
                                                    class="fa fa-user-slash fa-sm"></i></button>
                                        @elseif ($usuario->estado == 0)
                                            <button wire:click="enable({{ $usuario->id }})" type="button"
                                                title="Activar usuario" class="btn btn-success btn-sm"><i
                                                    class="fa fa-user-slash fa-sm"></i></button>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $cargado == true ? $usuarios->links() : null }}
            @else
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            @endif
            </table>
        </div>
    </div>

</div>
