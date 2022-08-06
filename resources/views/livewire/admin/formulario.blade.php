<div class="container contenedor">

    <head>
        <style>
            select[name=carrera] {
                display: none;
            }

            select[name=puestoD] {
                display: none;
            }

            input[name=puestoA] {
                display: none;
            }
        </style>
    </head>

    <form class="form">

        <div class="jumbotron">
            <h3>Información del agremiado</h3>

            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" wire:model="usuario.nombre" placeholder="Nombres">
                    @error('usuario.nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <input type="text" class="form-control" wire:model="usuario.apellido" placeholder="Apellidos">
                    @error('usuario.apellido')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <input class="form-control" wire:model="usuario.email" placeholder="Ejemplo@hotmail.com"
                        type="email">
                    @error('usuario.email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <input type="text" class="form-control" wire:model="usuario.domicilio" placeholder="Domicilio">
                    @error('usuario.domicilio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <input class="form-control" wire:model="usuario.telefono" type="text"
                        placeholder="Teléfono, Ejemplo: 6531506589" maxlength="10"
                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    @error('usuario.telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <select class="" wire:model="usuario.estadoCivil" name="estadovicil">
                        <option>Estado civil</option>
                        <option value="Soltero">Soltero/a</option>
                        <option value="Casado">Casado/a</option>
                        <option value="En relacion">En una relacion</option>
                    </select>
                    @error('usuario.estadoCivil')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <input type="text" placeholder="Nacionalidad" class="form-control"
                        wire:model="usuario.nacionalidad">
                    @error('usuario.nacionalidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" placeholder="Ciudad" class="form-control" wire:model="usuario.ciudad">
                    @error('usuario.ciudad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" placeholder="Colonia" class="form-control" wire:model="usuario.colonia">
                    @error('usuario.colonia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Validacion del tipo de agremiado --}}
            <div class="row g-3 mt-2">
                <div class="col">
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
                    <input wire:ignore.self class="form-control" id="puestoA" name="puestoA"
                        wire:model="usuario.puestoA" type="text" placeholder="Puesto">
                    @error('usuario.puestoA')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <select wire:ignore.self wire:model="usuario.departamento" name="departamento" id="departamento">
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

                {{-- else --}}

            </div>

            <div class="row mt-2">
                <div class="col-4">
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


                <div class="col-4">
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

            <div class="row g-3 mt-2">
                <div class="col">
                    <input class="form-control" wire:model="usuario.ine" type="text" maxlength="18"
                        style="text-transform:uppercase;" placeholder="Clave de Elector">
                    @error('usuario.ine')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col">
                    <input class="form-control" wire:model="usuario.curp" type="text" maxlength="18"
                        style=" text-transform:uppercase;" placeholder=" CURP, Ejemplo: MAAA991217HSRRML06">
                    @error('usuario.curp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <input class="form-control" wire:model="usuario.rfc" type="text" maxlength="13"
                        style=" text-transform:uppercase;" placeholder="RFC, Ejemplo: MAAA991217HSRRML06">
                    @error('usuario.rfc')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-2">
                <div class="col">
                    <label for="">Fecha de nacimiento</label>
                    <input class="form-control" onblur="(this.type='text')" onfocus="(this.type='date')"
                        wire:model="usuario.nacimiento" placeholder="Ejemplo: 12/06/1998" type="date">
                    @error('usuario.nacimiento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">Fecha de ingreso</label>
                    <input class="form-control" wire:model="usuario.fecha_ingreso" type="date" class="textbox-n"
                        onblur="(this.type='text')" onfocus="(this.type='date')" placeholder="Ejemplo: 05/05/2020"
                        id="date">
                    @error('usuario.fecha_ingreso')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">Fecha de afiliación</label>
                    <input class="form-control" wire:model="usuario.fecha_afiliacion" type="date"
                        placeholder="Ejemplo: 20/05/2020" class="textbox-n" onfocus="(this.type='date')"
                        onblur="(this.type='text')">
                    @error('usuario.fecha_afiliacion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2 ">
                <div class="col-4">
                    <select wire:model="usuario.gradoMax">
                        <option>Grado Máximo de estudios</option>
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Lic./Ing.">Lic./Ing.</option>
                        <option value="Maestria">Maestría</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                    @error('usuario.gradoMax')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="jumbotron mt-3">
            <h3>Contacto de emergencia</h3>
            <form>
                <div class="row g-3">
                    <div class="col">
                        <input type="text" wire:model="usuario.nombreP" class="form-control"
                            placeholder="Nombre">
                        @error('usuario.nombreP')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" wire:model="usuario.parentesco" class="form-control"
                            placeholder="Parentesco">
                        @error('usuario.parentesco')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" wire:model="usuario.telContacto" class="form-control"
                            placeholder="Telefono"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                            maxlength="10">
                        @error('usuario.telContacto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </form>
        </div>
    </form>



    <script>
        const agremiadotype = document.querySelector("#agremiado");
        const carrera = document.querySelector("[name=carrera]");
        const puestoA = document.querySelector("[name=puestoA]");
        const puestoD = document.querySelector("[name=puestoD]");
        const departamento = document.querySelector("[name=departamento]");

        departamento.style.display = 'none';

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
