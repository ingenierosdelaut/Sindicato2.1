<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>


    <div class="row">
        <div class="col mb-1">
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
                <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
            </div>
        </div>

        <div class="col-6 mt-2">
            <div class="dropdown">
                <button type="button" style="background-color: #0c8461"
                    class="float-right mr-1 btn btn-sm btn-success dropdown-toggle user" data-toggle="dropdown"><i
                        class="fa fa-user-plus"></i>
                    Crear nuevo usuario
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.create-user') }}" type="button"> <i
                            class="fa fa-user"></i> Agremiado </a>
                    <a class="dropdown-item" href="{{ route('admin.create') }}" type="button"> <i
                            class="fa fa-address-book"></i>
                        SUT Admin</a>
                </div>
            </div>

            <div class="dropdown">
                <button type="button" class="float-right mr-1 btn btn-sm btn-dark dropdown-toggle report"
                    data-toggle="dropdown"><i class="fa fa-file"></i>
                    Generar reporte
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.users.pdf') }}" type="button"><i
                            class="fa fa-file-pdf"></i> PDF </a>
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
                    <thead class="table-dark ">
                        <tr>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Departamento</th>
                            <th>Carrera</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td scope="row">{{ $usuario->nombre }}
                                    {{ $usuario->apellido }} </td>
                                <td>{{ $usuario->puesto }}</td>
                                <td>{{ $usuario->departamento }}</td>
                                <td>{{ $usuario->carrera }}</td>
                                @if ($usuario->estado == 1)
                                    <td><span class="badge badge-pill badge-success">Activo</span></td>
                                @elseif ($usuario->estado == 0)
                                    <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                @endif

                                <td>
                                    <a type="button" href="{{ route('admin.show-user', $usuario) }}"
                                        title="Informacion del usuario(Vista previa)" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                    <a type="button" href="{{ route('admin.user-edit', $usuario) }}"
                                        title="Editar informacion del usuario" class="btn btn-primary btn-sm edit"><i
                                            class="fa fa-edit"></i></a>
                                    @if ($usuario->estado == 1)
                                        <button wire:click="disable({{ $usuario->id }})" type="button"
                                            title="Desactivar usuario" class="btn btn-warning btn-sm"><i
                                                class="fa fa-user-slash"></i></button>
                                    @elseif ($usuario->estado == 0)
                                        <button wire:click="enable({{ $usuario->id }})" type="button"
                                            title="Activar usuario" class="btn btn-success btn-sm"><i
                                                class="fa fa-user-slash"></i></button>
                                    @endif

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
