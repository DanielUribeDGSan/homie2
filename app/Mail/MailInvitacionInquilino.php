<?php

namespace App\Mail;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInvitacionInquilino extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $user, $inquilino, $email;

    public function __construct(Guest $user, User $inquilino, $email)
    {
        $this->user = $user;
        $this->inquilino = $inquilino;
        $this->email = $email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-invitacion-inquilino')->from('daniel.uribe.garcia07@gmail.com', 'Respaldo Homie - Nueva invitación')
            ->subject('Te enviaron una invitación para Homie');
    }
}
