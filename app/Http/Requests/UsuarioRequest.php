<?php

namespace App\Http\Requests;

use App\Models\Pregunta;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        $rules = [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'required|integer',
            'pais' => 'required|string',
            'password' => 'required|string|min:8',
            'password2' => 'required|string|same:password',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            //'g-recaptcha-response' => 'required|captcha', // verifica el reCAPTCHA
        ];

        $preguntas = Pregunta::where('estado', 1)->get();

        foreach ($preguntas as $pregunta) {
            $rules['respuesta_'.$pregunta->id] = 'required|string';
        }

        return $rules;
    }
}

