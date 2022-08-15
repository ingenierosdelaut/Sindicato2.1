<?php

namespace App\Http\Livewire\Admin;

use App\Exports\DescargasExport;
use App\Models\Descarga;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class DescargasIndex extends Component
{
    public function mount()
    {
        $this->descarga = new Descarga();
    }

    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $cargado = false;
    public function render()
    {
        $descargas = Descarga::join('usuarios', 'usuario_id', '=', 'usuarios.id')
            ->join('documentos', 'doc_id', '=', 'documentos.id')
            ->where('titulo', 'LIKE', '%' . $this->search . '%')
            ->orwhere('nombre', 'LIKE', '%' . $this->search . '%')
            ->orwhere('apellido', 'LIKE', '%' . $this->search . '%')
            ->select(
                'descargas.*',
                'documentos.titulo',
                'usuarios.nombre',
                'usuarios.apellido'
            )->orderBy('descargas.created_at', 'asc')->paginate(5);
        return view('livewire.admin.descargas-index', compact('descargas'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function generatePDF($search = null)
    {
        $iduser = auth()->user()->id;
        $data = Usuario::find($iduser);
        $now = Carbon::now();
        $date = $now->format('d-m-Y');

        if ($search != '') {

            $descargas = Descarga::join('usuarios', 'usuario_id', '=', 'usuarios.id')
                ->join('documentos', 'doc_id', '=', 'documentos.id')
                ->where('titulo', 'LIKE', '%' . $search . '%')
                ->orwhere('nombre', 'LIKE', '%' . $search . '%')
                ->orwhere('apellido', 'LIKE', '%' . $search . '%')
                ->select(
                    'descargas.*',
                    'documentos.titulo',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfDescargas', ['descargas' => $descargas, 'data' => $data, 'date' => $date]);
            return $pdf->setPaper('a4', 'landscape')->stream();
        } else {
            $descargas = Descarga::join('usuarios', 'usuario_id', '=', 'usuarios.id')
                ->join('documentos', 'doc_id', '=', 'documentos.id')
                ->select(
                    'descargas.*',
                    'documentos.titulo',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfDescargas', ['descargas' => $descargas, 'data' => $data, 'date' => $date]);
            return $pdf->setPaper('a4', 'landscape')->stream();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new DescargasExport, 'Descargas.xlsx');
    }

    public function cargando()
    {
        $this->cargado = true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
