<?php

namespace AgenciaS3\Mail\Store\Order\BuyConfirmation;

use AgenciaS3\Entities\Order;
use Illuminate\Mail\Mailable;

class BuyConfirmationMail extends Mailable
{
    public $dados;

    public function __construct(Order $dados)
    {
        $this->dados = $dados;
    }

    public function build()
    {
        return $this->subject('Novo pedido realizado pela loja #'.$this->dados->id)
            ->with([
                'data' => $this->dados,
                'level' => 'success',
                'actionUrl' => route('admin.order.show', ['id' => $this->dados->id]),
                'actionText' => 'VISUALIZAR PEDIDO'
            ])
            ->view('vendor.emails.store.order.buy-confirmation.admin');
    }

}
