<div>


    <div class="mt-3">
        <form wire:submit.prevent="editpwd">
            <div class="card">
                <h5 class="card-header text-center">
                    Perfil de usuario
                </h5>
                <h5 class="container mt-2">En este apartado podras visualizar tus datos personales, y solo podras
                    modificar tu
                    contraseña en caso de ser necesario. Si tu información esta incorrecta comunicate con el
                    administrador de la página.</h5>
                <hr>
                <div class="card-body">
                    @include('livewire.admin.formulario-pwd')
                </div>
                <div class="card-footer text-center">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" style="background-color: #0c8461"
                            class="w-75 btn  btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
