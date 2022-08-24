<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <div class="card content">
        <div class="card-header">
            <h2>Información del administrador</h2>
        </div>

        <div class="card-body">
            <div class="row g-2">
                <div class="col">
                    <label style="color: black" for="">Nombre</label>
                    <input class="form-control" type="text" value="{{ $usuario->nombre }}" disabled>
                </div>

                <div class="col">
                    <label style="color: black" for="">Apellido</label>
                    <input class="form-control" value="{{ $usuario->apellido }}" type="text" disabled>
                </div>

            </div>

            <div class="row mt-1">
                <div class="col-6">
                    <label style="color: black" for="">Correo</label>
                    <input class="form-control" value="{{ $usuario->email }}" type="text" disabled>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('admin.usuarios') }}" class="btn btn-sm btn-dark float-left"><i
                    class="fa fa-arrow-circle-left   "></i> Regresar</a>
            <a href="{{ route('edit.admin', $usuario) }}" class="btn btn-sm  btn-info float-right"><i class="fa fa-edit"></i>
                Editar información</a>
        </div>
    </div>
</div>
