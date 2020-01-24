<?php

namespace AgenciaS3\Mail\Store\Register;

use Illuminate\Mail\Mailable;

class RegisterClientMail extends Mailable
{
    public $client;

    public $form;

    public function __construct(\AgenciaS3\Entities\Client $client,
                                $form, $language)
    {
        $this->client = $client;
        $this->form = $form;
    }

    public function build()
    {
        $subject =  "Bem vindo";

        if ($this->client->language == 'pt') {
            $subject = $this->form->subject;
            $description = $this->form->description;
        } else if ($this->client->language == 'en') {
            $subject = $this->form->subject_en;
            $description = $this->form->description_en;
        } else if ($this->client->language == 'es') {
            $subject = $this->form->subject_es;
            $description = $this->form->description_es;
        }

        if(isPost($this->form->from)){
            //$this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if(isPost($this->form->reply_to)){
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with([
                'data' => $this->client,
                'textEmail' => $description
            ])
            ->view('vendor.emails.store.register.client');
    }
}
