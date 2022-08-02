<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminEdit extends Component
{
    public Usuario $usuario;
    public $confirm_password;
    public $password;

    public function render()
    {
        $idUser = Auth::user()->id;
        $this->usuario = Usuario::find($idUser);
        return view('livewire.admin.admin-edit')->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function editarAdmin()
    {
        $this->validate();
        if ($this->password) {
            $this->usuario->password = Hash::make($this->password);
        }
        $this->usuario->save();
        $this->emit('alert-user-admin-edit', 'Se ha modificado correctamente al administrador');
        return redirect(route('admin.view'));
    }

    protected function rules()
    {
        return ReglasAdmin::reglasedit($this->usuario->id);
    }
}
