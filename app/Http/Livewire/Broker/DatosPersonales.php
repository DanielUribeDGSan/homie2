<?php

namespace App\Http\Livewire\Broker;

use App\Mail\MailInvitacionInquilino;
use App\Mail\MailInvitacionPropietario;
use App\Mail\MailProcesoTerminado;
use App\Models\Guest;
use App\Models\Referred;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DatosPersonales extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $transaccion_user, $codeRefered;

    public $createFormReferido = [
        'referred_guest' => "",

    ];

    public $createForm = [
        'precio' => "",
        'direccion' => "",
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
    ];

    public $createForm2 = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
    ];

    protected $rules = [
        'createForm.precio' => 'required|max:255',
        'createForm.direccion' => 'required|max:255',
        'createForm.name' => 'required|max:255',
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255',
        'createForm2.name' => 'required|max:255',
        'createForm2.last_name' => 'required|max:255',
        'createForm2.phone' => 'required|max:20',
        'createForm2.email' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.precio' => 'Precio de la propiedad',
        'createForm.direccion' => 'Dirección',
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'Email',
        'createForm2.name' => 'Nombre',
        'createForm2.last_name' => 'Apellidos',
        'createForm2.phone' => 'Teléfono',
        'createForm2.email' => 'Email',
    ];

    public function validarCodigo()
    {

        $code = Referred::where('referred_id', $this->createFormReferido['referred_guest'])->first();
        if (!is_null($code)) {
            $this->codeRefered = $this->createFormReferido['referred_guest'];
            $this->emit('successCode');
        } else {
            $this->emit('errorCode');
        }
    }

    public function registrarFormulario()
    {
        $this->validate();

        $user = Guest::create([
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
            'transaction' => trim(
                $this->transaccion_user
            ),
            'type' => 'propietario',
            'precio' => trim(
                $this->createForm['precio']
            ),
            'direccion' => trim(
                $this->createForm['direccion']
            ),
        ]);

        if ($this->createForm2['email']) {

            $user = Guest::create([
                'name' => trim(
                    $this->createForm2['name']
                ),
                'last_name' => trim(
                    $this->createForm2['last_name']
                ),
                'phone' => trim(
                    $this->createForm2['phone']
                ),
                'email' => trim(
                    $this->createForm2['email']
                ),
                'transaction' => trim(
                    $this->transaccion_user
                ),
                'type' => 'broker',
            ]);
        }
        $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();
        $inquilino = User::where('id', $transaction_user->user_id)->first();
        $inquilino->update(
            [
                'fase' => 1,
                'referred_guest' => $this->codeRefered
            ]
        );
        Mail::to($this->createForm['email'])->send(new MailInvitacionPropietario($user, $inquilino, $this->createForm['email']));

        Mail::to($this->createForm2['email'])->send(new MailInvitacionInquilino($user, $inquilino, $this->createForm2['email']));

        Mail::to(Auth::user()->email)->send(new MailProcesoTerminado($inquilino));

        return redirect()->route('invitar_brokers');
    }

    public function render()
    {
        return view('livewire.broker.datos-personales');
    }
}
