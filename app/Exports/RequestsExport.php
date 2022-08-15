<?php

namespace App\Exports;

use App\Models\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class RequestsExport implements FromView, WithColumnWidths
{
    public function view(): View
    {
        return view('livewire.admin.requestsExcel', [
            'requests' => Request::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->select(
                    'requests.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 35,
            'C' => 11,
            'D' => 20,
            'E' => 165,
        ];
    }
}
