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
        $codigo_enviado = $_POST['editar'];
        $dados = $p->buscarDados($codigo_enviado);
        if(count($dados) == 0){
            echo "<h3>[ERRO] Essa conta não existe!!</h3>";
        }else{
            if(count($dados)>0){
                for($i = 0; $i < count($dados);$i++){
                    foreach($dados[$i] as $key => $value){
                        
                    }
                }
            }
            $codigo = $dados['0']['codigo'];
            $descricao = $dados['0']["descricao"];
            $valor = $dados['0']["valor"];
            $vencimento = $dados['0']["dt_vencimento"];        
            $situacao = $dados['0']['situacao'];
        }
             
    ?>
    <div class="cadastro">
        <form action="processa_editar.php" method="POST">
                <p>Código para identificação:<input type="number" name="codigo" value="<?php echo $codigo ?>" required></p>
                <p>Descrição da Conta:<input type="text" name="descricao" value="<?php echo $descricao ?>" required></p>
                <p>Valor: <strong>(Obs: Se for valores quebrados. Ex: 14.52 - ".")</strong><input type="text" name="valor" value="<?php echo $valor ?>" required></p> 
                <p>Data de Vencimento: <input type="date" name="vencimento" value="<?php echo $vencimento ?>" required></p>
                
                <p>Situação</p>
                <input type="radio" name="situacao" value="aberto" required>
                <label for="aberto">Em Aberto</label>
                <input type="radio" name="situacao" value="pago">
                <label for="pago">Pago</label>
                <br>
                <br>
                <input type="submit" value="Atualizar">
        </form>
    </div>
    
</body>
</html>