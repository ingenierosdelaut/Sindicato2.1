<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <!-- Header  -->
    <div class="row">
        <div class="col-4 mb-1">
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
                <input wire:model="search" name="buscar" id="buscar" type="text" class="form-control"
                    placeholder="Buscar">
            </div>
        </div>

        <div class="col mt-2">
            <button type="button" class="float-right btn btn-sm btn-success user" data-bs-toggle="modal"
                data-dismiss="modal" data-bs-target="#Modaldoc" data-backdrop="false" data-bs-whatever="@mdo"><i
                    class="fa fa-plus-square"></i> Subir Nuevo
                Documento</button>

            <div class="dropdown">
                <button type="button" class="float-right mr-1 btn btn-sm btn-dark dropdown-toggle report"
                    data-toggle="dropdown"><i class="fa fa-file"></i>
                    Generar reporte
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.documentos.pdf', $search) }}"
                        type="button"><i class="fa fa-file-pdf"></i> PDF </a>
                    <a class="dropdown-item" target="a_blank" href="{{ route('admin.documentos.excel') }}"
                        type="button"><i class="fa fa-file-excel-o"></i>
                        Excel</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Page content --}}
    <div class="row">
        <div class="col text-center table-responsive">
            @if (count($documentos) > 0)
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Título </th>
                            <th scope="col">Se subió</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documentos as $documento)
                            <tr>
                                <td>{{ $documento->titulo }}</td>
                                <td>{{ $documento->created_at }}</td>
                                @if ($documento->estado == 1)
                                    <td><span class="badge badge-pill badge-success">Activo</span></td>
                                @else
                                    <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                @endif
                                @if ($documento->estado == 1)
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-dismiss="modal" title="Desactivar Documento"
                                            data-bs-target="#exampleModal{{ $documento->id }}" data-backdrop="false"
                                            data-bs-whatever="@mdo"><i class="fa fa-ban"></i></button>
                                    </td>
                                @elseif ($documento->estado == 0)
                                    <td></td>
                                @endif
                            </tr>

                            <div wire:ignore.self class="modal" data-backdrop="static"
                                id="exampleModal{{ $documento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog UpdatePanel">
                                    <div class="modal-content">
                                        <form wire:submit="desactivar">
                                            <div class="modal-header">
                                                <label class="modal-title" id="exampleModalLabel">¿Deseas eliminar
                                                    este
                                                    documento?</label>
                                                <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <h3>Título del documento:</h3>
                                                        <p><b>{{ $documento->titulo }}</b></p>

                                                        <h3>Día en que se subió el documento:</h3>
                                                        <p><b>{{ $documento->created_at }}</b>
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button wire:click="desactivar({{ $documento->id }})" type="button"
                                                    style="background-color: #177c67; border: none;"
                                                    class="btn btn-success">Desactivar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {{ $cargado == true ? $documentos->links() : null }}
            @else
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            @endif
        </div>
    </div>

    <div wire:ignore.self class="modal" data-backdrop="static" id="Modaldoc" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subir Documento</h5>
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div>
                                @include('livewire.admin.documento-upload')
                            </div>
                        </form>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
