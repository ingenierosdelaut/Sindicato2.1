<?php

namespace App\Http\Livewire\Admin;

use App\Exports\RequestsExport;
use App\Http\Livewire\Requests\ReglasMotivo;
use App\Models\Solicitud;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Solicitudes extends Component
{
    use WithPagination;

    public Solicitud $request;

    public $estado;

    protected $paginationTheme = 'bootstrap';

    public $cargado = false;

    public $search = '';

    public $searchBettwen = false;

    public $f1;

    public $f2;

    public function mount()
    {
        $this->request = new Solicitud();
    }


    public function render(Request $request)
    {
        if ($this->search != '') {
            $this->searchBettwen = false;
        }
        if ($this->searchBettwen) {
            $requests = Solicitud::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->whereBetween('fecha', [$this->f1, $this->f2])
                ->select(
                    'solicituds.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )

                ->orderby('estado', 'asc')
                ->paginate(6);
        } else {
            $requests = Solicitud::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->where('usuarios.nombre', 'LIKE', '%' . $this->search . '%')
                ->orwhere('solicituds.fecha', 'LIKE', '%' . $this->search . '%')
                ->orwhere('solicituds.estado', 'LIKE', '%' . $this->search . '%')
                ->select(
                    'solicituds.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )

                ->orderby('estado', 'asc')
                ->paginate(6);
        }

        return view('livewire.admin.solicitudes', compact('requests'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function filtroFecha($active)
    {
        $this->searchBettwen = $active;
    }

    public function aceptar($id)
    {
        Solicitud::find($id)->fill(['estado' => 1])->save();
    }

    public function motivo($id)
    {
        $this->validate();
        Solicitud::find($id)->fill(['estado' => 2, 'motivo' => $this->request['motivo']])->save();
        $this->emit('alert-request-denied', 'Se ha enviando el motivo por el cual se denegó solicitud');

        return redirect(route('admin.solicitudes'));
    }

    public function cancelar($id)
    {
        $this->validate();
        Solicitud::find($id)->fill(['estado' => 3, 'motivo' => $this->request['motivo']])->save();
        $this->emit('alert-request-canceled', 'Se ha enviando el motivo por el cual se canceló la solicitud');
    }


    public function generarPDF()
    {
        $requests = Solicitud::join('usuarios', 'id_usuario', '=', 'usuarios.id')->select(
            'requests.*',
            'usuarios.nombre',
            'usuarios.apellido'
        )->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('livewire.admin.pdfSolicitudes', ['requests' => $requests]);

        return $pdf->stream();
    }

    public function generatePDF($search = null)
    {
        $iduser = auth()->user()->id;
        $data = Usuario::find($iduser);
        $now = Carbon::now();
        $date = $now->format('d-m-Y');

        if ($search != '') {
            $requests = Solicitud::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->where('nombre', 'LIKE', '%' . $search . '%')
                ->orwhere('fecha', 'LIKE', '%' . $search . '%')
                ->orwhere('motivo', 'LIKE', '%' . $search . '%')
                ->select(
                    'requests.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfSolicitudes', ['requests' => $requests, 'data' => $data, 'date' => $date]);

            return $pdf->setPaper('a4', 'landscape')->stream();
        } else {
            $requests = Solicitud::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->select(
                    'requests.*',
                    'usuarios.nombre',
                    'usuarios.apellido'
                )->get();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('livewire.admin.pdfSolicitudes', ['requests' => $requests, 'data' => $data, 'date' => $date]);

            return $pdf->setPaper('a4', 'landscape')->stream();
        }
    }



    public function exportExcel()
    {
        return Excel::download(new RequestsExport, 'Solicitudes.xlsx');
    }

    public function cargando()
    {
        $this->cargado = true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected function rules()
    {
        return ReglasMotivo::reglas();
    }
}
