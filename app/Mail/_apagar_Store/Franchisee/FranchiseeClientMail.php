<?php

namespace AgenciaS3\Mail\Store\Franchisee;

use Illuminate\Mail\Mailable;

class FranchiseeClientMail extends Mailable
{
    public $contact;

    public $form;

    public function __construct(\AgenciaS3\Entities\Franchisee $contact, $form)
    {
        $this->contact = $contact;
        $this->form = $form;
    }

    public function build()
    {
        $subject =  "Obrigado pelo cadastro";

        if(isPost($this->form->subject)){
            $subject = $this->form->subject;
        }

        if(isPost($this->form->from)){
            $this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if(isPost($this->form->reply_to)){
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with(['data' => $this->contact, 'textEmail' => $this->form->description])
            ->view('vendor.emails.store.franchisee.client');
    }
}
