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
    <div class="contas">
        <?php 
            $soma_abertos = $p->somaAbertos();
            $soma_pago = $p->somaPago(); 
        ?>
        <p>Soma de todos as contas em Aberto: <strong><?php echo $soma_abertos; if($soma_abertos == 0){echo "0";} ?> Reais</strong></p>
        <p>Soma de todos as contas pagas: <strong><?php echo $soma_pago; if($soma_pago == 0){echo "0";} ?> Reais</strong></p>
        <form action="excluir.php" method="POST">
            <p>Excluir a conta com o Código: <input type="number" name="excluir"> <input type="submit" value="Excluir"></p>
        </form>
        <form action="editar.php" method="POST">
            <p>Editar a conta com o Código: <input type="number" name="editar"> <input type="submit" value="Editar"></p>
        </form>
    </div>
    
    
</body>
</html>