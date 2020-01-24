<?php

namespace AgenciaS3\Mail\Store\Order\BuyConfirmation;

use Illuminate\Mail\Mailable;

class BuyConfirmationClientMail extends Mailable
{
    public $order;

    public $form;

    public function __construct(\AgenciaS3\Entities\Order $order,
                                $form)
    {
        $this->order = $order;
        $this->form = $form;
    }

    public function build()
    {
        $subject = "Pedido efetuado com sucesso";

        if (isPost($this->form->subject)) {
            $subject = $this->form->subject . " Pedido #" . $this->order->id;
        }

        if (isPost($this->form->from)) {
            $this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if (isPost($this->form->reply_to)) {
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with(['data' => $this->order, 'textEmail' => $this->form->description])
            ->view('vendor.emails.store.order.buy-confirmation.client');
    }
}
