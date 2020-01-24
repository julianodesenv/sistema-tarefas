<?php

namespace AgenciaS3\Mail\Store\DistributorContact;

use Illuminate\Mail\Mailable;

class DistributorContactMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\DistributorContact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo e-mail distribuidor pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.store.distributor-contact.admin');
    }

}
