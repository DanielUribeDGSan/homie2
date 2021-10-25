<?php

namespace App\Http\Livewire\Invitaciones;

use App\Models\Guest;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class InvitacionPropietario extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $transaccion_user;

    public $createForm = [
        'name' => "",
        'phone' => "",
        'email' => "",
        'password' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255|unique:users,email',
        'createForm.password' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'Email',
        'createForm.password' => 'Contraseña',
    ];

    public function mount()
    {
        $propietario = Guest::where('transaction', $this->transaccion_user)->first();

        $this->createForm['name'] = $propietario->name;
        $this->createForm['email'] = $propietario->email;
        $this->createForm['phone'] = $propietario->phone;
    }

    public function registrarFormulario()
    {
        $this->validate();

        $user = User::create([
            'name' => trim(
                $this->createForm['name']
            ),
            'phone' => trim(
                $this->createForm['phone']
            ),
            'email' => trim(
                $this->createForm['email']
            ),
            'password' => trim(
                bcrypt($this->createForm['password'])
            )
        ]);

        $user->assignRole('propietario');

        // Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));
        Auth::login($user);
        return redirect()->route('arendatario.datos_propietario');
    }

    public function render()
    {
        return view('livewire.invitaciones.invitacion-propietario');
    }
}
