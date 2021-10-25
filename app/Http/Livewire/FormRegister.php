<?php

namespace App\Http\Livewire;

use App\Mail\MailRegister;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class FormRegister extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
        'password' => "",
        'type' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255|unique:users,email',
        'createForm.password' => 'required|max:255',
        'createForm.type' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'Email',
        'createForm.password' => 'Contraseña',
        'createForm.type' => 'Tipo de usuario',
    ];

    public function registrarFormulario()
    {
        $this->validate();


        $user = User::create([
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
            'password' => trim(
                bcrypt($this->createForm['password'])
            ),
            'fase' => 0,

        ]);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        $randomNumber = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $userRegister = User::where('email', $this->createForm['email'])->first();

        $transaction = strval($userRegister->id) . str_shuffle(strval($randomNumber));

        $userRegister->update(
            [
                'transaction' => $transaction,
            ]
        );

        Transaction::create(
            [
                'transaction' => $transaction,
                'user_id' => $userRegister->id
            ]
        );

        if ($this->createForm['type'] == '1') {
            $user->assignRole('broker');
            Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));

            Auth::login($user);
            return redirect()->route('broker.datos_propietario_inquilino', $transaction);
        } else if ($this->createForm['type'] == '2') {
            $user->assignRole('propietario');
            Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));

            Auth::login($user);
            return redirect()->route('propietario.datos_inquilino', $transaction);
        } else if ($this->createForm['type'] == '3') {
            $user->assignRole('arendatario');
            Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));

            Auth::login($user);
            return redirect()->route('inquilino.datos_propietario', $transaction);
        }
    }

    public function render()
    {
        return view('livewire.form-register');
    }
}
