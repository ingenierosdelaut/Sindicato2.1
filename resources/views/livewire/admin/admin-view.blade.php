<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/admin-view.css') }}">
    </head>

    <!-- Page Content  -->
    <div>
        <div class="container contenedor">
            @if (count((array) $anuncios) > 0)
                <div class="jumbotron">
                    @if ($requests > 0)
                        <div class="alert">
                            <strong class="notification">¡¡Notificación!!</strong> Tienes <b>{{ $requests }}
                                Solicitud(es)</b>
                            por atender en estado pendiente
                            <a href="{{ route('admin.solicitudes') }}" class="btn btn-sm btn-info button">¿Atender?</a>
                        </div>
                    @endif

                    <div>
                        <a href="{{ route('admin.anuncio-create') }}" class="btn btn-sm btn-dark float-right"><i
                                class="fa fa-circle-new"></i>
                            Crear
                            anuncio</a>
                    </div>
                    <br><br>
                    @foreach ($anuncios as $anuncio)
                        <!--Anuncio-->
                        @if ($anuncio->estado == 1)
                            <div class="card text-dark">
                                <div class="card-header">
                                    <b>{{ $anuncio->titulo }}</b>
                                </div>

                                <div class="card-body ">
                                    <div class="container">
                                        <p>{{ $anuncio->contenido }}</p>
                                        @if ($anuncio->url_img)
                                            <img class="img-fluid rounded"
                                                src="{{ Storage::disk('public')->url($anuncio->url_img) }}"
                                                style="border-radius: 4px; width: 350px; height: 250px"><br>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer h-10">
                                    <footer>
                                        <a href="{{ route('admin.anuncio-edit', $anuncio) }}"><small
                                                class="text-muted">Editar</a></small>
                                        <button wire:click="disable({{ $anuncio->id }})" type="button"
                                            title="Desactivar Anuncio" style="border: none;"><small
                                                class="text-muted">Desactivar</a></small>
                                        </button>
                                        <small class="float-right text-muted muted"><b>Creado el día
                                                {{ $anuncio->created_at }} por
                                                {{ $anuncio->nombre }}
                                                {{ $anuncio->apellido }}</b></a></small>
                                    </footer>
                                </div>
                            </div> <br>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="jumbotron">
                    <div>
                        <a href="{{ route('admin.anuncio-create') }}" class="btn btn-sm btn-dark float-right"><i
                                class="fa fa-save"></i>
                            Crear
                            anuncio</a>
                    </div>
                    <h1>
                        Sin anuncios por mostrar
                    </h1>
                </div>
            @endif

        </div>
    </div>
</div>
{{ $cargado == true ? $anuncios->links() : null }}
