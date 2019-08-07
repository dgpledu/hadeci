<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Bienvenidoorganizador extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
 //    public function build()
 //    {
 //        return $this->view('emails.bienvenidomentor');
 //    }
 //    /**
 // * Build the message.
 // *
 // * @return $this
 // */
public function build()
{
    return $this->attach('https://cienciascontic.github.io/archivos/autorizacion_de_imagen_2019_hackaton.pdf')
                ->subject('¡Bienvenido/a al hackatón Desafíos Científicos!')->view('emails.bienvenidoorganizador');

}

}
