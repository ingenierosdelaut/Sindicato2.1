<?php

namespace App\Http\Livewire\Admin;

use App\Exports\FilterUserExport;
use App\Exports\UsuariosExport;
use App\Exports\UsuariosExports;
use App\Models\Usuario;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class UsuarioIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $cargado = false;
    public $estado;

    public function mount()
    {
        $this->usuario = new Usuario();
    }

    public function render()
    {
        $usuarios = ($this->cargado == true) ? Usuario::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->orwhere('tipo_agremiado', 'LIKE', '%' . $this->search . '%')
            ->orwhere('apellido', 'LIKE', '%' . $this->search . '%')
            ->orwhere('estado', 'LIKE', '%' . $this->search . '%')
            ->orwhere('puestoA', 'LIKE', '%' . $this->search . '%')
            ->orwhere('puestoD', 'LIKE', '%' . $this->search . '%')
            ->orwhere('carrera', 'LIKE', '%' . $this->search . '%')
            ->orwhere('is_admin', 'LIKE', '%' . $this->search . '%')
            ->orwhere('departamento', 'LIKE', '%' . $this->search . '%')
            ->orderBy('is_admin', 'desc')
            ->paginate(10) : [];
        return view('livewire.admin.usuario-index', compact('usuarios'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function generatePDF($search = null)
    {
        $iduser = auth()->user()->id;
        $data = Usuario::find($iduser);
        $now = Carbon::now();
        $date = $now->format('d-m-Y');

        if ($search != '') {

            $usuarios = Usuario::where('nombre', 'LIKE', '%' . $search . '%')
                ->orwhere('tipo_agremiado', 'LIKE', '%' . $search . '%')
                ->orwhere('apellido', 'LIKE', '%' . $search . '%')
                ->orwhere('estado', 'LIKE', '%' . $search . '%')
                ->orwhere('puestoA', 'LIKE', '%' . $search . '%')
                ->orwhere('puestoD', 'LIKE', '%' . $search . '%')
                ->orwhere('carrera', 'LIKE', '%' . $search . '%')
                ->orwhere('is_admin', 'LIKE', '%' . $search . '%')
                ->orwhere('departamento', 'LIKE', '%' . $search . '%')->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfUsers', ['usuarios' => $usuarios, 'data' => $data, 'date' => $date]);
            return $pdf->setPaper('a4', 'landscape')->stream();
        } else {
            $usuarios = Usuario::all();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfUsers', ['usuarios' => $usuarios, 'data' => $data, 'date' => $date]);
            return $pdf->setPaper('a4', 'landscape')->stream();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new UsuariosExports, 'usuarios.xlsx');
    }


    public function cargando()
    {
        $this->cargado = true;
    }

    public function disable($id)
    {
        $this->emit('alert-user-disabled', 'Este usuario ha sido inhabilitado');
        Usuario::find($id)->fill(['estado' => 0])->save();
    }

    public function enable($id)
    {
        $this->emit('alert-user-enable', 'Has habilitado correctamente al usuario');
        Usuario::find($id)->fill(['estado' => 1])->save();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return ReglaEstado::reglas();
    }
}
