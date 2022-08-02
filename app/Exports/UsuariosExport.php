<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

/**class UsuariosExport implements FromCollection
{

 * @return \Illuminate\Support\Collection
 *
 *public function collection()
    {
        return Usuario::all();
    }
}
 */

class UsuariosExport implements FromView, WithColumnWidths, WithDrawings, WithBackgroundColor
{
    public function view(): View
    {
        return view('livewire.admin.usuariosExcel', [
            'usuarios' => Usuario::all()
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
            'K' => 14,
            'L' => 30,
            'M' => 20,
            'N' => 20,
            'O' => 15,
            'P' => 20,
            'Q' => 16,
            'R' => 18,
            'S' => 16,
            'T' => 25,
            'U' => 11,
            'V' => 11,
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('static/images/sututslrc.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A5');

        return $drawing;
    }

    public function backgroundColor()
    {
        // Return RGB color code.
        // return '000000';

        // Return a Color instance. The fill type will automatically be set to "solid"
        // return new Color(Color::COLOR_BLUE);

        // Or return the styles array
        return [
             'fillType'   => Fill::FILL_SOLID,
             'startColor' => ['argb' => Color::COLOR_DARKGREEN],
        ];
    }
}
