<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsuariosEdit extends Component
{
    public Usuario $usuario;

    public $confirm_password;

    public $password;

    public $rfc;

    public $curp;

    public $ine;

    public $tipo_agremiado;

    public $puestoA;

    public $puestoD;

    public $carrera;

    public $departamento;

    public function render()
    {
        return view('livewire.admin.usuarios-edit')->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function editar()
    {
        $this->validate();
        if ($this->password) {
            $this->usuario->password = Hash::make($this->password);
        }
        if ($this->usuario->tipo_agremiado === 'Administrativo') {
            $this->usuario->puestoD = null;
            $this->usuario->carrera = null;
        } elseif ($this->usuario->tipo_agremiado === 'Docente') {
            $this->usuario->puestoA = null;
            $this->usuario->departamento = null;
        }

        $this->usuario->curp = strtoupper($this->usuario->curp);
        $this->usuario->rfc = strtoupper($this->usuario->rfc);
        $this->usuario->ine = strtoupper($this->usuario->ine);
        $this->usuario->save();
        $this->emit('alert-user-edit', 'Se ha modificado correctamente al usuario');

        return redirect(route('admin.usuarios'));
    }

    protected function rules()
    {
        return ReglasUsuario::reglas($this->usuario->id);
    }
}
