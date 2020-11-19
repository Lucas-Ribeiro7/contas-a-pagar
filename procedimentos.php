<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Contas a pagar</title>
</head>
    <?php
        require_once 'conexao.php';
        $p = new conexao("contas", "localhost", "root", "");
    ?>
<body>
    <div class="menu">
        <a href="index.php">HOME</a> |
        <a href="dados.php">CONTAS A PAGAR</a> |
        <a href="cadastro.php">CADASTRAMENTO DE CONTAS</a> |
        <a href="pagas.php">CONTAS PAGAS</a> |
        <a href="procedimentos.php">PROCEDIMENTOS</a>
    </div>
    <br>
    <?php 
        $soma_abertos = $p->somaAbertos();
        $soma_pago = $p->somaPago(); 
    ?>
    <p>Soma de todos as contas em Aberto: <strong><?php echo $soma_abertos; ?></strong></p>
    <p>Soma de todos as contas pagas: <strong><?php echo $soma_pago; ?></strong></p>
</body>
</html>