<?php

namespace App\Exports;

use App\Models\Anuncio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AnunciosExport implements FromView, WithColumnWidths
{
    public function view(): View
    {
        return view('livewire.admin.anunciosExcel', [
            'anuncios' => Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->select(
                    'anuncios.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get(),
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 45,
            'C' => 168,
            'D' => 20,
            'E' => 29,
        ];
    }
}
