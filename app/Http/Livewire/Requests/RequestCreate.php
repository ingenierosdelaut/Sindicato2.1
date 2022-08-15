<?php

namespace App\Http\Livewire\Requests;

use App\Models\Request;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;



class RequestCreate extends Component
{
    use WithPagination;
    public Request $request;
    public $estado;
    public Usuario $usuario;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->request = new Request();
    }

    public function render()
    {
        $requests = Request::where('id_usuario', auth()->user()->id)
        ->orderby('created_at', 'desc')
        ->paginate(3);
        $usuarios = Usuario::all();
        return view('livewire.requests.requests-create', compact('usuarios', 'requests'))->layout('layouts.app-user')->slot('slotUser');
    }

    public function crear()
    {
        $this->request->id_usuario = auth()->user()->id;
        $this->request->estado = 0;
        $this->validate();
        $this->request->save();
        $this->emit('alerta-request-create', 'Se realizó la solicitud con exito');
        return redirect(route('requests.create'));
    }

    public function edit($id)
    {
        Request::find($id)->fill(['fecha' => $this->request['fecha']])->save();
        $this->emit('edit-success', 'Se modificó la solicitud con éxito');

        return redirect(route('requests.create'));
    }


    protected function rules()
    {
        return RulesRequest::reglas();
    }
}
