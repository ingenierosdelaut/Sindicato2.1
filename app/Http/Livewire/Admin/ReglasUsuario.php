<?php

namespace App\Http\Livewire\Admin;

class ReglasUsuario
{
    public static function reglas($id = null)
    {
        return [
            'usuario.nombre' => 'required|string',
            'usuario.apellido' => 'required|string',
            'usuario.email' => 'required|email|unique:usuarios,email,' . $id,
            'usuario.telefono' => 'nullable|string|max:11',
            'usuario.estadoCivil' => 'nullable|string',
            'usuario.ciudad' => 'nullable|string',
            'usuario.estado_m' => 'nullable|string',
            'usuario.postal' => 'nullable|string',
            'usuario.nacimiento' => 'nullable|date',
            'usuario.colonia' => 'nullable|string',
            'usuario.nacionalidad' => 'nullable|string',
            'usuario.gradoMax' => 'nullable|string',
            'usuario.lvl_ingles' => 'nullable|string',
            'usuario.domicilio' => 'nullable|string',
            'usuario.puestoA' => 'nullable|string',
            'usuario.puestoD' => 'nullable|string',
            'usuario.carrera' => 'nullable|string',
            'usuario.departamento' => 'nullable|string',
            'usuario.tipo_agremiado' => 'required|string',
            'usuario.Nempleado' => 'nullable|string',
            'usuario.titulo_grado' => 'nullable|string',
            'usuario.grado_estado' => 'nullable|string',
            'usuario.vigencia_certificado' => 'nullable|string',
            'usuario.fecha_ingreso' => 'nullable|date',
            'usuario.fecha_afiliacion' => 'nullable|date',
            'usuario.curp' => 'nullable|string|max:18',
            'usuario.rfc' => 'nullable|string|max:13',
            'usuario.ine' => 'nullable|string|max:18',
            'usuario.nombreP' => 'nullable|string',
            'usuario.parentesco' => 'nullable|string',
            'usuario.telContacto' => 'nullable|string|max:11',
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
