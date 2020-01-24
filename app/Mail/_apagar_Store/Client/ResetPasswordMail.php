<?php

namespace AgenciaS3\Mail\Store\Client;

use Illuminate\Mail\Mailable;

class ResetPasswordMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Client $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Recuperação de senha solicitada pela loja')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.store.client.reset-password.admin');
    }

}
