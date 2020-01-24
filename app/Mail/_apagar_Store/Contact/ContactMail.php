<?php

namespace AgenciaS3\Mail\Store\Contact;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo e-mail contato pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.store.contact.admin');
    }

}
