<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Controle Financeiro</title>
</head> 
<body>
    <?php
        include "config/config.php";
        include "conexao.php";
        $p = new conexao(BANCO, SERVIDOR, USUARIO, SENHA);
    ?>
    <div class="menu">
            <div class="pesquisa">
                <form action="pesquisa.php" method="POST">
                    <select name="escolha">
                        <option value="descricao">Descrição</option>
                        <option value="codigo">Codigo</option>
                    </select>
                    <input type="text" name="pesquisa" size="25px" required>   
                    <input type="submit" value="Buscar">
                </form>
            </div>
            <br>
        <a href="<?php echo URL_BASE; ?>">HOME</a> |
        <a href="<?php echo URL_BASE . 'dados.php'; ?>">CONTAS A PAGAR</a> |
        <a href="<?php echo URL_BASE . 'cadastro.php'; ?>">CADASTRAMENTO DE CONTAS</a> |
        <a href="<?php echo URL_BASE . 'pagas.php'; ?>">CONTAS PAGAS</a> |
        <a href="<?php echo URL_BASE . 'procedimentos.php'; ?>">PROCEDIMENTOS</a>
    </div>
    <br>