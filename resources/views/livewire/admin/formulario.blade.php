<div class="container contenedor">

    <form class="form">

        <div class="jumbotron">
            <h3>Información personal</h3>

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
                        type="text">
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
                    <select class="relieve-options" wire:model="usuario.estadoCivil" name="estadovicil">
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

            <div class="row g-2 mt-2">
                <div class="col">
                    <select id="departamentoTrabajo" wire:model="usuario.departamento">
                        <option>Departamento de trabajo</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Docente">Docente</option>
                        <option value="Ambos">Ambos</option>
                    </select>
                </div>

                <div class="col">
                    <select class="relieve-options" id="carrera" wire:model="usuario.carrera">
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
                    <input class="form-control" id="puesto" wire:model="usuario.puesto" type="text"
                        placeholder="Puesto">
                    {{-- <select  class="relieve-options" wire:model="usuario.area" name="area"
                    aria-placeholder="Elegir">
                    <option>Area</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Docente">Docente</option>
                </select> --}}
                    @error('usuario.puesto')
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
                            placeholder="Telefono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="10">
                        @error('usuario.telContacto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </form>
        </div>
    </form>



    <script>
        document.getElementById('departamentoTrabajo').addEventListener('change', function() {

            document.getElementById('carrera').hide(); //oculta el boton siguiente
            document.getElementById('puesto').hide(); //oculta el boton siguiente

            if (this.value === 'Docente') //si la opcion seleccionada es activo
            {
                document.getElementById('puesto').hide(); //oculta el boton agregar
                document.getElementById('carrera').show(); //muestra el boton siguiente

            } else if (this.value === 'Administrativo') // en caso contrario, que sea jubilado etc
            {
                document.getElementById('carrera').show(); //muestra el boton agregar
                document.getElementById('puesto').hide(); //oculta el boton siguiente

            } else if (this.value === 'Ambos') {
                document.getElementById('carrera').show(); //muestra el boton agregar
                document.getElementById('puesto').show(); //muestra el boton agregar
            }
        });
    </script>

</div>
