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

    public $f1 = '2022-10-08';

    public $f2 = '2022-10-15';

    public function mount()
    {
        $this->request = new Solicitud();
    }


    public function render(Request $request)
    {
        $requests = Solicitud::join('usuarios', 'id_usuario', '=', 'usuarios.id')
            ->whereBetween('fecha', [$this->f1, $this->f2])
            ->where('nombre', 'LIKE', '%' . $this->search . '%')
            ->orwhere('fecha', 'LIKE', '%' . $this->search . '%')
            ->orwhere('motivo', 'LIKE', '%' . $this->search . '%')
            ->select(
                'solicituds.*',
                'usuarios.nombre',
                'usuarios.apellido'
            )

            ->orderby('estado', 'asc')
            ->paginate(6);
        // dd($requests);

        return view('livewire.admin.solicitudes', compact('requests'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function filtrar()
    {
        // $requests = Solicitud::where('fecha', 'LIKE', '%', $this->f1)->orwhere('fecha', 'LIKE', '%', $this->f2);
        // whereDate('fecha', $request->f1)->whereDate('fecha', $request->f2)->get()
        // where('fecha', 'BETWEEN', '%' . 'and' . '%' .  $request->f1 . '%')->where('fecha', 'BETWEEN', '%' . 'and' . '%' .  $request->f2 . '%')->get()
        // $datos['requests'] = $requests;
        // whereBetween('fecha', [$request->f1, $request->f2])->get()
        // dd($datos);
        // dd($requests);
        // $requests = Solicitud::where('fecha', '>=', $request->f1)->where('fehca', '<=', $request->f2)->get();
        // $datos['requests'] = $requests;
        // dd($datos);
        // $f1 = $request->input('f1');
        // $f2 = $request->input('f2');
        // $requests = DB::table('solicituds')->select()->where('fecha', '>=', $request->f1)->where('fecha', '<=', $request->f2)->get();
        // dd($requests);
        $requests = Solicitud::whereBetween('fecha', [$this->f1, $this->f2])->get();
        return view('livewire.admin.solicitudes', compact('requests'));
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
