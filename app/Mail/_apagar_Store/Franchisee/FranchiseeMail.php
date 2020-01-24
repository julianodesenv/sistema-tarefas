<?php

namespace AgenciaS3\Mail\Store\Franchisee;

use Illuminate\Mail\Mailable;

class FranchiseeMail extends Mailable
{
    public $contact;

    public function __construct(\AgenciaS3\Entities\Franchisee $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo cadastro de franqueados recebido pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.store.franchisee.admin');
    }

}
