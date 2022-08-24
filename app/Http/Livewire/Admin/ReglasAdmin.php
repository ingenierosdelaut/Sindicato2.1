<?php

namespace App\Http\Livewire\Admin;


class ReglasAdmin
{
    public static function reglas($id = null)
    {
        return [
            'usuario.nombre' => 'required|string',
            'usuario.apellido' => 'required|string',
            'usuario.email' => 'required|email|unique:usuarios,email,' . $id,
        ];
    }

    public static function reglasedit($id = null)
    {
        $validarpassword = ($id) ? 'required|min:8' : 'required|min:8';
        return [
            'usuario.nombre' => 'nullable|string',
            'usuario.apellido' => 'nullable|string',
            'usuario.email' => 'nullable|email|unique:usuarios,email,' . $id,
            'password'=> $validarpassword,
            'confirm_password' => 'same:password|required'
        ];
    }
}
