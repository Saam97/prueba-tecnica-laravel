<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilRequest;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PerfilController extends Controller
{
    public function index(){
        return view('usuario.dashboard.index', [
            'titulo' => 'Usuario Panel de Administracion'
        ]);
    }

    public function perfilIndex(){
        $id = Auth::id();
        //una consulta. traemos las respuestas y las preguntas asociadas al id del usuario (tb de la db)
        $usuario = Usuario::with('respuestas.pregunta')->findOrFail($id);
        
        return view('usuario.perfil.index', [
            'titulo' => 'Vista Usuarios',
            'usuario' => $usuario,
        ]);
    }


    public function Update(PerfilRequest $request){
        $id = Auth::id();
        $usuario = Usuario::findOrFail($id);

        if ($request->isMethod('post')) {
            if ($usuario->imagen) {
                Storage::delete('public/img/' . $usuario->imagen);
            }
            
            $nombre_imagen = null;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $extension = $imagen->extension(); // Obtener la extensión de la imagen
                $nombre_imagen = md5(uniqid(rand(), true)) . '.' . $extension;
                $imagen->storeAs('public/img', $nombre_imagen);
            }

            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;   
            $usuario->telefono = $request->telefono;
            $usuario->pais = $request->pais;            
            $usuario->imagen = $nombre_imagen;
            $usuario->save();

            $preguntas = Pregunta::all();
            foreach($preguntas as $pregunta) {
                $respuesta = Respuesta::where('usuario_id', $usuario->id)->where('pregunta_id', $pregunta->id)->first();
                if ($respuesta) {
                    $respuesta->respuesta = $request->input('respuesta_' . $pregunta->id);
                    $respuesta->save();
                }
            }

            return redirect()->route('user.index')->with('exito', 'Datos Actualizados');
        }

    }
}
