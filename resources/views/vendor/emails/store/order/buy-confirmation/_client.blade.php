<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #fecb02;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #fecb02;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center; background: #ffffff;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #ffffff;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #ffffff; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>
<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="{{ $style['email-wrapper'] }}" align="center">
            <table width="100%" cellpadding="0" cellspacing="0">
                @include('vendor.emails.inc.header')

                <!-- Email Body -->
                <tr>
                    <td style="{{ $style['email-body'] }}" width="100%">
                        <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                    <!-- Greeting -->
                                    <h1 style="{{ $style['header-1'] }}">
                                        Olá {{ $data->client->name }},
                                    </h1>

                                    <!-- Intro -->
                                    <span style="{{ $style['paragraph'] }}">
                                        {!! $textEmail !!}
                                    </span>

                                    <span style="{{ $style['paragraph'] }}">
                                        <p><strong>Seguem algumas informações sobre a sua assinatura:</strong></p>
                                        <p>
                                            <strong>Dados de entrega:</strong><br />
                                            {{ $data->clientAddress->address.', '.$data->clientAddress->number.' '.$data->clientAddress->district.' - '.$data->clientAddress->city->name.'/'.$data->clientAddress->state->uf }}<br />
                                            <strong>Dados de pagamento:</strong>
                                                @if($data->type_payment == 'ticket')
                                                    Boleto
                                                @else
                                                    Cartão de Crédito {{ $data->cieloSale->brand->name }} em {{ $data->cieloSale->installments}} parcelas.
                                                @endif
                                            <br />
                                            <strong>Número do Pedido:</strong> {{ $data->id }}<br />
                                            <strong>Data:</strong> {{ mysql_to_data($data->created_at, true, false) }}<br />
                                            <strong>Forma de Pagamento:</strong>
                                            @if($data->type_payment == 'ticket')
                                                Boleto
                                            @else
                                                @if(isset($data->cieloSale->brand->name))
                                                {{ $data->cieloSale->brand->name }}
                                                @endif
                                            @endif<br />
                                            @if($data->type_payment == 'credit_card')
                                                <strong>Número de Parcelas:</strong> {{ $data->cieloSale->installments }}<br />
                                            @endif
                                        </p>
                                    </span>

                                    @if(isset($data->products))
                                    <span style="{{ $style['paragraph'] }}">
                                        <p><strong>Esses foram os produtos que você comprou:</strong></p>
                                    </span>
                                    <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                        @foreach($data->products as $product)
                                            <?php
                                            $cover = asset('uploads/product/product-not-image.png');
                                            if (count($product->product->images) > 0) {
                                                $preCover = $product->product->images->firstWhere('cover', 'y');
                                                $cover = asset('uploads/product/' . $preCover['image']);
                                            }
                                            ?>
                                        <tr>
                                            <td align="center" width="50%">
                                                @if(isset($cover))
                                                <a href="" target="_blank">
                                                    <img width="50%" src="{{ $cover }}" title="{{ $product->product->name }}" alt="{{ $product->product->name }}" />
                                                </a>
                                                @endif
                                            </td>
                                            <td align="left">
                                                <span style="{{ $style['paragraph'] }}">
                                                    <p>
                                                        {{ $product->product->name }}<br />
                                                        Quantidade: {{ $product->quantity }}<br />
                                                        Preço: R$ {{ formata_valor($product->price) }}<br />
                                                        Total: R$ {{ formata_valor($product->price*$product->quantity) }}
                                                        <br /><br />
                                                    </p>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    @endif

                                    <span style="{{ $style['paragraph'] }}">
                                        <p>
                                            Lembre-se:<br /><br />
                                            Para sua segurança, pode ser que a gente faça uma análise de dados cadastrais. Então, é importante que você os mantenha sempre atualizados em nosso site.
                                            Para verificar ou atualizar seus dados, clique aqui.<br /><br />
                                            Ah, se tiver qualquer dúvida, entre em contato com a gente.
                                        </p>
                                    </span>

                                <!-- Action Button -->
                                    @if (isset($actionText))
                                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <?php
                                                    switch ($level) {
                                                        case 'success':
                                                            $actionColor = 'button--green';
                                                            break;
                                                        case 'error':
                                                            $actionColor = 'button--red';
                                                            break;
                                                        default:
                                                            $actionColor = 'button--blue';
                                                    }
                                                    ?>

                                                    <a href="{{ $actionUrl }}"
                                                       style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                                                       class="button"
                                                       target="_blank">
                                                        {{ $actionText }}
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    @endif

                                    <!-- Salutation -->
                                    <p style="{{ $style['paragraph'] }}">
                                        Saudações,<br>{{ config('app.name') }}
                                    </p>

                                    <!-- Sub Copy -->
                                    @if (isset($actionText))
                                        <table style="{{ $style['body_sub'] }}">
                                            <tr>
                                                <td style="{{ $fontFamily }}">
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        Se você tiver problemas ao clicar no botão "{{ $actionText }}", copie e cole o URL abaixo em seu navegador da Web:
                                                    </p>

                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        <a style="{{ $style['anchor'] }}" href="{{ $actionUrl }}" target="_blank">
                                                            {{ $actionUrl }}
                                                        </a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td>
                        <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                    <p style="{{ $style['paragraph-sub'] }}">
                                        &copy; {{ date('Y') }}
                                        <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                        Todos os direitos reservados.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
