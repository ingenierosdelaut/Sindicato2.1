<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>


    <div class="row mt-3">
        <div class="col justify-content-middle">
            <form wire:submit.prevent="crearAdmin">
                <div class="container cont-user">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Crear nuevo administrador de la página.</h4>
                        </div>
                        <div class="card-body">
                            <p style="color: black">Para registrar a un nuevo administrador solo se necesitan llenar los
                                siguientes campos.
                            </p>
                            @include('livewire.admin.formulario-admin')
                        </div>
                        <br>
                        <div class="card-footer">
                            <button class="float-right btn btn-success save"><i class="fa fa-save"></i> Guardar</button>
                            <a href="{{ route('admin.usuarios') }}" class="btn btn-dark"><i class="fa fa-home"></i>
                                Regresar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
