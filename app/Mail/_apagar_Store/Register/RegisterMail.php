<?php

namespace AgenciaS3\Mail\Store\Register;

use Illuminate\Mail\Mailable;

class RegisterMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Client $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo cliente se cadastrou na loja')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.store.register.admin');
    }

}
