<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/textareaResponsive.css') }}">
    </head>

    <div class="row">
        <div class="col">
            <form action="">
                <input class="form-control" wire:model="anuncio.titulo" type="text" id="comment"
                    placeholder="Título del anuncio" name="text" maxlength="50">
                @error('anuncio.titulo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <textarea class="mt-1 form-control area" onkeyup="countChars(this);" id="contar" maxlength="200"
                    wire:model="anuncio.contenido" type="text" placeholder="Especificaciones del anuncio">
                </textarea>
                @error('anuncio.contenido')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <p wire:ignore class="contador" id="caracters"></p>
            </form>

            <div class="row">
                <div class="col-2" id="input-file">
                    <p id="texto"><i class="fa fa-file-image"></i> Subir Imagen</p>
                    <input wire:model="url_img" type="file" id="imagen" name="imagen">
                </div>
            </div>

            <div class="row text-center">
                <div class="col">
                    <div wire:loading wire:target="url_img" class="align-items-center">
                        <strong>Cargando...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
            </div>


            <div class="row">

                @if ($url_img != null)
                    <div class="col">
                        <img class="mx-auto d-block " style="border-radius: 10px;" width="700" height="500"
                            src="{{ $url_img->temporaryUrl() }}" alt="">
                    </div>
                @else
                    <p class="mx-auto d-block">No hay imagen <i class="fa fa-bullhorn" aria-hidden="true"></i></p>
                @endif

                @if ($anuncio->url_img)
                    <img src="{{ Storage::disk('public')->url($anuncio->url_img) }}" class="mx-auto d-block"
                         alt="">
                @endif
            </div>

            <div class="row align-items-center">
                <div class="col">
                    <div class="form-group">
                        <a href="{{ route('admin.anuncios') }}" type="button"
                            class="float-left btn btn-dark">Registros</a>
                        <button class="float-right btn btn-success publicar"><i class="fa fa-save"></i>
                            Publicar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
