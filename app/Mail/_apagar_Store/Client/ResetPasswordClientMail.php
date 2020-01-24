<?php

namespace AgenciaS3\Mail\Store\Client;

use Illuminate\Mail\Mailable;

class ResetPasswordClientMail extends Mailable
{
    public $client;

    public $form;

    public $password;

    public function __construct(\AgenciaS3\Entities\Client $client,
                                $form,
                                $password)
    {
        $this->client = $client;
        $this->form = $form;
        $this->password = $password;
    }

    public function build()
    {
        $subject = "Recuperação de Senha";

        if (isPost($this->form->subject)) {
            $subject = $this->form->subject;
        }

        if (isPost($this->form->from)) {
            //$this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if (isPost($this->form->reply_to)) {
            $this->replyTo($this->form->reply_to, $subject);
        }

        $text['newPassword'] = $this->password;
        $descriptionMail = $this->form->description;
        if (is_array($text)) {
            foreach ($text as $nomeVar => $valorVar) {
                $descriptionMail = str_replace("$$nomeVar", $valorVar, $descriptionMail);
            }
        }

        return $this->subject($subject)
            ->with([
                'data' => $this->client,
                'textEmail' => $descriptionMail,
                'newPassword' => $this->password
            ])
            ->view('vendor.emails.store.client.reset-password.client');
    }
}
