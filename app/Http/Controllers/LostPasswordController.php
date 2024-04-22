<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRecuest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Mail\Notificacion;
use Illuminate\Support\Str;

class LostPasswordController extends Controller
{
    public function index(){
        return view('auth.lostPassword.index', [
            'titulo' => 'Olvide Mi contraseña'
        ]);
    }

    public function recovery(EmailRecuest $request){
        
        $usuario = Usuario::where('email', $request->input('email'))->first();

       if (!$usuario || $usuario->confirmado !== 1) {
           return redirect()->route('lost.index')->with('error', 'Este usuario No esta Confirmado');
       }

       //Generar un nuevo token
       $usuario->token = Str::random(60);
       $usuario->confirmado = 0;
       $usuario->save();

       //enviar Email
       Notificacion::enviarRestablecerpassword($usuario->email, $usuario->nombre, $usuario->token);

       return redirect()->route('login.index')->with('exito', 'Revisa tu correo para recuperar tu contraseña');
   }
}
