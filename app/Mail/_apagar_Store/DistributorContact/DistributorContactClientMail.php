<?php

namespace AgenciaS3\Mail\Store\DistributorContact;

use Illuminate\Mail\Mailable;

class DistributorContactClientMail extends Mailable
{
    public $contact;

    public $form;

    public $language;

    public function __construct(\AgenciaS3\Entities\DistributorContact $contact, $form, $language)
    {
        $this->contact = $contact;
        $this->form = $form;
        $this->language = $language;
    }

    public function build()
    {
        $subject =  "Obrigado pelo contato";

        if ($this->contact->language == 'pt') {
            $subject = $this->form->subject;
            $description = $this->form->description;
        } else if ($this->contact->language == 'en') {
            $subject = $this->form->subject_en;
            $description = $this->form->description_en;
        } else if ($this->contact->language == 'es') {
            $subject = $this->form->subject_es;
            $description = $this->form->description_es;
        }

        if(isPost($this->form->from)){
            $this->from(env('MAIL_FROM_ADDRESS'), isset($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if(isPost($this->form->reply_to)){
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with(['data' => $this->contact, 'textEmail' => $description, 'language' => $this->language])
            ->view('vendor.emails.store.distributor-contact.client');
    }
}
