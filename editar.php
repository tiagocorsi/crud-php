<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Vaga');

use \App\Entity\Vaga;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obVaga = Vaga::getVaga($_GET['id']);
//echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

if (!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){  
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->atualizar();

    //echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';