<?php

namespace App\Http\Livewire\Admin;

use App\Models\Anuncio;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnuncioCreate extends Component
{
    public function mount()
    {
        $this->anuncio = new Anuncio();
    }

    use WithFileUploads;

    public Anuncio $anuncio;

    public $url_img;

    public $estado;

    public function render()
    {
        $anuncios = Anuncio::where('id_usuario', auth()->user()->id)->paginate(5);

        return view('livewire.admin.anuncio-create', compact('anuncios'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function crearAnuncio()
    {
        $this->validate();
        $this->anuncio->id_usuario = auth()->user()->id;
        if ($this->url_img != null) {
            $this->anuncio->url_img = Storage::disk('public')->put('/images/anuncios', $this->url_img);
        }
        $this->anuncio->estado = 1;
        $this->anuncio->save();
        $this->emit('alert-anuncio-create', 'Se ha publicado correctamente el anuncio');

        return redirect(route('admin.view'));
    }

    public function rules()
    {
        return ReglasAnuncio::reglas();
    }
}
