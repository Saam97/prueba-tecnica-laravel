<?php

namespace App\Http\Requests;

use App\Models\Pregunta;
use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|integer',
            'pais' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
        ];

        $preguntas = Pregunta::where('estado', 1)->get();
        foreach ($preguntas as $pregunta) {
            $rules['respuesta_'.$pregunta->id] = 'required|string';
        }

    }
}
