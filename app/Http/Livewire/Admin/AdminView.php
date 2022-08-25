<?php

namespace App\Http\Livewire\Admin;

use App\Models\Anuncio;
use App\Models\Request;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class AdminView extends Component
{
    use WithPagination;

    public $cargado = false;

    public $search = '';

    public function mount()
    {
        $this->usuario = new Usuario();
    }

    public function render()
    {
        $anuncios = Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')
            ->where('titulo', 'LIKE', '%'.$this->search.'%')
            ->orwhere('contenido', 'LIKE', '%'.$this->search.'%')
            ->select(
                'anuncios.*',
                'usuarios.nombre',
                'usuarios.apellido'
            )->latest()->paginate(10);
        $requests = Request::where('estado', 0)->count();

        return view('livewire.admin.admin-view', compact('anuncios', 'requests'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function disable($id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio['estado'] = 0;
        $anuncio->save();
        $this->emit('alert-anuncio-disabled', 'Has desactivado el anuncio.');
    }

    public function cargando()
    {
        $this->cargado = true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
