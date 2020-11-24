<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Contas a Pagar</title>
</head>
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
            $codigo = $_POST['codigo'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $dt_vencimento = $_POST['vencimento'];
            $situacao = $_POST['situacao'];
            if($situacao == "aberto"){
                $situacao = 1;
            }else if($situacao == "pago"){
                $situacao = 0;
            }
            $p->inserirDados($codigo, $descricao, $valor, $dt_vencimento, $situacao);
        ?>
</body>
</html>