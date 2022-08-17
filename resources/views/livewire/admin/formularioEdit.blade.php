<div class="container">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>
    <form class="form">
        <div class="jumbotron">
            <h3>Información del agremiado</h3>

            <div class="row mt-2 g-3">
                <div class="col">
                    <label>Nombre</label>
                    <input class="form-control" type="text" value="{{ $usuario->nombre }}">
                </div>
                <div class="col">
                    <label>Apellido</label>
                    <input class="form-control" type="text" value="{{ $usuario->apellido }}">
                </div>
                <div class="col">
                    <label>Correo</label>
                    <input class="form-control" type="text" value="{{ $usuario->email }}">
                </div>
            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <label for="">Domicilio</label>
                    <input type="text" class="form-control" value="{{ $usuario->domicilio }}">
                </div>

                <div class="col">
                    <label for="">Estado Civil</label>
                    <input type="text" type="text" class="form-control" value="{{ $usuario->estadoCivil }}">
                </div>

                <div class="col">
                    <label>Teléfono</label>
                    <input class="form-control" type="text" value="{{ $usuario->telefono }}">
                </div>

            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <label for="">Nacionalidad</label>
                    <input type="text"type="text" class="form-control" value="{{ $usuario->nacionalidad }}">
                </div>
                <div class="col">
                    <label for="">Ciudad</label>
                    <input type="text"type="text" class="form-control" value="{{ $usuario->ciudad }}">
                </div>
                <div class="col">
                    <label for="">Colonia</label>
                    <input type="text"type="text" class="form-control" value="{{ $usuario->colonia }}">
                </div>
            </div>

            @if ($usuario->tipo_agremiado == 'Administrativo y Docente')
                <div class="row mt-2 g-4">
                    <div class="col">
                        <label>Tipo de agremiado</label>
                        <select wire:ignore.self id="agremiado" name="agremiado" wire:model="usuario.tipo_agremiado">
                            <option>Tipo de agremiado</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Docente">Docente</option>
                            <option value="Administrativo y Docente">Administrativo y Docente</option>
                        </select>
                        @error('usuario.tipo_agremiado')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col">
                        <label>Departamento de trabajo</label>
                        <select wire:ignore.self wire:model="usuario.departamento" name="departamento"
                            id="departamento">
                            <option>Departamento</option>
                            <option value="Servicios escolares">Servicios escolares</option>
                            <option value="Planeación">Planeación</option>
                            <option value="Administración y Finanzas">Administración y Finanzas</option>
                            <option value="Vinculación">Vinculación</option>
                        </select>
                        @error('usuario.departamento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label>Puesto</label>
                        <input wire:ignore.self type="text" placeholder="Puesto" class="form-control"
                            wire:model="usuario.puestoA">
                        @error('usuario.puestoA')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row mt-2">
                    <div class="col-4">
                        <label>Tipo de Docente</label>
                        <select wire:ignore.self id="puestoD" name="puestoD" wire:model="usuario.puestoD">
                            <option value="">Tipo de Docente</option>
                            <option value="PTC">PTC</option>
                            <option value="PA">PA</option>
                        </select>
                        @error('usuario.puestoD')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label>Carrera</label>
                        <select wire:ignore.self id="carrera" name="carrera" wire:model="usuario.carrera">
                            <option>Carrera</option>
                            <option value="Tecnologias de la Información">Tecnologias de la infomación</option>
                            <option value="Operaciones Comerciales">Operaciones comerciales internacionales</option>
                            <option value="Mecatrónica">Mecatrónica</option>
                            <option value="Desarrollo de negocios">Desarrollo de Negocios</option>
                            <option value="Procesos Alimentarios">Procesos Alimentarios</option>
                            <option value="Mantenimiento Industrial">Mantenimiento Industrial</option>
                        </select>
                        @error('usuario.carrera')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            @elseif ($usuario->tipo_agremiado == 'Administrativo')
                <div class="row">
                    <div class="col">
                        <label>Tipo de agremiado</label>
                        <select wire:ignore.self id="agremiado" name="agremiado" wire:model="usuario.tipo_agremiado">
                            <option>Tipo de agremiado</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Docente">Docente</option>
                            <option value="Administrativo y Docente">Administrativo y Docente</option>
                        </select>
                        @error('usuario.tipo_agremiado')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="">Departamento</label>
                        <select wire:ignore.self wire:model="usuario.departamento" name="departamento"
                            id="departamento">
                            <option>Departamento</option>
                            <option value="Servicios escolares">Servicios escolares</option>
                            <option value="Planeación">Planeación</option>
                            <option value="Administración y Finanzas">Administración y Finanzas</option>
                            <option value="Vinculación">Vinculación</option>
                        </select>
                        @error('usuario.departamento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col">
                        <label>Puesto</label>
                        <input wire:ignore.self class="form-control" id="puestoA" name="puestoA"
                            wire:model="usuario.puestoA" type="text" placeholder="Puesto">
                        @error('usuario.puestoA')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @elseif ($usuario->tipo_agremiado == 'Docente')
                <div class="row">
                    <div class="col">
                        <label>Tipo de agremiado</label>
                        <select wire:ignore.self id="agremiado" name="agremiado" wire:model="usuario.tipo_agremiado">
                            <option>Tipo de agremiado</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Docente">Docente</option>
                            <option value="Administrativo y Docente">Administrativo y Docente</option>
                        </select>
                        @error('usuario.tipo_agremiado')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Carrera</label>
                        <select wire:ignore.self id="carrera" name="carrera" wire:model="usuario.carrera">
                            <option>Carrera</option>
                            <option value="Tecnologias de la Información">Tecnologias de la infomación</option>
                            <option value="Operaciones Comerciales">Operaciones comerciales internacionales</option>
                            <option value="Mecatrónica">Mecatrónica</option>
                            <option value="Desarrollo de negocios">Desarrollo de Negocios</option>
                            <option value="Procesos Alimentarios">Procesos Alimentarios</option>
                            <option value="Mantenimiento Industrial">Mantenimiento Industrial</option>
                        </select>
                        @error('usuario.carrera')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Tipo de docente</label>
                        <select wire:ignore.self id="puestoD" name="puestoD" wire:model="usuario.puestoD">
                            <option value="">Tipo de Docente</option>
                            <option value="PTC">PTC</option>
                            <option value="PA">PA</option>
                        </select>
                        @error('usuario.puestoD')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif


            <div class="row mt-2 g-3">
                <div class="col">
                    <label>CURP</label>
                    <input class="form-control" type="text" value="{{ $usuario->curp }}">
                </div>
                <div class="col">
                    <label>RFC</label>
                    <input class="form-control" type="text" value="{{ $usuario->rfc }}">
                </div>
                <div class="col">
                    <label>Clave de Elector</label>
                    <input class="form-control" type="text" value="{{ $usuario->ine }}">
                </div>
            </div>
            <div class="row mt-2 g-2">
                <div class="col">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" class="form-control" value="{{ $usuario->nacimiento }}">
                </div>
                <div class="col">
                    <label>Fecha de afiliación</label>
                    <input class="form-control" type="date" value="{{ $usuario->fecha_afiliacion }}">
                </div>
                <div class="col">
                    <label>Fecha de ingreso</label>
                    <input class="form-control" type="date" value="{{ $usuario->fecha_ingreso }}">
                </div>
            </div>
        </div>
        <div class="jumbotron mt-2">
            <h3>Datos de contacto</h3>
            <div class="row g-3">
                <div class="col">
                    <label for="">Nombre de contacto</label>
                    <input type="text" class="form-control" value="{{ $usuario->nombreP }}">
                </div>
                <div class="col">
                    <label for="">Parentesco</label>
                    <input type="text" class="form-control" value="{{ $usuario->parentesco }}">
                </div>
                <div class="col">
                    <label for="">Teléfono</label>
                    <input type="text" class="form-control" value="{{ $usuario->telContacto }}">
                </div>
            </div>
        </div>

        <div class="jumbotron w-50">
            <h3>Restablecer contraseña por defecto</h3>
            <div class="row mt-2">
                <div class="col">
                    <p style="color: black">Para restablecer una contraseña en caso de ser olvidada, solo hay que
                        seleccionar el recuadro de abajo.</p>
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input wire:model="password" class="form-check-input" value="sindicatout"
                                type="checkbox" name="remember"> Restablecer contraseña
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        const agremiadotype = document.querySelector("#agremiado");
        const carrera = document.querySelector("[name=carrera]");
        const puestoA = document.querySelector("[name=puestoA]");
        const puestoD = document.querySelector("[name=puestoD]");
        const departamento = document.querySelector("[name=departamento]");

        agremiadotype.addEventListener("change", () => {
            if (agremiadotype.value === "Docente") {
                puestoD.style.display = 'block';
                carrera.style.display = 'block';
                puestoA.style.display = 'none';
                departamento.style.display = 'none';

            } else if (agremiadotype.value === "Administrativo") {
                puestoA.style.display = 'block';
                departamento.style.display = 'block';
                puestoD.style.display = 'none';
                carrera.style.display = 'none';

            } else if (agremiadotype.value === "Administrativo y Docente") {
                puestoA.style.display = 'block';
                puestoD.style.display = 'block';
                carrera.style.display = 'block';
                departamento.style.display = 'block';
            }
        });
    </script>

</div>
