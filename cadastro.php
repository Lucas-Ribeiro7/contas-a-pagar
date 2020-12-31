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
    <div class="cadastro">
        <form action="processa.php" method="POST">
            <p>Código para identificação:<input type="number" name="codigo" required></p>
            <p>Descrição da Conta:<input type="text" name="descricao" required></p>
            <p>Valor: <input type="text" name="valor" size="8px" required></p> 
            <p>Data de Vencimento: <input type="date" name="vencimento" required></p>
            
            <p>Situação</p>
            <input type="radio" name="situacao" value="aberto" required>
            <label for="aberto">Em Aberto</label>
            <input type="radio" name="situacao" value="pago">
            <label for="pago">Pago</label>
            <br>
            <br>
            <input type="submit" value="Salvar">
        </form>
    </div> 
</body>
</html>