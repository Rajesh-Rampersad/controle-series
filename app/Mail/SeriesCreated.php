<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $nomeSerie;
    public $qtdTemporadas;
    public $qtdEpisodios;
    public $idSerie;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nomeSerie, $qtdTemporadas, $qtdEpisodios, $idSerie)
    {
        // Aquí puedes inicializar cualquier otra propiedad o lógica necesaria
        $this->nomeSerie = $nomeSerie;
        $this->qtdTemporadas = $qtdTemporadas;
        $this->qtdEpisodios = $qtdEpisodios;
        $this->idSerie = $idSerie;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Série Criada: ' . $this->nomeSerie,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.series-created'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
