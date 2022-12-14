<?php

namespace App\Http\Livewire\Admin;

use App\Exports\RequestsExport;
use App\Http\Livewire\Requests\ReglasMotivo;
use App\Models\Request;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Solicitud extends Component
{
    use WithPagination;

    public Request $request;

    public $estado;

    protected $paginationTheme = 'bootstrap';

    public $cargado = false;

    public $search = '';

    public $f1;

    public $f2;

    public function mount()
    {
        $this->request = new Request();
    }

    public function render()
    {
        $f1 = Carbon::now()->subDays(30);
        $f2 = Carbon::now();
        $requests = Request::select("*")->whereBetween('created_at', [$f1, $f2])->get();

        $requests = Request::join('usuarios', 'id_usuario', '=', 'usuarios.id')
            ->where('nombre', 'LIKE', '%' . $this->search . '%')
            ->orwhere('fecha', 'LIKE', '%' . $this->search . '%')
            ->orwhere('motivo', 'LIKE', '%' . $this->search . '%')
            ->select(
                'requests.*',
                'usuarios.nombre',
                'usuarios.apellido'
            )
            ->orderby('estado', 'asc')
            ->paginate(6);
        return view('livewire.admin.solicitud', compact('requests'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function aceptar($id)
    {
        Request::find($id)->fill(['estado' => 1])->save();
    }

    public function motivo($id)
    {
        $this->validate();
        Request::find($id)->fill(['estado' => 2, 'motivo' => $this->request['motivo']])->save();
        $this->emit('alert-request-denied', 'Se ha enviando el motivo por el cual se denegó solicitud');

        return redirect(route('admin.solicitudes'));
    }

    public function cancelar($id)
    {
        $this->validate();
        Request::find($id)->fill(['estado' => 3, 'motivo' => $this->request['motivo']])->save();
        $this->emit('alert-request-canceled', 'Se ha enviando el motivo por el cual se canceló la solicitud');
    }


    public function generarPDF()
    {
        $requests = Request::join('usuarios', 'id_usuario', '=', 'usuarios.id')->select(
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
            $requests = Request::join('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->where('nombre', 'LIKE', 'F%' . $search . '%')
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
            $requests = Request::join('usuarios', 'id_usuario', '=', 'usuarios.id')
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

    public function filtro()
    {
        $f1 = Carbon::now()->subDays(30);
        $f2 = Carbon::now();
        $requests = Request::select("*")->whereBetween('created_at', [$f1, $f2])->get();
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

    
}
