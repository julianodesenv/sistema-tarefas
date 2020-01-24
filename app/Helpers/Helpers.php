<?php

use Illuminate\Support\Str;

function getPriceProductDB($price, $price_professional)
{
    if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'professional') {
        $price = $price_professional > 0 ? $price_professional : $price;
    }

    return $price;
}

function str_contains($haystack, $needles)
{
    return Str::contains($haystack, $needles);
}

function str_plural($value, $count = null)
{
    return Str::plural($value, $count);
}

function snake_case($value, $delimiter = null)
{
    return Str::snake($value, $delimiter);
}

function str_singular($value)
{
    return Str::singular($value);
}

function getPricePromotionProductDB($price_promotion, $price_professional_promotion)
{
    if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'professional' && isPost($price_professional_promotion) && $price_professional_promotion > 0) {
        $price_promotion = $price_professional_promotion;
    }

    return $price_promotion;
}

function getPricesProduct($name, $price, $price_professional, $price_promotion, $price_professional_promotion)
{
    $prices = '';
    //verificar se é produto profissional
    //dd($name);
    if (isPost($price_professional) && $price_professional > 0) {
        //verifica se esta logado e aprovado
        if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'professional' && Auth::guard('client')->user()->approved == 'y') {
            if (isPost($price_professional_promotion) && $price_professional_promotion > 0) {
                $prices = [
                    'price' => $price_professional,
                    'price_promotion' => $price_professional_promotion,
                    'professional' => false
                ];
            } else {
                $prices = [
                    'price' => $price_professional,
                    'professional' => false
                ];
            }
        } else {
            //verifica valor se não for profissional
            if (isPost($price_promotion) && $price_promotion > 0) {
                $prices = [
                    'price' => $price,
                    'price_promotion' => $price_promotion,
                    'professional' => true
                ];
            } else {
                if (isPost($price) && $price > 0) {
                    $prices = [
                        'price' => $price,
                        'professional' => false
                    ];
                } else {
                    $prices = [
                        'professional' => true
                    ];
                }
            }
        }
    } else {
        //verifica valor se não for profissional
        if (isPost($price_promotion) && $price_promotion > 0) {
            $prices = [
                'price' => $price,
                'price_promotion' => $price_promotion,
                'professional' => false
            ];
        } else {
            $prices = [
                'price' => $price,
                'professional' => false
            ];
        }
    }

    return $prices;
}

function getPriceProduct($price, $price_professional)
{
    if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'professional' && Auth::guard('client')->user()->approved == 'y') {
        $price = $price_professional > 0 ? $price_professional : $price;
    }

    if (isPost($price_professional) && $price_professional > 0 && $price == 0) {
        return __('messages.professional_only');
    }

    return 'R$ ' . formata_valor($price);
}

function getPricePromotionProduct($price_promotion, $price_professional_promotion)
{
    $price_promotion_return = 0;
    if (checkProductProfessional($price_professional_promotion) && checkProfessionalApproved()) {
        $price_promotion_return = $price_professional_promotion;
    } else {
        $price_promotion_return = $price_promotion;
    }

    return $price_promotion_return;
}

function checkBtnBuy($price_professional, $price)
{
    $btn = false;
    if (checkProductProfessional($price_professional) && checkProfessionalApproved()) {
        $btn = true;
    } else {
        if ($price > 0) {
            $btn = true;
        }
    }

    return $btn;

}

function checkProfessionalApproved()
{
    if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'professional' && Auth::guard('client')->user()->approved == 'y') {
        return true;
    }

    return false;
}

function checkProductProfessional($price_professional)
{
    if (isPost($price_professional) && $price_professional > 0) {
        return true;
    }

    return false;
    /*
    $professional = false;
    if (isPost($price_professional)
        && $price_professional > 0 &&
        Auth::guard('client')->check() &&
        Auth::guard('client')->user()->type == 'professional' &&
        Auth::guard('client')->user()->approved == 'y' && $price == 0) {
        $professional = true;
    }

    if ($professional == false && $price > 0 && !isPost($price_professional)){
        $professional = true;
    }

    return $professional;
    */
}

function tipoContaReceber($tipo)
{
    if ($tipo == 'contrato') {
        return 'Contrato';
    } elseif ($tipo == 'taxa') {
        return 'Taxa';
    } elseif ($tipo == 'recesso') {
        return 'Recesso';
    } elseif ($tipo == 'vale_transporte') {
        return 'Auxílio Transporte';
    }
}

function getTypeClient($type)
{
    switch ($type) {
        case 'professional':
            return "Profissional";
            break;
        case 'person':
            return "Consumidor";
            break;
        case 'distributor':
            return "Distribuidor";
            break;
    }
}

function getTypeFreight($code)
{
    switch ($code) {
        case '4510':
            return "PAC";
            break;
        case '04014':
            return "SEDEX";
            break;
        case '4014':
            return "SEDEX";
            break;
        case '40045':
            return "SEDEX A COBRAR";
            break;
        case '40215':
            return "SEDEX 10";
            break;
        case '40290':
            return "SEDEX HOJE";
            break;
        case '04510':
            return "PAC";
            break;
        case '04669':
            return "PAC CONTRATO";
            break;
        case '04162':
            return "SEDEX CONTRATO";
            break;
        case '81019':
            return "eSEDEX";
            break;
    }
}

function porcentagem_nx($parcial, $total)
{
    return ($parcial * 100) / $total;
}

function name_sem_ascentos($str)
{
    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
    $str = preg_replace('/[éèêë]/ui', 'e', $str);
    $str = preg_replace('/[íìîï]/ui', 'i', $str);
    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
    $str = preg_replace('/[úùûü]/ui', 'u', $str);
    $str = preg_replace('/[ç]/ui', 'c', $str);

    return $str;
}

function removeAcentos($suaString)
{

    $string = iconv('ISO-8859-1', 'ASCII//TRANSLIT', $suaString);
    return $string;
}

function tirarAcentos($string)
{
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
}

function formata_valor($valor, $ignorarErro = false)
{
    if ($ignorarErro) {
        if (!is_numeric($valor)) return '';
    }
    $correto = number_format($valor, 2, ',', '.');
    return $correto;
}

function ultimoDiaMes($mes, $ano)
{
    $ultimo_dia = date("t", mktime(0, 0, 0, $mes, '01', $ano));

    return $ultimo_dia;
}

function data_competencia($date)
{
    $date = explode('/', $date);
    return $date[1] . '-' . $date[0];
}

function competencia_data($date)
{
    $date = explode('-', $date);
    return $date[1] . '/' . $date[0];
}

function mysql_to_data($data_mysql, $hora = false, $segundos = true)
{
    if ($hora) {
        if ($segundos) {
            return date("d/m/Y H:i:s", strtotime($data_mysql));
        } else {
            return date("d/m/Y H:i", strtotime($data_mysql));
        }
    } else {
        return date("d/m/Y", strtotime($data_mysql));
    }
}

function isPostData($post)
{
    if (isPost($post) && $post != '0000-00-00' && $post != '0000-00-00 00:00:00') {
        return true;
    }
    return false;
}

function data_to_mysql($data)
{
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6);
    return $ano . "-" . $mes . "-" . $dia;
}

function data_to_mysql_hour($data)
{
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    $hora = substr($data, 11);
    return $ano . "-" . $mes . "-" . $dia . " " . $hora;
}

function isPost($post)
{
    if (isset($post) && !empty($post)) {
        return true;
    }
    return false;
}

function trataCampoValor($valor)
{
    $novoValor = str_replace(".", "", $valor);
    $novoValor = str_replace(",", ".", $novoValor);

    return $novoValor;
}

function trataValueCents($value)
{
    return bcmul($value, 100);
}

function dateExtension($month)
{
    switch ($month) {
        case 1:
            return "JAN";
            break;
        case 2:
            return "FEV";
            break;
        case 3:
            return "MAR";
            break;
        case 4:
            return "ABR";
            break;
        case 5:
            return "MAI";
            break;
        case 6:
            return "JUN";
            break;
        case 7:
            return "JUL";
            break;
        case 8:
            return "AGO";
            break;
        case 9:
            return "SET";
            break;
        case 10:
            return "OUT";
            break;
        case 11:
            return "NOV";
            break;
        case 12:
            return "DEZ";
            break;
    }
}

function ucfirstHelp($string)
{
    return ucfirst(strtolower($string));
}

function socialMediaIcons($services)
{
    $html = '';
    if ($services) {
        $cont = 0;
        foreach ($services as $service) {
            $cont++;
            if ($cont > 1) {
                $html .= ' | ';
            }
            $name = $service->service->name;
            $icon = '';
            switch ($service->service_id) {
                case 1:
                    $icon .= 'fa-facebook';
                    break;
                case 2:
                    $icon .= 'fa-instagram';
                    break;
                case 3:
                    $icon .= 'ml-instagram';
                    break;
                case 4:
                    $icon .= 'fa-linkedin';
                    break;
                case 5:
                    $icon .= 'fa-tags';
                    break;
                case 6:
                    $icon .= 'fa-bullhorn';
                    break;
            }

            $html .= '<i class="icon ' . $icon . '" title="' . $name . '"></i>';
            if ($service->value) {
                $html .= ' R$ ' . formata_valor($service->value);
            }
        }
    }

    echo $html;
}


function socialMedia($services)
{
    $html = '';
    if ($services) {
        $cont = 0;
        foreach ($services as $service) {
            $cont++;
            if ($cont > 1) {
                $html .= ' | ';
            }
            $html .= $service->service->name;
            if ($service->value) {
                $html .= ' R$ ' . formata_valor($service->value);
            }
        }
    }

    return $html;
}
