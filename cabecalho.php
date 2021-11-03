<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Controle Financeiro</title>
</head>
<body> 
    <?php
        include "config\config.php";
        include "model.php";
        $p = new Model(BANCO, SERVIDOR, USUARIO, SENHA);
    ?>

    <div class="menu">
        <a class="menu-op" href="<?= URL_BASE ?>"> HOME </a>
        <a class="menu-op" href="<?= URL_BASE . 'contas.php' ?>"> CONTAS A PAGAR </a>
        <a class="menu-op" href="<?= URL_BASE . 'cadastro.php' ?>"> CADASTRAR CONTA </a>
        <a class="menu-op" href="<?= URL_BASE . 'pagas.php'; ?>"> CONTAS PAGAS </a> 
        <a class="menu-op" href="<?= URL_BASE . 'estatistica.php'; ?>"> ESTATÍSTICA </a>
    </div>