<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreguntaRequest;
use App\Http\Requests\UsuarioTokenRequest;
use App\Models\Pregunta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function index(){
        $preguntas = Pregunta::where('estado', 1)->get();
        
        return view('admin.preguntas.index', [
            'titulo' => 'Panel Preguntas',
            'preguntas' => $preguntas
        ]);
    }

    public function preguntaView($id){  
        if (!is_numeric($id) || intval($id) != $id) {
            return redirect()->route('preguntas.index')->with('error', 'ID de pregunta inválido');
        }
        $pregunta = Pregunta::findOrFail($id);
    
        return view('admin.preguntas.update', [
            'titulo' => 'Pregunta',
            'pregunta' => $pregunta 
        ]);
    }

    public function update(PreguntaRequest $request, $id){
        $pregunta = Pregunta::find($id);
        $pregunta->estado = 0;
        $pregunta->save();

        if($id){
            $nueva_pregunta = new Pregunta();
            $nueva_pregunta->pregunta = $request->input('pregunta');
            $nueva_pregunta->save();

            return redirect()->route('preguntas.index');
        }
    }
}
