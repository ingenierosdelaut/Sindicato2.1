<?php

namespace App\Exports;

use App\Models\Documento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DocumentosExport implements FromView, WithColumnWidths
{
    public function view(): View
    {
        return view('livewire.admin.documentosExcel', [
            'documentos' => Documento::all()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 3,
            'B' => 45,
            'C' => 8,
            'D' => 19,
        ];
    }
}
