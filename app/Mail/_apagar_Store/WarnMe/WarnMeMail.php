<?php

namespace AgenciaS3\Mail\Store\WarnMe;

use AgenciaS3\Entities\Client;
use Illuminate\Mail\Mailable;

class WarnMeMail extends Mailable
{
    public $warnMe;

    public $form;

    public function __construct(\AgenciaS3\Entities\WarnMe $warnMe, $form)
    {
        $this->warnMe = $warnMe;
        $this->form = $form;
    }

    public function build()
    {
        $subject =  "Seu produto chegou";

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
            ->with([
                'data' => $this->warnMe,
                'textEmail' => $this->form->description,
                'actionText' => 'CLIQUE E CONFIRA',
                'level' => 'success',
                'actionUrl' => route('product', ['seo_link' => $this->warnMe->product->seo_link])
            ])->view('vendor.emails.store.warn-me.client');
    }

}
