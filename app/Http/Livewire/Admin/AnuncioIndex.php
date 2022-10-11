<?php

namespace App\Http\Livewire\Admin;

use App\Exports\AnunciosExport;
use App\Models\Anuncio;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AnuncioIndex extends Component
{
    public function mount()
    {
        $this->anuncio = new Anuncio();
    }

    use WithPagination;
    use WithFileUploads;

    public $search = '';

    public $url_img;

    public $estado;

    public $cargado = false;

    public Anuncio $anuncio;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $anuncios = ($this->cargado == true) ? Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')
            ->where('titulo', 'LIKE', '%'.$this->search.'%')
            ->orwhere('contenido', 'LIKE', '%'.$this->search.'%')
            ->orwhere('nombre', 'LIKE', '%'.$this->search.'%')
            ->select(
                'anuncios.*',
                'usuarios.nombre',
                'usuarios.apellido',
                // 'usuarios.estado'
            )->orderby('created_at', 'desc')->paginate(10) : [];

        return view('livewire.admin.anuncio-index', compact('anuncios'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function generatePDF($search = null)
    {
        $iduser = auth()->user()->id;
        $data = Usuario::find($iduser);
        $now = Carbon::now();
        $date = $now->format('d-m-Y');

        if ($search != '') {
            $anuncios = Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->where('titulo', 'LIKE', '%'.$search.'%')
                ->orwhere('contenido', 'LIKE', '%'.$search.'%')
                ->orwhere('nombre', 'LIKE', '%'.$search.'%')
                ->select(
                    'anuncios.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfAnuncios', ['anuncios' => $anuncios, 'data' => $data, 'date' => $date]);

            return $pdf->setPaper('a4', 'landscape')->stream();
        } else {
            $anuncios = Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->select(
                    'anuncios.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfAnuncios', ['anuncios' => $anuncios, 'data' => $data, 'date' => $date]);

            return $pdf->setPaper('a4', 'landscape')->stream();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new AnunciosExport, 'Anuncios.xlsx');
    }

    public function disable($id)
    {
        $this->emit('alert-anuncio-disabled', 'Has desactivado a este anuncio.');
        $anuncio = Anuncio::find($id);
        $anuncio['estado'] = 0;
        $anuncio->save();
    }

    public function enable($id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio['estado'] = 1;
        $anuncio->save();
        $this->emit('alert-anuncio-enable', 'Has activado a este anuncio.');
    }

    public function delete(Anuncio $anuncio)
    {
        $anuncio->delete();
        $this->emit('alert-anuncio-delete', 'Has eliminado correctamente este anuncio');

        return redirect(route('admin.anuncios'));
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
