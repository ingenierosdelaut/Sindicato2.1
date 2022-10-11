<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <!-- Page Content  -->
    <div>
        <div class="row mt-1">
            <div class="col-4">
                <div class="input-group ">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
                </div>
            </div>

            <div class="col-5">
                <form>
                    {{-- @csrf --}}
                    <div class="container">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <input wire:model="f1" type="date" id="f1" name="f1" required>
                                        <label for="f1">Fecha Inicio</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input wire:model="f2" type="date" id="f2" name="f2" required>
                                        <label for="f2">Fecha Fin</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-dark btn-sm" type="submit"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-3">
                <div class="dropdown">
                    <button type="button" class="float-right mt-1 btn btn-sm btn-dark dropdown-toggle"
                        data-toggle="dropdown"><i class="fa fa-file"></i>
                        Generar reporte
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" target="a_blank" href="{{ route('admin.solicitudes.pdf', $search) }}"
                            type="button"><i class="fa fa-file-pdf"></i> PDF </a>
                        <a class="dropdown-item" target="a_blank" href="{{ route('admin.solicitudes.excel') }}"
                            type="button"><i class="fa fa-file-excel-o"></i>
                            Excel</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col table-responsive">
                @if (count((array) $requests))
                    <table class="table table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Día Solicitado</th>
                                <th>Día de la solicitud</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($requests as $request)
                                <tr>
                                    <!--Nombre-->
                                    <td scope='row'>{{ $request->nombre }} {{ $request->apellido }}</td>
                                    <!--Estado-->
                                    @if ($request->estado == 0)
                                        <td><span class="badge badge-pill badge-warning">Pendiente</span></td>
                                    @elseif ($request->estado == 1)
                                        <td><span class="badge badge-pill badge-success">Aceptada</span></td>
                                    @elseif ($request->estado == 2)
                                        <td><span class="badge badge-pill badge-danger">Denegada</span>
                                        </td>
                                    @elseif ($request->estado == 3)
                                        <td><span class="badge badge-pill "
                                                style="background-color: rgb(255, 146, 4); color: black;">Cancelada</span>
                                        </td>
                                    @endif
                                    <!--Fecha-->
                                    <td>{{ $request->fecha }}</td>
                                    <td>{{ $request->created_at }}</td>

                                    <!--Motivo-->
                                    @if ($request->motivo != null)
                                        <td>
                                            <div style="width: 450px; overflow: hidden;">
                                                {{ $request->motivo }}
                                            </div>
                                        </td>
                                    @elseif ($request->estado == 0)
                                        <td>Acciones por realizar</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <!--Acciones-->
                                    @if ($request->estado == 0)
                                        <td>
                                            <button wire:click="aceptar({{ $request->id }})" type="button"
                                                class="btn btn-sm btn-success acep">Aceptar</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-dismiss="modal" data-bs-target="#exampleModal{{ $request->id }}"
                                                data-backdrop="false" data-bs-whatever="@mdo">Denegar</button>
                                        </td>
                                    @elseif ($request->estado == 1)
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-dismiss="modal"
                                                data-bs-target="#exampleModal{{ $request->id }}" data-backdrop="false"
                                                data-bs-whatever="@mdo" class="btn btn-sm btn-danger">Cancelar</button>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif

                                </tr>

                                <div wire:ignore.self class="modal" data-backdrop="static"
                                    id="exampleModal{{ $request->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog UpdatePanel">
                                        <div class="modal-content">
                                            <form wire:submit="motivo">
                                                <div class="modal-header">

                                                    <h5 class="modal-title text-center" id="exampleModalLabel">
                                                        @if ($request->estado == 0)
                                                            Escribir el motivo por el cual se denegó
                                                            la solicitud
                                                        @elseif ($request->estado == 1)
                                                            Escribir el motivo por el cual se canceló
                                                            la solicitud
                                                        @endif
                                                    </h5>

                                                    <button type="button" class="bt-sm btn-close"
                                                        style="border: 1px solid black; border-radius: 4px;"
                                                        data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Solicitante:</h3>
                                                    <p style="color: black"><b>{{ $request->nombre }}
                                                            {{ $request->apellido }}</b> para el día
                                                        <b>{{ $request->fecha }}</b>
                                                    </p>
                                                    <form>
                                                        <div class="mb-3">
                                                            <label style="color: black" for="recipient-name"
                                                                class="col-form-label">Especificaciones:</label>
                                                            <textarea id="contar" wire:model="request.motivo" placeholder="Escribir motivo" type="text" maxlength="200"
                                                                class="form-control"></textarea>
                                                            <p wire:ignore.self class="contador" id="caracters">
                                                            </p>
                                                            @error('request.motivo')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    @if ($request->estado == 0)
                                                        <button wire:click="motivo({{ $request->id }})"
                                                            type="button" class="btn btn-success"
                                                            style="background-color: #0c8461; border: none;">Enviar</button>
                                                    @elseif ($request->estado == 1)
                                                        <button wire:click="cancelar({{ $request->id }})"
                                                            type="button" class="btn btn-success"
                                                            style="background-color: #0c8461; border: none;">Enviar</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cargado == true ? $requests->links() : null }}
                    {{ $requests->render() }}
                @else
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                @endif
            </div>
        </div>


    </div>

</div>
