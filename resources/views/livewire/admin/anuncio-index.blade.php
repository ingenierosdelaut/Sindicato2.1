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

        <div class="col mt-2">
            <a href="{{ route('admin.anuncio-create') }}" type="button" style="background-color: #0c8461"
                class="float-right btn-sm btn-success user"><i class="fa fa-plus-square"></i> Crear nuevo anuncio</a>

            <div class="dropdown">
                <button type="button" class="float-right mr-1 btn btn-sm btn-dark dropdown-toggle report"
                    data-toggle="dropdown"><i class="fa fa-file"></i>
                    Generar reporte
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.anuncio.pdf') }}" type="button"><i
                            class="fa fa-file-pdf"></i> PDF </a>
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.anuncio.excel') }}"
                        type="button"><i class="fa fa-file-excel-o"></i>
                        Excel</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Page Content  -->
    <div class="row">
        <div class="col text-center table-responsive">
            @if (count((array) $anuncios))
                <table class="table table-striped" Width=50%>
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th scope="col">Especificaciones</th>
                            <th>Publicado Por</th>
                            <th>Se publicó</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anuncios as $anuncio)
                            <tr>
                                <td scope='row'>{{ $anuncio->titulo }}</td>
                                <td>
                                    <div style="width: 450px; overflow: hidden;">{{ $anuncio->contenido }}</div>
                                </td>
                                <td>{{ $anuncio->nombre }} {{ $anuncio->apellido }}</td>
                                <td>{{ $anuncio->created_at }}</td>
                                @if ($anuncio->estado == 1)
                                    <td><span class="badge badge-pill badge-success">Activo</span></td>
                                @elseif ($anuncio->estado == 0)
                                    <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-dismiss="modal" title="Eliminar anuncio"
                                        data-bs-target="#exampleModalAnuncioDel" data-backdrop="false"
                                        data-bs-whatever="@mdo"><i class="fa fa-trash"></i></button>
                                    <a href="{{ route('admin.anuncio-edit', $anuncio) }}" title="Editar anuncio"
                                        type="button" class="btn-sm btn-info edit"><i class="fa fa-edit"></i></a>
                                    @if ($anuncio->estado == 1)
                                        <button wire:click="disable({{ $anuncio->id }})" type="button"
                                            title="Desactivar Anuncio" class="btn btn-sm btn-warning"><i
                                                class="fa fa-ban"></i>
                                        </button>
                                    @elseif ($anuncio->estado == 0)
                                        <button wire:click="enable({{ $anuncio->id }})" type="button"
                                            title="Activar Anuncio" class="btn-sm btn btn-success"><i
                                                class="fa fa-check"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            @endif
        </div>
    </div>

    {{ $cargado == true ? $anuncios->links() : null }}

    <div wire:ignore.self class="modal" data-backdrop="static" id="exampleModalAnuncioDel" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <form wire:submit="delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar este anuncio?</h5>
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <h5><b>Titulo del anuncio</b></h5>
                                <p style="color: black">{{ $anuncio->titulo }}</p>

                                <h5><b>Contenido del anuncio</b></h5>
                                <p style="color: black">{{ $anuncio->contenido }}</p>

                                <h5><b>Imagen</b></h5>
                                @if ($anuncio->url_img)
                                    <img class="img-fluid rounded"
                                        src="{{ Storage::disk('public')->url($anuncio->url_img) }}" width="350"
                                        height="350"><br>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="delete({{ $anuncio->id }})" type="button"
                            class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
