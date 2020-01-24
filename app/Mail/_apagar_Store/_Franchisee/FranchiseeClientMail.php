<?php

namespace AgenciaS3\Mail\Store\_Franchisee;

use Illuminate\Mail\Mailable;

class FranchiseeClientMail extends Mailable
{
    public $contact;

    public $textEmail;

    public function __construct(\AgenciaS3\Entities\Franchisee $contact, $textEmail)
    {
        $this->contact = $contact;
        $this->textEmail = $textEmail;
    }

    public function build()
    {
        return $this->subject('Obrigado pelo cadastro')
            ->with(['data' => $this->contact, 'textEmail' => $this->textEmail])
            ->view('vendor.emails.store.franchisee.client');
    }
}
