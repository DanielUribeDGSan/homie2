<?php

namespace App\Http\Livewire;

use App\Mail\MailRegister;
use App\Models\Guest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormRegisterInquilino extends Component
{
    protected $listeners = ['registrarFormulario'];
    public $transaccion_user, $email_user;

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
        'password' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255|unique:users,email',
        'createForm.password' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'Email',
        'createForm.password' => 'Contraseña',
    ];

    public function mount()
    {
        if ($this->transaccion_user && $this->email_user) {

            $invitado = Guest::where('transaction', $this->transaccion_user)->where('email', $this->email_user)->first();

            $this->createForm['name'] = $invitado->name;
            $this->createForm['last_name'] = $invitado->last_name;
            $this->createForm['email'] = $invitado->email;
            $this->createForm['phone'] = $invitado->phone;
        }
    }


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


        $user->assignRole('arendatario');
        Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        $randomNumber = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $userRegister = User::where('email', $this->createForm['email'])->first();


        $transaction = strval($userRegister->id) . str_shuffle(strval($randomNumber));


        if ($this->transaccion_user && $this->email_user) {
            $userRegister->update(
                [
                    'transaction' => $this->transaccion_user,
                ]
            );
        } else {
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
        }


        Auth::login($user);

        if ($this->transaccion_user && $this->email_user) {
            $userRegister->update(
                [
                    'fase' => 1,
                ]
            );
            return redirect()->route('inquilino.datos_personales');
        } else {
            return redirect()->route('inquilino.datos_propietario', $transaction);
        }
    }
    public function render()
    {
        return view('livewire.form-register-inquilino');
    }
}
