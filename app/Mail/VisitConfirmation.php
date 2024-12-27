<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $qrFilePath;

    /**
     * Create a new message instance.
     */
    public function __construct($details, $qrFilePath)
    {
        $this->details = $details;
        $this->qrFilePath = $qrFilePath; // Ruta al archivo QR
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Confirmación de Visita Aprobada')
                    ->view('emails.visit_confirmation')
                    ->attach($this->qrFilePath, [
                        'as' => 'codigo_qr.png',
                        'mime' => 'image/png',
                    ]);
    }
}
