<?php

namespace AgenciaS3\Mail\User;

use AgenciaS3\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Seja bem vindo";
        $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

        return $this->subject($subject)
            ->with([
                'data' => $this->user,
                'password' => $this->password
            ])
            ->view('vendor.emails.users.created');

    }
}
