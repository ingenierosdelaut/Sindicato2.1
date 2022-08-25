<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\ReglasAdmin;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAdmin extends Component
{
    public function mount()
    {
        $this->usuario = new Usuario();
    }

    use WithFileUploads;

    public Usuario $usuario;

    public $password;

    public $confirm_password;

    public $estado;

    public $is_admin;

    public function render()
    {
        return view('livewire.create-admin')->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function crearAdmin()
    {
        $this->validate();
        $this->usuario->password = Hash::make($this->password = 'sindicatout');
        $this->usuario->is_admin = 1;
        $this->usuario->estado = 1;
        $this->usuario->save();
        $this->emit('alert-user-admin-create', 'Has creado un nuevo administrador');

        return redirect(route('admin.usuarios'));
    }

    protected function rules()
    {
        return ReglasAdmin::reglas();
    }
}
