<div class="container">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>
    <form class="form">
        <div class="jumbotron">
            <h3>Información del agremiado</h3>

            <div class="row g-3">
                <div class="col">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" wire:model="usuario.nombre" placeholder="Nombres">
                    @error('usuario.nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">Apellido</label>
                    <input type="text" class="form-control" wire:model="usuario.apellido" placeholder="Apellidos">
                    @error('usuario.apellido')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">Correo</label>
                    <input class="form-control" wire:model="usuario.email" placeholder="Ejemplo@hotmail.com"
                        type="email">
                    @error('usuario.email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <label for="">Nacionalidad</label>
                    <input type="text" placeholder="Nacionalidad" class="form-control"
                        wire:model="usuario.nacionalidad">
                    @error('usuario.nacionalidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">Estado Civil</label>
                    <select class="" wire:model="usuario.estadoCivil" name="estadovicil">
                        <option>Estado civil</option>
                        <option value="Soltero">Soltero(a)</option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Divorciado">Divorciado(a)</option>
                        <option value="Separado">Separado(a)</option>
                        <option value="Viudo">Viudo(a)</option>
                        <option value="Concubino">Concubino(a)</option>
                        <option value="En relacion">En una relacion</option>
                    </select>
                    @error('usuario.estadoCivil')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="col">
                    <label for="">Teléfono</label>
                    <input class="form-control" wire:model="usuario.telefono" type="text"
                        placeholder="Teléfono, Ejemplo: 6531506589" maxlength="10"
                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    @error('usuario.telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <label for="">Estado donde vives</label>
                    <input type="text" class="form-control" wire:model="usuario.estado_m"
                        placeholder="Estado donde vives">
                    @error('usuario.estado_m')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Ciudad</label>
                    <input type="text" placeholder="Ciudad" class="form-control" wire:model="usuario.ciudad">
                    @error('usuario.ciudad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Domicilio</label>
                    <input type="text" class="form-control" wire:model="usuario.domicilio" placeholder="Domicilio">
                    @error('usuario.domicilio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2 g-3">
                <div class="col-4">
                    <label for="">Colonia</label>
                    <input type="text" placeholder="Colonia" class="form-control" wire:model="usuario.colonia">
                    @error('usuario.colonia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="">Código Postal</label>
                    <input type="text" placeholder="Código Postal" class="form-control" maxlength="5"
                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                        wire:model="usuario.postal">
                    @error('usuario.postal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <div class="row g-3 mt-2">
                <div class="col">
                    <label for="">Clave de Elector</label>
                    <input class="form-control" wire:model="usuario.ine" type="text" maxlength="13"
                        style="text-transform:uppercase;" placeholder="Clave de Elector">
                    @error('usuario.ine')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col">
                    <label for="">CURP</label>
                    <input class="form-control" wire:model="usuario.curp" type="text" maxlength="18"
                        style=" text-transform:uppercase;" placeholder=" CURP, Ejemplo: XXXX-XXXXX-XXXXX-XXXX">
                    @error('usuario.curp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">RFC</label>
                    <input class="form-control" wire:model="usuario.rfc" type="text" maxlength="13"
                        style=" text-transform:uppercase;" placeholder="RFC, Ejemplo: XXXX-XXXX-XXXXX">
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
                    <label for="">Fecha de ingreso a la UTSLRC</label>
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

            <div class="row mt-2 g-3">
                <div class="col">
                    <label for="">Grado Maximo de estudios</label>
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

                <div class="col">
                    <label for="">Nivel de Ingles</label>
                    <select wire:model="usuario.lvl_ingles">
                        <option>Nivel de Inglés</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                    </select>
                    @error('usuario.lvl_ingles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label for="">Número de Empleado</label>
                    <input wire:model="usuario.Nempleado" type="text" maxlength="4" class="form-control"
                        placeholder="Número de empleado"
                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    @error('usuario.Nempleado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-2 g-3">
                <div class="col">
                    <label for="">Título del Grado</label>
                    <input wire:model="usuario.titulo_grado" type="text" class="form-control"
                        placeholder="Titulo del grado">
                    @error('usuario.titulo_grado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Estado del grado</label>
                    <select wire:model="usuario.grado_estado">
                        <option>Estado del Grado</option>
                        <option value="Titulado">Titulado</option>
                        <option value="Titulo en trámite">Titulo en trámite</option>
                        <option value="Terminación sin título">Terminación sin título</option>
                        <option value="Cursando">Cursando</option>
                        <option value="Trunca">Trunca</option>
                    </select>
                    @error('usuario.grado_estado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Vigencia del Certificado</label>
                    <input wire:model="usuario.vigencia_certificado" type="month" class="form-control">
                    @error('usuario.vigencia_certificado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-2">
                <div class="col">
                    <label for="">Puesto Laboral</label>
                    <select wire:ignore.self id="agremiado" name="agremiado" wire:model="usuario.tipo_agremiado">
                        <option>Puesto Laboral</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Docente">Docente</option>
                        <option value="Administrativo y Docente">Administrativo y Docente</option>
                    </select>
                    @error('usuario.tipo_agremiado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label id="lblpuestoA" name="lblpuestoA">Puesto administrativo</label>
                    <input wire:ignore.self class="form-control" id="puestoA" name="puestoA"
                        wire:model="usuario.puestoA" type="text" placeholder="Puesto">
                    @error('usuario.puestoA')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col">
                    <label id="lbldepartamento" name="lbldepartamento">Departamento</label>
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
            </div>

            {{-- Validacion del tipo de agremiado --}}
            <div class="row mt-2">
                <div class="col-4">
                    <label id="lblcarrera" name="lblcarrera">Carrera</label>
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
                    <label id="lblpuestoD" name="lblpuestoD">Puesto Docente</label>
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
        </div>



        <div class="jumbotron mt-3">
            <h3>Contacto de emergencia</h3>
            <form>
                <div class="row g-3">
                    <div class="col">
                        <label for="">Nombre</label>
                        <input type="text" wire:model="usuario.nombreP" class="form-control"
                            placeholder="Nombre">
                        @error('usuario.nombreP')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="">Parentezco</label>
                        <input type="text" wire:model="usuario.parentesco" class="form-control"
                            placeholder="Parentesco">
                        @error('usuario.parentesco')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="">Teléfono</label>
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

        const lblcarrera = document.querySelector("[name=lblcarrera]");
        const lblpuestoD = document.querySelector("[name=lblpuestoD]");
        const lblpuestoA = document.querySelector("[name=lblpuestoA]");
        const lbldepartamento = document.querySelector("[name=lbldepartamento]");

        agremiadotype.addEventListener("change", () => {


            if (agremiadotype.value === "Docente") {
                puestoD.style.display = 'block';
                carrera.style.display = 'block';

                lblpuestoA.style.display = 'none';
                lbldepartamento.style.display = 'none';
                puestoA.style.display = 'none';
                departamento.style.display = 'none';

            } else if (agremiadotype.value === "Administrativo") {
                puestoA.style.display = 'block';
                departamento.style.display = 'block';

                lblpuestoD.style.display = 'none';
                puestoD.style.display = 'none';
                lblcarrera.style.display = 'none';
                carrera.style.display = 'none';

            } else if (agremiadotype.value === "Administrativo y Docente") {
                puestoA.style.display = 'block';
                puestoD.style.display = 'block';
                carrera.style.display = 'block';
                departamento.style.display = 'block';

                lblcarrera.style.display = 'block';
                lbldepartamento.style.display = 'block';
                lblpuestoA.style.display = 'block';
                lblpuestoD.style.display = 'block';
            }
        });
    </script>

</div>
