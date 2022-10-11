<?php

namespace App\Exports;

use App\Models\Usuario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class UsuariosExports implements FromView, WithColumnWidths
{
    public function view(): View
    {
        return view('livewire.admin.usuariosExcel', [
            'usuarios' => Usuario::all(),
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 11,
            'E' => 12,
            'F' => 13,
            'G' => 20,
            'H' => 15,
            'I' => 20,
            'J' => 15,
            'K' => 24,
            'L' => 30,
            'M' => 23,
            'N' => 15,
            'O' => 16,
            'P' => 20,
            'Q' => 19,
            'R' => 18,
            'S' => 35,
            'T' => 12,
            'U' => 11,
            'V' => 11,
            'W' => 11,
            'X' => 11,
            'Y' => 11,
        ];
    }
}
