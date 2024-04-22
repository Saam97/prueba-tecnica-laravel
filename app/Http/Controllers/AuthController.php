<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEmailReuest;
use App\Http\Requests\UsuarioLoginRequest;
use App\Http\Requests\UsuarioPasswordRequest;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\Notificacion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public static function confirmar($token) {
        
        if (!is_string($token)) {
            return redirect()->route('login.index')->with('error', 'Token inválido');
        }

        $usuario = Usuario::where('token', $token)->first();

        if(!$usuario) {
            session()->flash('error', 'Token no válido,');

        } else {
            $usuario->confirmado = 1;
            $usuario->token = '';
            $usuario->save();
            session()->flash('exito', 'Cuenta confirmada correctamente');
        }
        return view('auth.confirmar', [
            'titulo' => 'Confirma tu cuenta',
        ]);
    }

}
