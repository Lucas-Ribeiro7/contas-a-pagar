<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Contas a Pagar</title>
</head>
    <?php
        require_once 'conexao.php';
        $p = new conexao("contas", "localhost", "root", "");
    ?>
<body>
    <div class="menu">
        <a href="index.php">HOME</a> |
        <a href="dados.php">TABELAS DE CONTAS</a> |
        <a href="cadastro.php">CADASTRAMENTO DE CONTAS</a>
    </div>
    <br>
    <?php
        $codigo = $_POST['codigo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $dt_vencimento = $_POST['vencimento'];
        $p->inserirDados($codigo, $descricao, $valor, $dt_vencimento);
    ?>

</body>
</html>