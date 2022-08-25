<?php

namespace App\Exports;

use App\Models\Descarga;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DescargasExport implements FromView, WithColumnWidths
{
    public $search;

    public function view(): View
    {
        return view('livewire.admin.descargasExcel', [
            'descargas' => Descarga::join('usuarios', 'usuario_id', '=', 'usuarios.id')
                ->join('documentos', 'doc_id', '=', 'documentos.id')
                ->select(
                    'descargas.*',
                    'documentos.titulo',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get(),
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 35,
            'C' => 45,
            'D' => 18,
        ];
    }
}
