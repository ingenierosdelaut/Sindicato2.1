<div class="container">

    <form class="form">
        <div class="row g-2">
            <div class="col">
                <label style="color: black" for="">Nombre</label>
                <input class="form-control" type="text" wire:model="usuario.nombre" placeholder="Nombre">
                @error('usuario.nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Apellido</label>
                <input class="form-control" wire:model="usuario.apellido" placeholder="Apellido" type="text">
                @error('usuario.apellido')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="row mt-1">
            <div class="col-6">
                <label style="color: black" for="">Correo</label>
                <input class="form-control" wire:model="usuario.email" placeholder="Ejemplo@hotmail.com" type="text"
                    placeholder="Correo: ejemplo@hotmail.com">
                @error('usuario.email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-2 mt-1">
            <div class="col">
                <label style="color: black" for="">Contraseña nueva</label>
                <input class="form-control" type="password" wire:model="password" placeholder="Nombre">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Confirmar contraseña</label>
                <input class="form-control" wire:model="confirm_password" placeholder="Confirmar contraseña"
                    type="password">
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>


    </form>



</div>
