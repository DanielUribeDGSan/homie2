<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailProcesoTerminadoPropietario extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $name, $last_name)
    {
        $this->user = $user;
        $this->name = $name;
        $this->last_name = $last_name;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-invitacion-propietario')->from('daniel.uribe.garcia07@gmail.com', 'Homie - Proceso terminado')
            ->subject('El propietario que invitaste ha terminado su proceso');
    }
}
