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
    <?php
        $codigo_excluir = $_POST['excluir'];
        $p->excluirConta($codigo_excluir);   
    ?>
    <button>
    <a href="procedimentos.php">Voltar</a>
    </button>
</body>
</html>