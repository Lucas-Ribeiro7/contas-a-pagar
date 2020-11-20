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
    <form action="excluir.php" method="POST">
        <p>Excluir a conta com o Código: <input type="number" name="excluir"> <input type="submit" value="Excluir"></p>
    </form>
    <form action="atualizar.php" method="POST">
        <p>Editar a conta com o Código: <input type="number" name="editar"> </p>
    </form>
    
</body>
</html>