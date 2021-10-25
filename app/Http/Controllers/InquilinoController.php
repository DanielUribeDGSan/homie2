<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquilinoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datos_propietario($transaccion)
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('broker')) {
                if ($user->fase == 0) {
                    return redirect()->route('broker.datos_propietario_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('registro_completado');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return  redirect()->route('propietario.datos_personales');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 1) {
                    return  redirect()->route('inquilino.datos_personales');
                } else if ($user->fase == 2) {
                    return redirect()->route('inquilino.referencias');
                } else if ($user->fase == 3) {
                    redirect()->route('inquilino.roomies');
                } else if ($user->fase == 4) {
                    return redirect()->route('registro_completado');
                }
            }
        }
        $transaccion_user = $transaccion;

        return view('arendatario.datos-propietario', compact('transaccion_user'));
    }

    public function datos_personales($transaccion = "")
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('broker')) {
                if ($user->fase == 0) {
                    return redirect()->route('broker.datos_propietario_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('registro_completado');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return  redirect()->route('propietario.datos_personales');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 0) {
                    return   redirect()->route('inquilino.datos_propietario', $user->transaction);
                } else if ($user->fase == 2) {
                    return redirect()->route('inquilino.referencias');
                } else if ($user->fase == 3) {
                    redirect()->route('inquilino.roomies');
                } else if ($user->fase == 4) {
                    return redirect()->route('registro_completado');
                }
            }
        }

        $transaccion_user = $transaccion;

        return view('arendatario.datos-personales', compact('transaccion_user'));
    }

    public function referencias()
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('broker')) {
                if ($user->fase == 0) {
                    return redirect()->route('broker.datos_propietario_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('registro_completado');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return  redirect()->route('propietario.datos_personales');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 0) {
                    return   redirect()->route('inquilino.datos_propietario', $user->transaction);
                } else if ($user->fase == 1) {
                    return  redirect()->route('inquilino.datos_personales');
                } else if ($user->fase == 3) {
                    redirect()->route('inquilino.roomies');
                } else if ($user->fase == 4) {
                    return redirect()->route('registro_completado');
                }
            }
        }

        return view('arendatario.referencias');
    }

    public function roomies()
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('broker')) {
                if ($user->fase == 0) {
                    return redirect()->route('broker.datos_propietario_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('registro_completado');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return  redirect()->route('propietario.datos_personales');
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 0) {
                    return   redirect()->route('inquilino.datos_propietario', $user->transaction);
                } else if ($user->fase == 1) {
                    return  redirect()->route('inquilino.datos_personales');
                } else if ($user->fase == 2) {
                    return redirect()->route('inquilino.referencias');
                } else if ($user->fase == 4) {
                    return redirect()->route('registro_completado');
                }
            }
        }

        return view('arendatario.roomies');
    }
}
