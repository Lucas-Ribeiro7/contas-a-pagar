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
        <div>
            <?php 
                $soma_abertos = $p->somaAbertos();
                $soma_pago = $p->somaPago(); 
            ?>
        </div>
        <div>
            <p>Soma de todos as contas em Aberto: <strong><?php echo number_format($soma_abertos, 2, ",", "."); ?> Reais</strong></p>
        </div>
        <div>
            <p>Soma de todos as contas pagas: <strong><?php echo number_format($soma_pago, 2, ",", "."); ?> Reais</strong></p>
        </div>
        <div>
            <form action="" method="GET">
                <p>Excluir a conta com o Código: <input type="number" name="excluir" required>  <input type="submit" value="Excluir"></p>
            </form>
                <?php
                    if(isset($_GET['excluir'])){
                        $codigo = $_GET['excluir'];
                        $p->excluirConta($codigo);
                    }
                ?>
        </div>
        <div>
            <form action="editar.php" method="POST">
                <p>Editar a conta com o Código: <input type="number" name="editar" required> <input type="submit" value="Editar"></p>
            </form>
        </div>
        <div>
            
        </div>
    </div>
    
</body>
</html>