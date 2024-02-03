<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermisoFueraRuta extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;
    public $numeroAleatorio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf, $numeroAleatorio)
    {
        $this->pdf = $pdf;
        $this->numeroAleatorio = $numeroAleatorio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.permisoFueraRuta')
                    ->subject('PERMISO FUERA DE RUTA Nº ' . $this->numeroAleatorio)
                    ->attachData($this->pdf->output(), 'permiso-afocat.pdf');
    }
}