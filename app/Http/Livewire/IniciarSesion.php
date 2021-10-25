<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IniciarSesion extends Component
{
    protected $listeners = ['validarDatos'];

    public $formLogin = [
        'email' => "",
        'password' => "",
    ];

    protected $rules = [
        'formLogin.email' => 'required|max:255',
        'formLogin.password' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'formLogin.email' => 'Email',
        'formLogin.password' => 'Contraseña',
    ];

    public function validarDatos()
    {
        $user = User::where('email', $this->formLogin['email'])->first();
        if (!is_null($user)) {
            if (Hash::check($this->formLogin['password'], $user->password)) {
                // Auth::login($user);
                // return redirect()->route('propietario.datos_inquilino', $transaction);
                if ($user->hasRole('broker')) {
                    Auth::login($user);
                    if ($user->fase == 0) {
                        return redirect()->route('broker.datos_propietario_inquilino', $user->transaction);
                    } else if ($user->fase == 1) {
                        return redirect()->route('broker.datos_departamento', $user->transaction);
                    } else if ($user->fase == 2) {
                        return redirect()->route('registro_completado');
                    }
                } else if ($user->hasRole('propietario')) {
                    Auth::login($user);
                    if ($user->fase == 0) {
                        return redirect()->route('propietario.datos_inquilino', $user->transaction);
                    } else if ($user->fase == 1) {
                        return redirect()->route('propietario.datos_personales');
                    } else if ($user->fase == 2) {
                        return redirect()->route('registro_completado');
                    }
                } else if ($user->hasRole('arendatario')) {
                    Auth::login($user);
                    if ($user->fase == 0) {
                        return redirect()->route('inquilino.datos_propietario', $user->transaction);
                    } else if ($user->fase == 1) {
                        return redirect()->route('inquilino.datos_personales');
                    } else if ($user->fase == 2) {
                        return redirect()->route('inquilino.referencias');
                    } else if ($user->fase == 3) {
                        return redirect()->route('inquilino.roomies');
                    } else if ($user->fase == 4) {
                        return redirect()->route('registro_completado');
                    }
                }
            } else {
                $this->emit('errorLogin');
            }
        } else {
            $this->emit('errorLogin');
        }
    }

    public function render()
    {
        return view('livewire.iniciar-sesion');
    }
}
