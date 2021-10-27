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

    public $identificacion_oficial, $documentos, $nominas = [];

    public $estado_cuenta1, $estado_cuenta2, $estado_cuenta3;

    public $createForm = [
        'compartira_renta' => "",
        'cantidad_roomies' => "",
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

        if ($this->createForm['compartira_renta'] == 'Si') {

            if ($this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->$this->identificacion_oficial || $this->nominas && $this->identificacion_oficial) {
                $this->createForm['identificacion_oficial'] = $this->identificacion_oficial->store('alquilino/roomie/identificacion');

                if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos = array();

                    foreach ($this->nominas as $doc) {
                        $documentos[] = $doc->store('inquilino/roomie/nominas');
                    }
                    $this->documentos = json_encode($documentos);
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

                $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
                if (!is_null($user_invitacion)) {
                    if ($user_invitacion->hasRole('broker')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                    if ($user_invitacion->hasRole('propietario')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                }

                return redirect()->route('registro_completado');
            } else {
                $this->emit('errorDocumentosRoomies');
            }
        } else if ($this->createForm['compartira_renta'] == 'No') {
            $inquilino = TenantRoomie::create([
                'transaction' => Auth::user()->transaction,
                'user_id' => Auth::user()->id,
                'compartira_renta' => trim(
                    $this->createForm['compartira_renta']
                ),
            ]);
            $user = User::where('id', Auth::user()->id)->first();
            $user->update(
                [
                    'fase' => 4,
                ]
            );
            Mail::to(Auth::user()->email)->send(new MailProcesoTerminado($user));

            $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
            if (!is_null($user_invitacion)) {
                if ($user_invitacion->hasRole('broker')) {
                    Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                }
                if ($user_invitacion->hasRole('propietario')) {
                    Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                }
            }

            return redirect()->route('registro_completado');
        }
    }

    public function render()
    {
        return view('livewire.arendatario.roomies');
    }
}
