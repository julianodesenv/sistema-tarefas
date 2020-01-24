<?php

namespace AgenciaS3\Mail\Store\Order\UpdateStatus;

use Illuminate\Mail\Mailable;

class UpdateStatusClientMail extends Mailable
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
        $subject = "Atualização no status do seu Pedido";

        if (isPost($this->form->subject)) {
            $subject = $this->form->subject . " #" . $this->order->id;
        }

        if (isPost($this->form->from)) {
            $this->from(env('MAIL_FROM_ADDRESS'), isPost($this->form->from) ? $this->form->from : env('MAIL_FROM_NAME'));
        }

        if (isPost($this->form->reply_to)) {
            $this->replyTo($this->form->reply_to, $subject);
        }

        return $this->subject($subject)
            ->with(['data' => $this->order, 'textEmail' => $this->form->description])
            ->view('vendor.emails.store.order.update-status.client');
    }
}
