<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UsuariosController extends Controller
{
    public static function index(){

        $usuarios = Usuario::all();
        return view('admin.usuarios.index', [
            'titulo' => 'Panel Adminitracion',
            'usuarios' => $usuarios
        ]);
    }

    public function mostrarUsuario($id){
        
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->route('admin-usuarios')->with('error', 'El ID de usuario proporcionado no es válido.');
        }

        $usuario = Usuario::with('respuestas.pregunta')->findOrFail($id);
        
        return view('admin.usuarios.ver', [
            'titulo' => 'Vista Usuarios',
            'usuario' => $usuario,
        ]);
    }
}
