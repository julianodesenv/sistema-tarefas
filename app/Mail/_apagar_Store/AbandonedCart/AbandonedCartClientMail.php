<?php

namespace AgenciaS3\Mail\Store\AbandonedCart;

use Illuminate\Mail\Mailable;

class AbandonedCartClientMail extends Mailable
{
    public $cart;

    public $form;

    public function __construct(\AgenciaS3\Entities\Cart $cart,
                                $form)
    {
        $this->cart = $cart;
        $this->form = $form;
    }

    public function build()
    {
        $subject = "Pedido efetuado com sucesso";

        if (isPost($this->form->subject)) {
            $subject = $this->cart->client->name.', '.$this->form->subject;
        }

        if (isPost($this->form->from)) {
            $this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if (isPost($this->form->reply_to)) {
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with([
                'data' => $this->cart, 'textEmail' => $this->form->description,
                'level' => 'success',
                'actionUrl' => route('cart.index', 'pt'),
                'actionText' => 'FINALIZAR PEDIDO'
            ])
            ->view('vendor.emails.store.abandoned-cart.client');
    }
}
