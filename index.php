<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Contas a Pagar</title>
</head>
<body>
    <div class="cadastro">
        <form action="processa.php" method="POST">
            <label>Descrição da Conta:</label>
            <br>
            <input type="text" name="descricao">
            <br>
            <label>Valor:</label>
            <br>
            <input type="number" name="valor">
            <br>
            <label>Data de Vencimento</label>
            <br>
            <input type="date" name="vencimento">
            <br>
            <br>
            <input type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>