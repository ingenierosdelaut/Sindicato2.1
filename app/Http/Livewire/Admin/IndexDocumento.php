<?php

namespace App\Http\Livewire\Admin;

use App\Exports\DocumentosExport;
use App\Models\Documento;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class IndexDocumento extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    use WithFileUploads;

    public $cargado = false;

    public $url_doc;

    public Documento $documento;

    public $search = '';

    public function render()
    {
        $documentos = ($this->cargado == true) ? Documento::where('titulo', 'LIKE', '%'.$this->search.'%')
            ->orwhere('created_at', 'LIKE', '%'.$this->search.'%')
            ->orwhere('estado', 'LIKE', '%'.$this->search.'%')
            ->orderby('estado', 'desc')->paginate(10) : [];

        return view('livewire.admin.index-documento', compact('documentos'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function desactivar($id)
    {
        $documento = Documento::find($id);
        $documento['estado'] = 0;
        $documento->save();

        Storage::disk('public')->delete($documento['url_doc']);
        $this->emit('alert-documento-desactivar', 'Has desactivado el documento correctamente');

        return redirect(route('admin.documentos-index'));
    }

    public function generatePDF($search = null)
    {
        $iduser = auth()->user()->id;
        $data = Usuario::find($iduser);
        $now = Carbon::now();
        $date = $now->format('d-m-Y');

        if ($search != '') {
            $documentos = Documento::where('titulo', 'LIKE', '%'.$search.'%')
                ->orwhere('created_at', 'LIKE', '%'.$search.'%')
                ->orwhere('estado', 'LIKE', '%'.$search.'%')->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfDocumentos', ['documentos' => $documentos, 'data' => $data, 'date' => $date]);

            return $pdf->setPaper('a4', 'landscape')->stream();
        } else {
            $documentos = Documento::all();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfdocumentos', ['documentos' => $documentos, 'data' => $data, 'date' => $date]);

            return $pdf->setPaper('a4', 'landscape')->stream();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new DocumentosExport, 'Documentos.xlsx');
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
