<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>
    <div class="row mb-1 g-3">
        <div class="col">
            <label>Nombre</label>
            <input class="form-control" type="text" value="{{ $usuario->nombre }}" disabled>
        </div>
        <div class="col">
            <label>Apellido</label>
            <input class="form-control" type="text" value="{{ $usuario->apellido }}" disabled>
        </div>
        <div class="col">
            <label>Correo</label>
            <input class="form-control" type="text" value="{{ $usuario->email }}" disabled>
        </div>
    </div>

    <div class="row mb-1 g-3">
        <div class="col">
            <label for="">Domicilio</label>
            <input type="text" class="form-control" value="{{ $usuario->domicilio }}" disabled>
        </div>

        <div class="col">
            <label for="">Estado Civil</label>
            <input type="text" type="text" class="form-control" value="{{ $usuario->estadoCivil }}" disabled>
        </div>

        <div class="col">
            <label>Teléfono</label>
            <input class="form-control" type="text" value="{{ $usuario->telefono }}" disabled>
        </div>

    </div>

    <div class="row mb-1 g-3">
        <div class="col">
            <label for="">Nacionalidad</label>
            <input type="text"type="text" class="form-control" value="{{ $usuario->nacionalidad }}" disabled>
        </div>
        <div class="col">
            <label for="">Ciudad</label>
            <input type="text"type="text" class="form-control" value="{{ $usuario->ciudad }}" disabled>
        </div>
        <div class="col">
            <label for="">Colonia</label>
            <input type="text"type="text" class="form-control" value="{{ $usuario->colonia }}" disabled>
        </div>
    </div>

    @if ($usuario->tipo_agremiado == 'Administrativo y Docente')
        <div class="row mb-1 g-4">
            <div class="col">
                <label>Tipo de agremiado</label>
                <input class="form-control" type="text" value="{{ $usuario->tipo_agremiado }}" disabled>
            </div>

            <div class="col">
                <label>Departamento de trabajo</label>
                <input class="form-control" type="text" value="{{ $usuario->departamento }}" disabled>
            </div>

            <div class="col-4">
                <label>Puesto</label>
                <input class="form-control" type="text" value="{{ $usuario->puestoA }}" disabled>
            </div>

        </div>

        <div class="row">
            <div class="col-4">
                <label>Tipo de Docente</label>
                <input class="form-control" type="text" value="{{ $usuario->puestoD }}" disabled>
            </div>

            <div class="col-4">
                <label>Carrera</label>
                <input class="form-control" type="text" value="{{ $usuario->carrera }}" disabled>
            </div>

        </div>
    @elseif ($usuario->tipo_agremiado == 'Administrador')
        <div class="row">
            <div class="col">
                <label>Tipo de agremiado</label>
                <input class="form-control" type="text" value="{{ $usuario->tipo_agremiado }}" disabled>
            </div>

            <div class="col">
                <label for="">Departamento</label>
                <input class="form-control" type="text" value="{{ $usuario->departamento }}" disabled>
            </div>

            <div class="col">
                <label>Puesto</label>
                <input class="form-control" type="text" value="{{ $usuario->puestoA }}" disabled>
            </div>
        </div>
    @elseif ($usuario->tipo_agremiado == 'Docente')
        <div class="row">
            <div class="col">
                <label>Tipo de agremiado</label>
                <input class="form-control" type="text" value="{{ $usuario->tipo_agremiado }}" disabled>
            </div>
            <div class="col">
                <label>Carrera</label>
                <input class="form-control" type="text" value="{{ $usuario->carrera }}" disabled>
            </div>
            <div class="col">
                <label>Tipo de docente</label>
                <input class="form-control" type="text" value="{{ $usuario->puestoD }}" disabled>
            </div>
        </div>
    @endif


    <div class="row mb-1 g-3">
        <div class="col">
            <label>CURP</label>
            <input class="form-control" type="text" value="{{ $usuario->curp }}" disabled>
        </div>
        <div class="col">
            <label>RFC</label>
            <input class="form-control" type="text" value="{{ $usuario->rfc }}" disabled>
        </div>
        <div class="col">
            <label>Clave de Elector</label>
            <input class="form-control" type="text" value="{{ $usuario->ine }}" disabled>
        </div>
    </div>

    <div class="row mb-1 g-2">
        <div class="col">
            <label for="">Fecha de nacimiento</label>
            <input type="text" class="form-control" value="{{ $usuario->nacimiento }}" disabled>
        </div>
        <div class="col">
            <label>Fecha de afiliación</label>
            <input class="form-control" type="text" value="{{ $usuario->fecha_afiliacion }}" disabled>
        </div>
        <div class="col">
            <label>Fecha de ingreso</label>
            <input class="form-control" type="text" value="{{ $usuario->fecha_ingreso }}" disabled>
        </div>
    </div>

    <div class="mt-2">
        <hr>
        <h5>En caso de querer cambiar su contraseña solo tendrá que escribirla abajo y confirmar que coincidan.
        </h5>
    </div>

    <form>
        <div class="row mt-3 g-2">
            <div class="col">
                <label for="">Nueva Contraseña</label>
                <input wire:model="password" type="password" minlength="8" name="Contraseña"  placeholder="Contraseña"
                    class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="">Confirmar Contraseña</label>
                <input type="password" wire:model="confirm_password" name="Confirmar Contraseña" minlength="8"
                    placeholder="Confirmar Contraseña" class="form-control">
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </form>
    <hr>

    <div class="jumbotron mt-2">
        <h3>Contacto de emergencia</h3>
        <div class="row g-3 mt">
            <div class="col">
                <input disabled type="text" class="form-control" value="{{ $usuario->nombreP }}">
            </div>

            <div class="col">
                <input disabled type="text" class="form-control" value="{{ $usuario->parentesco }}">
            </div>

            <div class="col">
                <input disabled type="text" class="form-control" value="{{ $usuario->telContacto }}">
            </div>
        </div>

    </div>


</div>
