<?php

namespace AgenciaS3\Mail\Store\Newsletter;

use Illuminate\Mail\Mailable;

class NewsletterClientMail extends Mailable
{
    public $contact;

    public $form;

    public function __construct(\AgenciaS3\Entities\Newsletter $contact, $form)
    {
        $this->contact = $contact;
        $this->form = $form;
    }

    public function build()
    {
        $subject = "Obrigado pelo contato";

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

        if (isPost($this->form->from)) {
            //$this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if (isPost($this->form->reply_to)) {
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with([
                'data' => $this->contact,
                'textEmail' => $description
            ])
            ->view('vendor.emails.store.newsletter.client');
    }
}
