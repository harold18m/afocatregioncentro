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
    public $numeroPlaca;
    public $numeroCat;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf, $numeroAleatorio, $numeroPlaca, $numeroCat)
    {
        $this->pdf = $pdf;
        $this->numeroAleatorio = $numeroAleatorio;
        $this->numeroPlaca = $numeroPlaca;
        $this->numeroCat = $numeroCat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.permisoFueraRuta')
                    ->subject('PERMISO Nº ' . $this->numeroAleatorio . ' - Placa: ' . $this->numeroPlaca . ' - CAT: ' . $this->numeroCat)
                    ->attachData($this->pdf->output(), 'PERMISO-AFOCAT.pdf');
    }
}
