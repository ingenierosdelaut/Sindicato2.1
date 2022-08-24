<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Livewire\Component;

class AdminShow extends Component
{
    public Usuario $usuario;

    public function render()
    {
        return view('livewire.admin.admin-show')->layout('layouts.app-admin')->slot('slotAdmin');
    }
}
