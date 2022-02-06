<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;

$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

$filtroStatus = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['s','n']) ? $filtroStatus : '';

$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ','%',$busca).'%"' : null,
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];

//echo "<pre>"; print_r($condicoes); echo "</pre>"; exit;

$condicoes = array_filter($condicoes);

$where = implode(' AND ',$condicoes);

//echo $where;
//exit;

$vagas = Vaga::getVagas($where);
//echo "<pre>"; print_r($vaga); echo "</pre>"; exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';