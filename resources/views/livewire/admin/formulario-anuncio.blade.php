<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input class="form-control" style="color: black;" wire:model="anuncio.titulo" type="text"
                        id="comment" placeholder="Titulo del anuncio" name="text">
                    @error('anuncio.titulo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea class="mt-1 form-control" id="contar" maxlength="200" wire:model="anuncio.contenido" type="text"
                        placeholder="Especificaciones del anuncio"></textarea>
                    @error('anuncio.contenido')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="contador" id="caracters"></div>
                </div>

                <div class="row">
                    <div class="col-2" id="input-file">
                        <p id="texto"><i class="fa fa-file-image"></i> Subir Imagen</p>
                        <input wire:model="url_img" type="file" id="imagen" name="file">
                    </div>
                </div>

                <div class="row container">
                    @if ($url_img != null)
                        <div class="col">
                            <img class="mx-auto d-block" style="border-radius: 15px; width: 300px; height: 300px;"
                                src="{{ $url_img->temporaryUrl() }}" alt="">
                        </div>
                    @endif
                </div>

                <div class="row align-items-center">
                    <div class="col-sm">
                        <div class="form-group">
                            <a href="{{ route('admin.anuncios') }}" type="button"
                                class="float-left btn btn-dark">Registros</a>
                            <button wire:loading.attr="disabled" wire:target="url_img"
                                class="float-right btn btn-success"><i class="fa fa-save"></i>
                                Publicar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
