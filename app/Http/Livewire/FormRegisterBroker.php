<?php

namespace App\Http\Livewire;

use App\Mail\MailRegister;
use App\Models\Guest;
use App\Models\Referred;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormRegisterBroker extends Component
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
        'createForm.email' => 'E-mail',
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


        $user->assignRole('broker');
        Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        $randomNumber = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $randomNumber2 = mt_rand(10, 99)
            . mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)];

        $userRegister = User::where('email', $this->createForm['email'])->first();

        $transaction = strval($userRegister->id) . str_shuffle(strval($randomNumber));
        $referido = strval($userRegister->id) . substr($this->createForm['name'], 0, 2) . str_shuffle(strval($randomNumber2)) . substr($this->createForm['last_name'], 0, 2);

        $userRegister->update(
            [
                'transaction' => $transaction,
                'referred_id' => strtolower($referido)
            ]
        );
        Transaction::create(
            [
                'transaction' => $transaction,
                'user_id' => $userRegister->id
            ]
        );

        Referred::create(
            [
                'referred_id' => strtolower($referido),
                'user_id' => $userRegister->id
            ]
        );
        Auth::login($user);
        if ($this->transaccion_user && $this->email_user) {
            return redirect()->route('registro-completado');
        } else {
            return redirect()->route('broker.datos_propietario_inquilino', $transaction);
        }
    }
    public function render()
    {
        return view('livewire.form-register-broker');
    }
}
