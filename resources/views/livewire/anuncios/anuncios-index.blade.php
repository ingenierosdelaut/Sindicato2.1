<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/admin-view.css') }}">
    </head>


    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="grid" style="--bs-rows: 3; --bs-columns: 3;">
            <div class="">
                @if (count((array) $anuncios))
                    <div class="container contenedor">

                        <div class="jumbotron">
                            @foreach ($anuncios as $anuncio)
                                @if ($anuncio->estado == 1)
                                    <!--Anuncio-->
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <b>{{ $anuncio->titulo }}</b>
                                        </div>

                                        <div class="card-body ">
                                            <div class="container">
                                                <p>{{ $anuncio->contenido }}</p>
                                                @if ($anuncio->url_img)
                                                    <img class="img-fluid"
                                                        style="border-radius: 4px; width: 450px; height: 250px"
                                                        src="{{ Storage::disk('public')->url($anuncio->url_img) }}">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="card-footer h-10">
                                            <footer>
                                                <small class="float-right text-muted muted"><b>Publicado el dia
                                                        {{ $anuncio->created_at }} por
                                                        {{ $anuncio->nombre }} {{ $anuncio->apellido }}</b></a></small>
                                            </footer>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="jumbotron">
                            <h1>
                                Sin anuncios por mostrar
                            </h1>
                        </div>
                @endif

            </div>
        </div>
    </div>

</div>
</div>
