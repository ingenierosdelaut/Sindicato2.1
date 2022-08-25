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

class UsuariosExports implements FromView, WithColumnWidths, WithBackgroundColor
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
        ];
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path(''));
    //     $drawing->setHeight(110);
    //     $drawing->setWidth(110);
    //     $drawing->setCoordinates('A1');

    //     return $drawing;
    // }

    public function backgroundColor()
    {
        // Return RGB color code.
        // return '000000';

        // Return a Color instance. The fill type will automatically be set to "solid"
        // return new Color(Color::COLOR_BLUE);

        // Or return the styles array
        return [
            //  'fillType'   => Fill::FILL_SOLID,
            'startColor' => ['argb' => Color::COLOR_DARKGREEN],
        ];
    }
}

// class FilterUserExport implements FromView, ShouldAutoSize, WithEvents
// {
//     private $users;

//     public function __construct($users)
//     {
//         $this->users = $users;
//     }

//     //  * @return View

//     public function view(): View
//     {
//         return view('livewire.admin.usuariosExcel', ['users' => $this->users]);
//     }

//     //  @return array

//     public function registerEvents(): array
//     {
//         return [
//             AfterSheet::class => function (AfterSheet $event) {
//                 $event->sheet->getDelegate()->setRightToLeft(false);
//             },
//         ];
//     }
// }
