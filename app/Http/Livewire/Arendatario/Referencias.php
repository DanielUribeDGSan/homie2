<?php

namespace App\Http\Livewire\Arendatario;

use App\Models\TenantReference;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Referencias extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'Email',
    ];

    public function registrarFormulario()
    {
        $this->validate();

        $user = TenantReference::create([
            'transaction' => Auth::user()->transaction,
            'user_id' => Auth::user()->id,
            'name' => trim(
                $this->createForm['name']
            ),
            'last_name' => trim(
                $this->createForm['last_name']
            ),
            'phone' => trim(
                $this->createForm['phone']
            ),
            'email' => trim(
                $this->createForm['email']
            ),
        ]);
        $inquilino = User::where('id', Auth::user()->id)->first();
        $inquilino->update(
            [
                'fase' => 3,
            ]
        );

        return redirect()->route('inquilino.roomies');
    }

    public function render()
    {
        return view('livewire.arendatario.referencias');
    }
}
