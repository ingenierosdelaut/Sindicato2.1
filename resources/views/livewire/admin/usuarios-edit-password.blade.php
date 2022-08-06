<div>

    <div class="mt-3">
        <form wire:submit.prevent="editpwd">
            <div class="card">
                <h3 class="card-header text-center">
                    Perfil de usuario
                </h3>
                <p style="color: black" class="container mt-2">En este apartado podras visualizar tus datos personales, y
                    solo podras
                    modificar tu
                    contraseña en caso de ser necesario. Si tu información esta incorrecta comunicate con el
                    administrador de la página.</p>
                <hr>
                <div class="card-body">
                    @include('livewire.admin.formulario-pwd')
                </div>
                <div class="card-footer text-center">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="w-100 float-right btn btn-success save"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
