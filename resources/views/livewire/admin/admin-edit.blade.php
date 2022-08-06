<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <div>
        <form wire:submit.prevent="editarAdmin">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Editar Información</h4>
                </div>
                <div class="card-body">
                    <p style="color: black">Para cambiar la información, es necesario cambiar los datos que se encuentran
                        en los campos debajo.</p>
                    @include('livewire.admin.formulario-admin-edit')

                </div>
                <div class="card-footer">
                    <button type="submit"
                        class="float-right btn btn-success save">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('admin.anuncios') }}">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</div>
