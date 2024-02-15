<?php
if (!function_exists('debug')) {
    function debug($param)
    {
        echo "<pre>";
        var_dump($param);
        exit;
    }
}

if (!function_exists('brToUsData')) {
    function brToUsDate($brDate)
    {
        // Divide a data em partes (dia, mês, ano) usando a função explode
        $dateParts = explode('/', $brDate);

        // Verifica se foram obtidas três partes (dia, mês, ano)
        if (count($dateParts) === 3) {
            // Reorganiza as partes da data no formato americano (ano-mês-dia)
            $usDate = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

            // Verifica se a data é válida no formato americano
            if (strtotime($usDate) !== false) {
                return $usDate;
            }
        }
        // Se a conversão não for possível, retorna false ou uma mensagem de erro
        return false;
    }
}

if (!function_exists('usToBrDate')) {
    function usToBrDate($usDate)
    {
        $dateParts = explode('-', $usDate);

        if (count($dateParts) === 3) {
            $brDate = $dateParts[2] . '/' . $dateParts[1] . '/' . $dateParts[0];

            if (strtotime($brDate) !== false) {
                return $brDate;
            }
        }

        return false;
    }
}



if (!function_exists('TrocarDeVirgulaPorPonto')) {
    function TrocarDeVirgulaPorPonto($paran)
    {
        $substituirVirgula = str_replace(',', '.', $paran);
        return $substituirVirgula;
    }
}

if (!function_exists('removeSpecialChars')) {
    function removeSpecialChars($inputString)
    {
        $outputString = preg_replace('/[^a-zA-Z0-9\s]/', '', $inputString);

        return $outputString;
    }
}
if (!function_exists('timestamp2br')) {
    function timestamp2br($timestamp)
    {
        if ($timestamp instanceof CodeIgniter\I18n\Time) {
            return $timestamp->format('d/m/Y H:i');
        } else {
            return $timestamp;
        }
    }
}


if (!function_exists('br2bd')) {
    function br2bd($date)
    {
        return implode('/', array_reverse(explode('-', $date)));
    }
}

if (!function_exists('data_valida')) {
    function data_valida(string $data_entrada, string $data_vencimento): bool
    {
        $data_entrada_timestamp = strtotime($data_entrada);
        $data_vencimento_timestamp = strtotime($data_vencimento);

        return $data_entrada_timestamp < $data_vencimento_timestamp;
    }
}
function entrada_Menor($dateExpira)
{
    $dataAtual = date("Y-m-d");
    $time_atual = strtotime($dataAtual);
    $time_expira = strtotime($dateExpira);
    $dif_tempo = $time_expira - $time_atual;
    $dias = (int)floor($dif_tempo / (60 * 60 * 24));

    if ($dias <= 30 && $dias > 0) {
        return "PRODUTO EM ALERTA";
    } elseif ($dias <= 0) {
        return "PRODUTO VENCIDO";
    } else {
        return "PRODUTO OK";
    }
}

if (!function_exists('remove_caracteres_especiais')) {
    function remove_caracteres_especiais($str)
    {
        $str = preg_replace('/[^a-zA-Z\s-]/', '', $str);

        $str = preg_replace('/\s+/', ' ', trim($str));

        $str = str_replace(' ', '-', $str);

        return $str;
    }
}
if (!function_exists('remover-')) {
    function removerHifens($str){
        $str = str_replace('-','',  $str);
        return $str;
    }
}
