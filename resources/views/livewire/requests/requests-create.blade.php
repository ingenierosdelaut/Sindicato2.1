<div>

    <div class="container mt-3">
        <form wire:submit.prevent="crear">
            <div class="card mx-auto w-50 ">
                <h5 class="card-header text-center">
                    Solicitud Día Económico
                </h5>
                <div class="card-body col-6 mx-auto">
                    @include('livewire.requests.formulario')
                </div>
                <div class="card-footer text-center">
                    <button type="submit" style="background-color: #0c8461; border: none;"
                        class="btn btn-success save">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-3">
        @if (count((array) $requests))
            <h2>Mis solicitudes realizadas</h2>
            <table class="table table-striped text-center table-request">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Fecha Solicitada</th>
                        <th scope="col">Dia en que se solicitó</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Motivo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->fecha }}</td>
                            <td>{{ $request->created_at }}</td>
                            @if ($request->estado == 0)
                                <td><span class="badge badge-pill badge-warning">Pendiente</span></td>
                            @elseif ($request->estado == 1)
                                <td><span style="background-color: #0c8461;"
                                        class="badge badge-pill badge-success">Aceptada</span></td>
                            @else
                                <td><span class="badge badge-pill badge-danger">Denegada</span></td>
                            @endif
                            <td>
                                {{ $request->motivo }}
                            </td>
                            <td>
                                @if ($request->estado == 0)
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-dismiss="modal" data-bs-target="#exampleModal{{ $request->id }}"
                                        data-backdrop="false" data-bs-whatever="@mdo"><i class="fa fa-edit"></i>
                                        Editar</button>
                                @elseif ($request->estado == 1 || $request->estado == 2)
                                    La solicitud ya no se puede modificar.
                                @endif
                            </td>
                        </tr>

                        <div wire:ignore.self class="modal" data-backdrop="static" id="exampleModal{{ $request->id }}"
                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog UpdatePanel">
                                <div class="modal-content">
                                    <form wire:submit="edit">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">
                                                Editar día solicitado</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>Día solicitado:</h3>
                                            <p>{{ $request->fecha }}</p>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Seleccionar la
                                                        nueva fecha a
                                                        solicitar:</label>
                                                    <div class="contador" id="caracters"></div>
                                                    <input id="contar" wire:model="request.fecha" type="date"
                                                        maxlength="200" class="form-control">
                                                    @error('request.fecha')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="edit({{ $request->id }})" type="button"
                                                class="btn btn-success"
                                                style="background-color: #0c8461; border: none;">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        @endif
        <div>
            {{ $requests->links() }}
        </div>
    </div>

</div>




</div>
