<?php

namespace AgenciaS3\Mail\Store\_Franchisee;

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
        return $this->subject('Novo franqueado cadastrado pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.store.franchisee.admin');
    }

}
