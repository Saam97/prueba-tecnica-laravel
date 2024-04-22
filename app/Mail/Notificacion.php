<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $nombre;
    public $token;
    public $tipo;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $nombre, $token, $tipo) {
        $this->email = $email ?? '';
        $this->nombre = $nombre ?? '';
        $this->token = $token ?? '';
        $this->tipo = $tipo ?? 'registro'; // Vista predeterminada
    }

    public function build()
    {

        return $this->subject('Notificación') // Asunto del correo
                ->view('auth.notificacion') // Vista de correo electrónico
                ->with([
                'email' => $this->email,
                'nombre' => $this->nombre,
                'token' => $this->token,
                'tipo' => $this->tipo
            ]); 
    }

    public static function enviarRestablecerpassword($email, $nombre, $token) {
        return Mail::to($email)->send(new static($email, $nombre, $token, 'recuperar'));
    }

}
