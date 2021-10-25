<?php

namespace App\Http\Livewire\Arendatario;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DatosPersonales extends Component
{
    use WithFileUploads;

    protected $listeners = ['registrarFormulario'];

    public $identificacion_oficial, $documentos;
    public $comprobante_nomina1, $comprobante_nomina2, $comprobante_nomina3;
    public $estado_cuenta1, $estado_cuenta2, $estado_cuenta3;

    public $createForm = [
        'tipo_persona' => "",
        'rfc' => "",
        'fecha_nacimiento' => "",
        'estado_civil' => "",
        'ingresos_netos' => "",
        'identificacion_oficial' => "",
        'direccion_vivienda' => "",
        'institucion_educativa' => "",
        'historial_crediticio' => "",
        'trabajo' => "",
        'empresa' => "",
        'actividad_empresa' => "",
        'documentacion' => "",
    ];

    protected $rules = [
        'createForm.tipo_persona' => 'required|max:255',
        'createForm.rfc' => 'required|max:13',
        'createForm.fecha_nacimiento' => 'required|max:255',
        'createForm.estado_civil' => 'required|max:255',
        'createForm.ingresos_netos' => 'required|max:255',
        'createForm.direccion_vivienda' => 'required|max:255',
        'createForm.institucion_educativa' => 'required|max:255',
        'createForm.historial_crediticio' => 'required|max:255',
        'createForm.trabajo' => 'required|max:255',
        'createForm.documentacion' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.tipo_persona' => 'Persona',
        'createForm.rfc' => 'RFC',
        'createForm.fecha_nacimiento' => 'Fecha de nacimiento',
        'createForm.estado_civil' => 'Estado civil',
        'createForm.ingresos_netos' => 'Ingresos netos mensuales',
        'createForm.identificacion_oficial' => 'Identificación oficial',
        'createForm.direccion_vivienda' => 'Dirección de la vivienda',
        'createForm.institucion_educativa' => 'Institución educativa',
        'createForm.historial_crediticio' => 'Historial crediticio',
        'createForm.trabajo' => 'Trabajo',
        'createForm.empresa' => 'Nombre de la empresa',
        'createForm.actividad_empresa' => 'Actividad de la empresa',
        'createForm.documentacion' => 'Documentación',

    ];

    public function registrarFormulario()
    {

        $rules['identificacion_oficial'] = 'required';

        $this->validate();
        $this->createForm['identificacion_oficial'] = $this->identificacion_oficial->store('alquilino/identificacion');

        if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
            $url_nomina1 = $this->comprobante_nomina1->store('alquilino/nomina');
            $url_nomina2 = $this->comprobante_nomina2->store('alquilino/nomina');
            $url_nomina3 = $this->comprobante_nomina3->store('alquilino/nomina');
            $this->documentos = '{"estado_cuenta1":{"url":"' . $url_nomina1 . '"},"estado_cuenta2":{"url":"' . $url_nomina2 . '"},"estado_cuenta3":{"url":"' . $url_nomina3 . '"}}';
        } else if ($this->createForm['documentacion'] == 'Estados de cuenta completos (3 meses)') {
            $url_esatdo_cuenta1 = $this->estado_cuenta1->store('alquilino/estado_cuenta');
            $url_esatdo_cuenta2 = $this->estado_cuenta2->store('alquilino/estado_cuenta');
            $url_esatdo_cuenta3 = $this->estado_cuenta3->store('alquilino/estado_cuenta');
            $this->documentos = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3 . '"}}';
        }

        $inquilino = Tenant::create([
            'transaction' => Auth::user()->transaction,
            'user_id' => Auth::user()->id,
            'tipo_de_persona' => trim(
                $this->createForm['tipo_persona']
            ),
            'rfc' => trim(
                $this->createForm['rfc']
            ),
            'fecha_de_nacimiento' => trim(
                $this->createForm['fecha_nacimiento']
            ),
            'estado_civil' => trim(
                $this->createForm['estado_civil']
            ),
            'ingresos_netos' => trim(
                $this->createForm['ingresos_netos']
            ),
            'identificacion_oficial' => trim(
                $this->createForm['identificacion_oficial']
            ),
            'direccion_vivienda_actual' => trim(
                $this->createForm['direccion_vivienda']
            ),
            'institucion_educativa' => trim(
                $this->createForm['institucion_educativa']
            ),
            'historial_crediticio' => trim(
                $this->createForm['historial_crediticio']
            ),
            'trabajo' => trim(
                $this->createForm['trabajo']
            ),
            'empresa' => trim(
                $this->createForm['empresa']
            ),
            'actividad_empresa' => trim(
                $this->createForm['actividad_empresa']
            ),
            'documentacion' => $this->documentos,

        ]);

        $inquilino = User::where('id', Auth::user()->id)->first();
        $inquilino->update(
            [
                'fase' => 2,
            ]
        );
        return redirect()->route('inquilino.referencias');
    }

    public function render()
    {
        return view('livewire.arendatario.datos-personales');
    }
}
