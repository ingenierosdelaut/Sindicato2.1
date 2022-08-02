<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>
    <form>
        <div class="row g-3">
            <div class="col">
                <label style="color: black" for="">Nombre</label>
                <input disabled class="form-control" wire:model="usuario.nombre" type="text" placeholder="Nombre">
                @error('usuario.nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Apellidos</label>
                <input disabled class="form-control" wire:model="usuario.apellido" placeholder="Apellido"
                    type="text">
                @error('usuario.apellido')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Correo</label>
                <input disabled class="form-control" wire:model="usuario.email" type="text"
                    placeholder="Correo: ejemplo@hotmail.com" disabled>
                @error('usuario.email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="row g-2 mt-2">
            <div class="col">
                <label style="color: black" for="">Departamento</label>
                <select wire:model="usuario.departamento" type="button" name="departamento">
                    <option>Departamento</option>
                    <option value="Tecnologias de la información">Tecnologias de la infomación</option>
                    <option value="Operaciones comerciales">Operaciones comerciales internacionales</option>
                    <option value="Mecatrónica">Mecatrónica</option>
                    <option value="Desarrollo de negocios">Desarrollo de negocios</option>
                </select>
                @error('usuario.departamento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Puesto</label>
                <select wire:model="usuario.puesto" type="button" name="puesto">
                    <option>Puesto</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Docente">Docente</option>
                </select>
                @error('usuario.puesto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-2">
            <div class="col">
                <label style="color: black" for="">Telefono</label>
                <input disabled class="form-control" wire:model="usuario.telefono" type="text"
                    placeholder="Telefono, Ejemplo: 6531506589">
                @error('usuario.telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label style="color: black" for="">CURP</label>
                <input disabled class="form-control" wire:model="usuario.curp" type="text"
                    placeholder=" CURP, Ejemplo: MAAA991217HSRRML06" maxlength="18">
                @error('usuario.curp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">RFC</label>
                <input disabled class="form-control" wire:model="usuario.rfc" type="text"
                    placeholder="RFC, Ejemplo: MAAA991217u77" maxlength="13">
                @error('usuario.rfc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-2">
            <div class="col">
                <label style="color: black" for="">Clave de Elector</label>
                <input disabled wire:model="usuario.ine" type="text" class="form-control" placeholder="INE(Codigo)"
                    maxlength="3">
                @error('usuario.ine')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Fecha de Ingreso</label>
                <input disabled class="form-control" wire:model="usuario.fecha_ingreso" type="date"
                    placeholder=" Fecha de Ingreso Ejemplo: 05/05/2020">
                @error('usuario.fecha_ingreso')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Fecha de Afiliación</label>
                <input disabled wire:model="usuario.fecha_afiliacion" type="date" class="form-control"
                    placeholder=" Fecha de Afiliacion Ejemplo: 20/05/2020">
                @error('usuario.fecha_afiliacion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class=" mt-2">
            <hr>
            <h5>En caso de querer cambiar su contraseña solo tendra que escribirla abajo y confirmarla de que coincidan.
            </h5>
            <hr>
        </div>
        <div class="row g-2">
            <div class="col">
                <label style="color: black" for="">Nueva Contraseña</label>
                <input wire:model="password" type="password" placeholder="Contraseña" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Confirmar Contraseña</label>
                <input wire:model="confirm_password" type="password" placeholder="Confirmar Contraseña"
                    class="form-control">
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>

        <div class="jumbotron mt-2">
            <h3>Contacto de emergencia</h3>
            <div class="row g-3 mt">
                <div class="col">
                    <input disabled type="text" class="form-control" wire:model="usuario.nombreP">
                    @error('usuario.nombreP')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <input disabled type="text" class="form-control" wire:model="usuario.parentesco">
                    @error('usuario.parentesco')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <input disabled type="text" class="form-control" wire:model="usuario.telContacto">
                    @error('usuario.telContacto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>



    </form>

</div>
