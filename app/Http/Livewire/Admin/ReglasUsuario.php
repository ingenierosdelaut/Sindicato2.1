<?php

namespace App\Http\Livewire\Admin;

class ReglasUsuario
{
    public static function reglas($id = null)
    {
        return [
            'usuario.nombre' => 'required|string',
            'usuario.apellido' => 'required|string',
            'usuario.email' => 'required|email|unique:usuarios,email,'.$id,
            'usuario.telefono' => 'required|string|max:11',
            'usuario.estadoCivil' => 'required|string',
            'usuario.ciudad' => 'required|string',
            'usuario.nacimiento' => 'required|date',
            'usuario.colonia' => 'required|string',
            'usuario.nacionalidad' => 'required|string',
            'usuario.gradoMax' => 'required|string',
            'usuario.domicilio' => 'required|string',
            'usuario.puestoA' => 'nullable|string',
            'usuario.puestoD' => 'nullable|string',
            'usuario.carrera' => 'nullable|string',
            'usuario.departamento' => 'nullable|string',
            'usuario.tipo_agremiado' => 'required|string',
            'usuario.fecha_ingreso' => 'required|date',
            'usuario.fecha_afiliacion' => 'required|date',
            'usuario.curp' => 'required|string|max:18',
            'usuario.rfc' => 'required|string|max:13',
            'usuario.ine' => 'required|string|max:18',
            'usuario.nombreP' => 'required|string',
            'usuario.parentesco' => 'required|string',
            'usuario.telContacto' => 'required|string|max:11',
        ];
    }

    public static function reglasPWD($id = null)
    {
        $validarpassword = ($id) ? 'required|min:8' : 'required|min:8';

        return [
            'password' => $validarpassword,
            'confirm_password' => 'same:password|required',

        ];
    }
}
