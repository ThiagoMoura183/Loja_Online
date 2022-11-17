<?php

defined('BASEPATH') or exit('Ação não permitida');


// Enviando informações do sistema para o header e o footer
function info_header_footer() {
    // Precisamos recuperar a instância do CodeIgniter
    $CI = & get_instance();
    // O $CI é como o $THIS usado na controller.
    $sistema = $CI->core_model->getById('sistema',['sistema_id' => 1]);

    return $sistema;
}

// Enviando informações das marcas para navbar
function getMarcas() {
    // Precisamos recuperar a instância do CodeIgniter
    $CI = & get_instance();
    // O $CI é como o $THIS usado na controller.
    $marcas = $CI->loja_model->getMarcas();
    return $marcas;
}
function getCategoriasPaiNavbar() {
    // Precisamos recuperar a instância do CodeIgniter
    $CI = & get_instance();
    // O $CI é como o $THIS usado na controller.
    $categoriasPai = $CI->loja_model->getCategoriasPai();
    return $categoriasPai;
}
function getCategoriasFilhaNavbar($categoria_pai_id = NULL) {
    // Precisamos recuperar a instância do CodeIgniter
    $CI = & get_instance();
    // O $CI é como o $THIS usado na controller.
    $categoriasFilha = $CI->loja_model->getCategoriasFilha($categoria_pai_id);
    return $categoriasFilha;
}

function url_amigavel($string = NULL) {
    $string = remove_acentos($string);
    return url_title($string, '-', TRUE);
}

function remove_acentos($string = NULL) {
    $procurar = array('À', 'Á', 'Ã', 'Â', 'É', 'Ê', 'Í', 'Ó', 'Õ', 'Ô', 'Ú', 'Ü', 'Ç', 'à', 'á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'ü', 'ç');
    $substituir = array('a', 'a', 'a', 'a', 'e', 'r', 'i', 'o', 'o', 'o', 'u', 'u', 'c', 'a', 'a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'c');
    return str_replace($procurar, $substituir, $string);
}

function formata_data_banco_com_hora($string) {

    $dia_sem = date('w', strtotime($string));

    if ($dia_sem == 0) {
        $semana = "Domingo";
    } elseif ($dia_sem == 1) {
        $semana = "Segunda-feira";
    } elseif ($dia_sem == 2) {
        $semana = "Terça-feira";
    } elseif ($dia_sem == 3) {
        $semana = "Quarta-feira";
    } elseif ($dia_sem == 4) {
        $semana = "Quinta-feira";
    } elseif ($dia_sem == 5) {
        $semana = "Sexta-feira";
    } else {
        $semana = "Sábado";
    }

    $dia = date('d', strtotime($string));

    $mes_num = date('m', strtotime($string));

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));

    return $dia . '/' . $mes_num . '/' . $ano . ' ' . $hora;
}

function formata_data_banco_sem_hora($string) {

    $dia_sem = date('w', strtotime($string));

    if ($dia_sem == 0) {
        $semana = "Domingo";
    } elseif ($dia_sem == 1) {
        $semana = "Segunda-feira";
    } elseif ($dia_sem == 2) {
        $semana = "Terça-feira";
    } elseif ($dia_sem == 3) {
        $semana = "Quarta-feira";
    } elseif ($dia_sem == 4) {
        $semana = "Quinta-feira";
    } elseif ($dia_sem == 5) {
        $semana = "Sexta-feira";
    } else {
        $semana = "Sábado";
    }

    $dia = date('d', strtotime($string));

    $mes_num = date('m', strtotime($string));

    $ano = date('Y', strtotime($string));
    $hora = date('H:i', strtotime($string));

    return $dia . '/' . $mes_num . '/' . $ano;
}
