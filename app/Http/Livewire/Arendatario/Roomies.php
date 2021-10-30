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

    protected $listeners = ['registrarFormulario', 'resetCantidad'];

    public $identificacion_oficial, $documentos, $nominas = [];

    public $estado_cuenta1, $estado_cuenta2, $estado_cuenta3;

    public $createForm = [
        'compartira_renta' => "",
        'cantidad_roomies' => "0",
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

    public $identificacion_oficial2, $documentos2, $nominas2 = [];

    public $estado_cuenta_roomie1, $estado_cuenta_roomie2, $estado_cuenta_roomie3;

    public $createForm2 = [
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

    public $identificacion_oficial3, $documentos3, $nominas3 = [];

    public $estado_cuenta_roomie11, $estado_cuenta_roomie22, $estado_cuenta_roomie33;

    public $createForm3 = [
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

    public $identificacion_oficial4, $documentos4, $nominas4 = [];

    public $estado_cuenta_roomie111, $estado_cuenta_roomie222, $estado_cuenta_roomie333;

    public $createForm4 = [
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


    public function resetCantidad()
    {
        $this->createForm['cantidad_roomies'] = '0';
    }

    public function registrarFormulario()
    {

        if ($this->createForm['compartira_renta'] == 'Si') {

            if ($this->createForm['cantidad_roomies'] == '0') {
                if ($this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->identificacion_oficial || $this->nominas && $this->identificacion_oficial) {
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
            }
            // Roomie extra 1
            else if ($this->createForm['cantidad_roomies'] == '1') {
                if ($this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->identificacion_oficial && $this->estado_cuenta_roomie1 && $this->estado_cuenta_roomie2 && $this->estado_cuenta_roomie3 && $this->identificacion_oficial2 || $this->nominas && $this->identificacion_oficial && $this->nominas2 && $this->identificacion_oficial2) {
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

                    // Roomie 2
                    $this->createForm2['identificacion_oficial'] = $this->identificacion_oficial2->store('alquilino/roomie/identificacion');

                    if ($this->createForm2['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos2 = array();

                        foreach ($this->nominas2 as $doc) {
                            $documentos2[] = $doc->store('inquilino/roomie/nominas');
                        }
                        $this->documentos2 = json_encode($documentos2);
                    } else if ($this->createForm2['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url_esatdo_cuenta11 = $this->estado_cuenta_roomie1->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta22 = $this->estado_cuenta_roomie2->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta33 = $this->estado_cuenta_roomie3->store('alquilino/roomie/estado_cuenta');
                        $this->documentos2 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta11 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta22 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta33 . '"}}';
                    }

                    $inquilino2 = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'name' => trim(
                            $this->createForm2['name']
                        ),
                        'last_name' => trim(
                            $this->createForm2['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm2['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm2['email']
                        ),
                        'phone' => trim(
                            $this->createForm2['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm2['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm2['rfc']
                        ),
                        'direccion_vivienda_actual' => trim(
                            $this->createForm2['direccion_vivienda']
                        ),
                        'documentacion' => $this->documentos2,
                        'historial_crediticio' => trim(
                            $this->createForm2['historial_crediticio']
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
            }
            // Roomi extra 2
            else if ($this->createForm['cantidad_roomies'] == '2') {
                if (
                    $this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->identificacion_oficial && $this->estado_cuenta_roomie1 && $this->estado_cuenta_roomie2 && $this->estado_cuenta_roomie3 && $this->identificacion_oficial2
                    && $this->estado_cuenta_roomie11 && $this->estado_cuenta_roomie22 && $this->estado_cuenta_roomie33 && $this->identificacion_oficial3 || $this->nominas && $this->identificacion_oficial && $this->nominas2 && $this->identificacion_oficial2 && $this->nominas3 && $this->identificacion_oficial3
                ) {
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

                    // Roomie 2
                    $this->createForm2['identificacion_oficial'] = $this->identificacion_oficial2->store('alquilino/roomie/identificacion');

                    if ($this->createForm2['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos2 = array();

                        foreach ($this->nominas2 as $doc) {
                            $documentos2[] = $doc->store('inquilino/roomie/nominas');
                        }
                        $this->documentos2 = json_encode($documentos2);
                    } else if ($this->createForm2['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url_esatdo_cuenta11 = $this->estado_cuenta_roomie1->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta22 = $this->estado_cuenta_roomie2->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta33 = $this->estado_cuenta_roomie3->store('alquilino/roomie/estado_cuenta');
                        $this->documentos2 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta11 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta22 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta33 . '"}}';
                    }

                    $inquilino2 = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'name' => trim(
                            $this->createForm2['name']
                        ),
                        'last_name' => trim(
                            $this->createForm2['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm2['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm2['email']
                        ),
                        'phone' => trim(
                            $this->createForm2['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm2['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm2['rfc']
                        ),
                        'direccion_vivienda_actual' => trim(
                            $this->createForm2['direccion_vivienda']
                        ),
                        'documentacion' => $this->documentos2,
                        'historial_crediticio' => trim(
                            $this->createForm2['historial_crediticio']
                        ),
                    ]);

                    // Roomie 3
                    $this->createForm3['identificacion_oficial'] = $this->identificacion_oficial3->store('alquilino/roomie/identificacion');

                    if ($this->createForm3['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos3 = array();

                        foreach ($this->nominas3 as $doc) {
                            $documentos3[] = $doc->store('inquilino/roomie/nominas');
                        }
                        $this->documentos3 = json_encode($documentos3);
                    } else if ($this->createForm3['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url_esatdo_cuenta111 = $this->estado_cuenta_roomie11->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta222 = $this->estado_cuenta_roomie22->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta333 = $this->estado_cuenta_roomie33->store('alquilino/roomie/estado_cuenta');
                        $this->documentos3 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta111 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta222 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta333 . '"}}';
                    }

                    $inquilino3 = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'name' => trim(
                            $this->createForm3['name']
                        ),
                        'last_name' => trim(
                            $this->createForm3['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm3['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm3['email']
                        ),
                        'phone' => trim(
                            $this->createForm3['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm3['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm3['rfc']
                        ),
                        'direccion_vivienda_actual' => trim(
                            $this->createForm3['direccion_vivienda']
                        ),
                        'documentacion' => $this->documentos3,
                        'historial_crediticio' => trim(
                            $this->createForm3['historial_crediticio']
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
            }
            // Roomi extra 3
            else if ($this->createForm['cantidad_roomies'] == '3') {
                if (
                    $this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->identificacion_oficial && $this->estado_cuenta_roomie1 && $this->estado_cuenta_roomie2 && $this->estado_cuenta_roomie3 && $this->identificacion_oficial2
                    && $this->estado_cuenta_roomie11 && $this->estado_cuenta_roomie22 && $this->estado_cuenta_roomie33 && $this->identificacion_oficial3
                    && $this->estado_cuenta_roomie111 && $this->estado_cuenta_roomie222 && $this->estado_cuenta_roomie333 && $this->identificacion_oficial4 || $this->nominas && $this->identificacion_oficial && $this->nominas2 && $this->identificacion_oficial2 && $this->nominas3 && $this->identificacion_oficial3 && $this->nominas4 && $this->identificacion_oficial4
                ) {
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

                    // Roomie 2
                    $this->createForm2['identificacion_oficial'] = $this->identificacion_oficial2->store('alquilino/roomie/identificacion');

                    if ($this->createForm2['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos2 = array();

                        foreach ($this->nominas2 as $doc) {
                            $documentos2[] = $doc->store('inquilino/roomie/nominas');
                        }
                        $this->documentos2 = json_encode($documentos2);
                    } else if ($this->createForm2['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url_esatdo_cuenta11 = $this->estado_cuenta_roomie1->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta22 = $this->estado_cuenta_roomie2->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta33 = $this->estado_cuenta_roomie3->store('alquilino/roomie/estado_cuenta');
                        $this->documentos2 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta11 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta22 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta33 . '"}}';
                    }

                    $inquilino2 = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'name' => trim(
                            $this->createForm2['name']
                        ),
                        'last_name' => trim(
                            $this->createForm2['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm2['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm2['email']
                        ),
                        'phone' => trim(
                            $this->createForm2['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm2['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm2['rfc']
                        ),
                        'direccion_vivienda_actual' => trim(
                            $this->createForm2['direccion_vivienda']
                        ),
                        'documentacion' => $this->documentos2,
                        'historial_crediticio' => trim(
                            $this->createForm2['historial_crediticio']
                        ),
                    ]);

                    // Roomie 3
                    $this->createForm3['identificacion_oficial'] = $this->identificacion_oficial3->store('alquilino/roomie/identificacion');

                    if ($this->createForm3['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos3 = array();

                        foreach ($this->nominas3 as $doc) {
                            $documentos3[] = $doc->store('inquilino/roomie/nominas');
                        }
                        $this->documentos3 = json_encode($documentos3);
                    } else if ($this->createForm3['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url_esatdo_cuenta111 = $this->estado_cuenta_roomie11->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta222 = $this->estado_cuenta_roomie22->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta333 = $this->estado_cuenta_roomie33->store('alquilino/roomie/estado_cuenta');
                        $this->documentos3 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta111 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta222 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta333 . '"}}';
                    }

                    $inquilino3 = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'name' => trim(
                            $this->createForm3['name']
                        ),
                        'last_name' => trim(
                            $this->createForm3['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm3['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm3['email']
                        ),
                        'phone' => trim(
                            $this->createForm3['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm3['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm3['rfc']
                        ),
                        'direccion_vivienda_actual' => trim(
                            $this->createForm3['direccion_vivienda']
                        ),
                        'documentacion' => $this->documentos3,
                        'historial_crediticio' => trim(
                            $this->createForm3['historial_crediticio']
                        ),
                    ]);
                    // Roomie 4
                    $this->createForm4['identificacion_oficial'] = $this->identificacion_oficial4->store('alquilino/roomie/identificacion');

                    if ($this->createForm4['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos4 = array();

                        foreach ($this->nominas4 as $doc) {
                            $documentos4[] = $doc->store('inquilino/roomie/nominas');
                        }
                        $this->documentos4 = json_encode($documentos4);
                    } else if ($this->createForm4['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url_esatdo_cuenta1111 = $this->estado_cuenta_roomie111->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta2222 = $this->estado_cuenta_roomie222->store('alquilino/roomie/estado_cuenta');
                        $url_esatdo_cuenta3333 = $this->estado_cuenta_roomie333->store('alquilino/roomie/estado_cuenta');
                        $this->documentos4 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1111 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2222 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3333 . '"}}';
                    }

                    $inquilino3 = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'name' => trim(
                            $this->createForm4['name']
                        ),
                        'last_name' => trim(
                            $this->createForm4['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm4['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm4['email']
                        ),
                        'phone' => trim(
                            $this->createForm4['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm4['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm4['rfc']
                        ),
                        'direccion_vivienda_actual' => trim(
                            $this->createForm4['direccion_vivienda']
                        ),
                        'documentacion' => $this->documentos4,
                        'historial_crediticio' => trim(
                            $this->createForm4['historial_crediticio']
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
