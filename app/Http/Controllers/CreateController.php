<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Mail\Notificacion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UsuarioRequest;
use App\Models\Respuesta;

class CreateController extends Controller
{
    public function index() {

        $usuario = new Usuario();
        $preguntas = Pregunta::where('estado', 1)->get();

        return view('auth.register.index2', [
            'titulo' => 'Registro de usuario',
            'usuario' => $usuario,
            'preguntas' => $preguntas,
        ]);
    }

    public function create(UsuarioRequest $request){

        $usuario = new Usuario();
        $preguntas = Pregunta::where('estado', 1)->get();

        if ($request->isMethod('post')) {
            $nombre_imagen = null;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $extension = $imagen->extension(); // Obtener la extensión de la imagen
                $nombre_imagen = md5(uniqid(rand(), true)) . '.' . $extension;
                $imagen->storeAs('public/img', $nombre_imagen);
            }

            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->pais = $request->pais;            
            $usuario->password = $request->input('password');
            $usuario->token = Str::random(60); // Generar un token de longitud 60 caracteres
            $usuario->imagen = $nombre_imagen;
            $usuario->save();

            //enviar Email
            Mail::to($usuario->email)->send(new Notificacion($usuario->email, $usuario->nombre, $usuario->token, 'registro'));
            
            foreach($preguntas as $pregunta) {
                $respuesta = new Respuesta();

                $respuesta->usuario_id = $usuario->id;
                $respuesta->pregunta_id = $pregunta->id;
                $respuesta->respuesta = $request->input('respuesta_' . $pregunta->id);
                $respuesta->save();
            }

            return redirect()->route('login.index')->with('exito', 'Registrado con exito Revisa tu correo Electronico');
        }

    }
}
