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
    <?php
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $dt_vencimento = $_POST['vencimento'];
        $p->inserirDados($descricao, $valor, $dt_vencimento);
        if($res = true){
            echo "<h2>Cadastrado com Sucesso!</h2>";
        }
    ?>
</body>
</html>