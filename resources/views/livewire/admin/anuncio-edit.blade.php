<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <!-- Page Content  -->
    <div>
        <form wire:submit.prevent="editarAnuncio">
            <div class="card content">
                <div class="card-header">
                    <h5>Para editar el anuncio solo habrá que eliminar el contenido de los campos y escribir el
                        nuevo.</h5>
                    <p>Para cambiar la imagen solo se selecciona una nueva y se da clic en publicar.</p>
                </div>
                <div class="card-body">
                    @include('livewire.admin.formulario-anuncio')
                </div>
            </div>
        </form>
    </div>
</div>

</div>
