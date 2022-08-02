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
                    <p style="color: black">Para editar información habra que borrar el texto que se muestra en el campo que se quiera cambiar y escribir el nuevo dato.</p>
                    @include('livewire.admin.formulario-admin-edit')

                </div>
                <div class="card-footer">
                    <button type="submit" style="background-color: #177c67" class="float-right btn btn-success">Guardar</button>
                    <a class="btn btn-dark" href="{{route('admin.anuncios')}}">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</div>

