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
        <a href="dados.php">TABELAS DE CONTAS</a> |
        <a href="cadastro.php">CADASTRAMENTO DE CONTAS</a>
    </div>
    <br>
    <div class="cadastro">
        <form action="processa.php" method="POST">
            <label>Código para identificação</label>
            <br>
            <input type="number" name="codigo" required>
            <br>
            <label>Descrição da Conta:</label>
            <br>
            <input type="text" name="descricao" required>
            <br>
            <label>Valor: (Obs: Não será aceito ',' mas será aceito '.' para colocar a separação dos centavos)</label>
            <br>
            <input type="text" name="valor" required>
            <br>
            <label>Data de Vencimento</label>
            <br>
            <input type="date" name="vencimento" required>
            <br>
            <br>
            <input type="submit" value="Salvar">
        </form>
    </div> 
</body>
</html>