<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <!-- Page Content  -->
    <div>
        <form wire:submit.prevent="crearAnuncio">
            <div class="card">
                <div class="card-header">
                    <h4>Para crear un nuevo anuncio solo hay que llenar los siguientes campos.</h4>
                    <p style="color: black">Si no se desea incluir una imagen en el anuncio, simplemente se llenarán los campos de título y especificaciones y se dara clic en publicar.</p>
                </div>
                <div class="card-body">
                    @include('livewire.admin.formulario-anuncio')
                </div>
            </div>
        </form>
    </div>

</div>
