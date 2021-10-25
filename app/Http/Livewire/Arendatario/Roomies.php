<?php

namespace App\Http\Livewire\Arendatario;

use App\Mail\MailProcesoTerminado;
use App\Mail\MailProcesoTerminadoInquilino;
use App\Models\TenantRoomie;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Roomies extends Component
{
    use WithFileUploads;

    protected $listeners = ['registrarFormulario'];

    public $identificacion_oficial, $documentos;
    public $comprobante_nomina1, $comprobante_nomina2, $comprobante_nomina3;
    public $estado_cuenta1, $estado_cuenta2, $estado_cuenta3;

    public $createForm = [
        'compartira_renta' => "",
        'name' => "",
        'last_name' => "",
        'identificacion_oficial' => "",
        'email' => "",
        'phone' => "",
        'fecha_nacimiento' => "",
        'rfc' => "",
        'direccion_vivienda' => "",
        'documentacion' => "",
        'historial_crediticio' => "",
    ];

    protected $rules = [
        'createForm.compartira_renta' => 'required|max:255',
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.email' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.fecha_nacimiento' => 'required|max:255',
        'createForm.rfc' => 'required|max:13',
        'createForm.direccion_vivienda' => 'required|max:255',
        'createForm.documentacion' => 'required|max:255',
        'createForm.historial_crediticio' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.compartira_renta' => 'Compartirá renta',
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.email' => 'Correo electrónico',
        'createForm.phone' => 'Teléfono',
        'createForm.fecha_nacimiento' => 'Fecha de nacimiento',
        'createForm.rfc' => 'RFC',
        'createForm.direccion_vivienda' => 'Dirección de la vivienda',
        'createForm.documentacion' => 'Documentación',
        'createForm.historial_crediticio' => 'Historial crediticio',
    ];

    public function registrarFormulario()
    {
        $rules['identificacion_oficial'] = 'required';

        $this->validate();
        $this->createForm['identificacion_oficial'] = $this->identificacion_oficial->store('alquilino/roomie/identificacion');

        if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
            $url_nomina1 = $this->comprobante_nomina1->store('alquilino/roomie/nomina');
            $url_nomina2 = $this->comprobante_nomina2->store('alquilino/roomie/nomina');
            $url_nomina3 = $this->comprobante_nomina3->store('alquilino/roomie/nomina');
            $this->documentos = '{"estado_cuenta1":{"url":"' . $url_nomina1 . '"},"estado_cuenta2":{"url":"' . $url_nomina2 . '"},"estado_cuenta3":{"url":"' . $url_nomina3 . '"}}';
        } else if ($this->createForm['documentacion'] == 'Estados de cuenta completos (3 meses)') {
            $url_esatdo_cuenta1 = $this->estado_cuenta1->store('alquilino/roomie/estado_cuenta');
            $url_esatdo_cuenta2 = $this->estado_cuenta2->store('alquilino/roomie/estado_cuenta');
            $url_esatdo_cuenta3 = $this->estado_cuenta3->store('alquilino/roomie/estado_cuenta');
            $this->documentos = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3 . '"}}';
        }

        $inquilino = TenantRoomie::create([
            'transaction' => Auth::user()->transaction,
            'user_id' => Auth::user()->id,
            'compartira_renta' => trim(
                $this->createForm['compartira_renta']
            ),
            'name' => trim(
                $this->createForm['name']
            ),
            'last_name' => trim(
                $this->createForm['last_name']
            ),
            'identificacion_oficial' => trim(
                $this->createForm['identificacion_oficial']
            ),
            'email' => trim(
                $this->createForm['email']
            ),
            'phone' => trim(
                $this->createForm['phone']
            ),
            'fecha_de_nacimiento' => trim(
                $this->createForm['fecha_nacimiento']
            ),
            'rfc' => trim(
                $this->createForm['rfc']
            ),
            'direccion_vivienda_actual' => trim(
                $this->createForm['direccion_vivienda']
            ),
            'documentacion' => $this->documentos,
            'historial_crediticio' => trim(
                $this->createForm['historial_crediticio']
            ),
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->update(
            [
                'fase' => 4,
            ]
        );
        Mail::to(Auth::user()->email)->send(new MailProcesoTerminado($user));

        // $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
        // if (!is_null($user_invitacion)) {
        //     if ($user_invitacion->hasRole('broker')) {
        //         Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
        //     }
        //     if ($user_invitacion->hasRole('propietario')) {
        //         Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
        //     }
        // }

        return redirect()->route('registro_completado');
    }

    public function render()
    {
        return view('livewire.arendatario.roomies');
    }
}
