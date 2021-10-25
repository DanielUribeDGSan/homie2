<?php

namespace App\Mail;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInvitacionPropietario extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $user, $arendatario, $email;

    public function __construct(Guest $user, User $arendatario, $email)
    {
        $this->user = $user;
        $this->arendatario = $arendatario;
        $this->email = $email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-invitacion-propietario')->from('daniel.uribe.garcia07@gmail.com', 'Homie - Nueva invitación')
            ->subject('Te han enviado una invitación a homie');
    }
}
