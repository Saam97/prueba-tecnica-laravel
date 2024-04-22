<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRecuest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    public function index($token){
        $token_valido = true;

        if(!is_string($token) || !$token) {
            return redirect('/');
        }
        
        $usuario = Usuario::where('token', $token)->first();
         if(!$usuario) {
             $token_valido = false;
             // No se encontró un usuario con ese token
             session()->flash('error', 'Token no válidos');
         }

        return view('auth.lostPassword.newPassword', [
            'titulo' => 'Reestablecer Password',
            'token_valido' => $token_valido,
            'token' => $token
        ]);
    }

    public function newPassword(PasswordRecuest $request, $token){
        $usuario = Usuario::where('token', $token)->first();

        if(!$usuario) {
            session()->flash('error', 'Token no válidos');
        }

        $usuario->password = $request->input('password');
        $usuario->token = '';
        $usuario->confirmado = 1;
        $usuario->save();

        return redirect()->route('login.index')->with('exito', 'Contraseña actualizada exitosamente');

    }
}
