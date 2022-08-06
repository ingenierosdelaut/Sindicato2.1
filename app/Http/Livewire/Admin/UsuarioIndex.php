<?php

namespace App\Http\Livewire\Admin;

use App\Exports\FilterUserExport;
use App\Exports\UsuariosExport;
use App\Exports\UsuariosExports;
use App\Models\Usuario;
use Illuminate\Support\Facades\App;
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
            ->orwhere('nombre', 'LIKE', '%' . $this->search . '%')
            ->orwhere('apellido', 'LIKE', '%' . $this->search . '%')
            ->orwhere('estado', 'LIKE', '%' . $this->search . '%')
            ->orwhere('puestoA', 'LIKE', '%' . $this->search . '%')
            ->orwhere('puestoD', 'LIKE', '%' . $this->search . '%')
            ->orwhere('carrera', 'LIKE', '%' . $this->search . '%')
            ->orwhere('departamento', 'LIKE', '%' . $this->search . '%')
            ->paginate(10) : [];
        return view('livewire.admin.usuario-index', compact('usuarios'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function generarPDF()
    {
        $iduser = auth()->user()->id;
        $data = Usuario::find($iduser);
        $usuarios = Usuario::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('livewire.admin.pdfUsers', ['usuarios' => $usuarios, 'data' => $data], ['date' => date('Y-m-d')]);
        return $pdf->setPaper('a4', 'landscape')->stream();
    }

    public function exportExcel()
    {
        // $users = app(Usuario::class)->newQuery();

        // if (request()->has('search') && !empty(request()->get('search'))) {
        //     $search = request()->query('search');
        //     $users->where(function ($query) use ($search) {
        //         $query->where('nombre', 'LIKE', "%{$search}%")
        //             ->orWhere('apellido', 'LIKE', "%{$search}%")
        //             ->orWhere('estado', 'LIKE', "%{$search}%")
        //             ->orWhere('tipo_agremiado', 'LIKE', "%{$search}%")
        //             ->orWhere('puestoA', 'LIKE', "%{$search}%")
        //             ->orWhere('puestoD', 'LIKE', "%{$search}%")
        //             ->orWhere('carrera', 'LIKE', "%{$search}%");
        //     });
        // }
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
