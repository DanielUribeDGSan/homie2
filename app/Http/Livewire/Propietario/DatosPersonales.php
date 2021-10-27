<?php

namespace App\Http\Livewire\Propietario;

use App\Mail\MailProcesoTerminado;
use App\Mail\MailProcesoTerminadoPropietario;
use App\Models\Guest;
use App\Models\Owner;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DatosPersonales extends Component
{
    use WithFileUploads;

    protected $listeners = ['registrarFormulario'];

    public $escrituras, $contrato_compraventa, $poder_notarial, $comprobante_domicilio, $identificacion_oficial;


    public $createForm = [
        'titulo_propiedad' => "",
        'escrituras' => "",
        'contrato_compraventa' => "",
        'poder_notarial' => "",
        'comprobante_domicilio' => "",
        'admite_mascotas' => "",
        'cantidad_mascotas' => "",
        'tiene_estacionamiento' => "",
        'servicios' => "",
        'esta_amueblado' => "",
        'identificacion_oficial' => "",
        'metodo_pago' => "",
        'numero_cuenta' => "",
        'puede_facturar' => "",
        'precio' => "",
        'direccion' => "",
    ];

    protected $rules = [
        'createForm.admite_mascotas' => "required|max:255",
        'createForm.tiene_estacionamiento' => "required|max:255",
        'createForm.servicios' => "required|max:255",
        'createForm.esta_amueblado' => "required|max:255",
        'createForm.metodo_pago' => "required|max:255",
        'createForm.puede_facturar' => "required|max:255",
        'createForm.precio' => "required|max:255",
        'createForm.direccion' => "required|max:255",
    ];

    protected $validationAttributes = [
        'createForm.admite_mascotas' => "¿Admite mascotas?",
        'createForm.tiene_estacionamiento' => "¿Tiene estacionamiento?",
        'createForm.servicios' => "Servicios",
        'createForm.esta_amueblado' => "¿Se encuentra amueblado?",
        'createForm.metodo_pago' => "Método de pago - como va a recibir el pago",
        'createForm.puede_facturar' => "¿El propietario puede facturar?",
        'createForm.precio' => "Precio de la propiedad",
        'createForm.direccion' => "Dirección",
    ];

    public function mount()
    {


        $invitado = Guest::where('transaction', Auth::user()->transaction)->first();
        if (!is_null($invitado)) {

            if ($invitado->precio && $invitado->direccion) {
                $this->createForm['precio'] = $invitado->precio;
                $this->createForm['direccion'] = $invitado->direccion;
            }
        }
    }

    public function registrarFormulario()
    {
        $this->validate();
        if ($this->escrituras || $this->contrato_compraventa || $this->poder_notarial && $this->comprobante_domicilio && $this->identificacion_oficial) {

            $this->createForm['escrituras'] = $this->escrituras->store('propietario/escrituras');
            $this->createForm['contrato_compraventa'] = $this->contrato_compraventa->store('propietario/contrato_compraventa');
            $this->createForm['poder_notarial'] = $this->poder_notarial->store('propietario/poder_notarial');
            $this->createForm['comprobante_domicilio'] = $this->comprobante_domicilio->store('propietario/comprobante_domicilio');
            $this->createForm['identificacion_oficial'] = $this->identificacion_oficial->store('propietario/identificacion_oficial');



            $propietario = Owner::create([
                'transaction' => Auth::user()->transaction,
                'user_id' => Auth::user()->id,
                'escrituras' => trim(
                    $this->createForm['escrituras']
                ),
                'contrato_compra_venta' => trim(
                    $this->createForm['contrato_compraventa']
                ),
                'poder_notarial' => trim(
                    $this->createForm['poder_notarial']
                ),
                'comprobante_domicilio' => trim(
                    $this->createForm['comprobante_domicilio']
                ),
                'admite_mascotas' => trim(
                    $this->createForm['admite_mascotas']
                ),
                'cantidad_mascotas' => trim(
                    $this->createForm['cantidad_mascotas']
                ),
                'tiene_estacionamiento' => trim(
                    $this->createForm['tiene_estacionamiento']
                ),
                'servicios' => trim(
                    $this->createForm['servicios']
                ),
                'esta_amueblado' => trim(
                    $this->createForm['esta_amueblado']
                ),
                'identificacion_oficial' => trim(
                    $this->createForm['identificacion_oficial']
                ),
                'metodo_pago' => trim(
                    $this->createForm['metodo_pago']
                ),
                'numero_cuenta' => trim(
                    $this->createForm['numero_cuenta']
                ),
                'puede_facturar' => trim(
                    $this->createForm['puede_facturar']
                ),
                'precio_propiedad' => trim(
                    $this->createForm['precio']
                ),
                'direccion' => trim(
                    $this->createForm['direccion']
                ),
            ]);

            $user = User::where('id', Auth::user()->id)->first();
            $user->update(
                [
                    'fase' => 2,
                ]
            );
            Mail::to(Auth::user()->email)->send(new MailProcesoTerminado($user));

            $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
            if (!is_null($user_invitacion)) {
                if ($user_invitacion->hasRole('broker')) {
                    Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoPropietario($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                }
                if ($user_invitacion->hasRole('arendatario')) {
                    Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoPropietario($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                }
            }
            return redirect()->route('registro_completado');
        } else {
            $this->emit('errorDocumentosPropietario');
        }
    }

    public function render()
    {
        return view('livewire.propietario.datos-personales');
    }
}
