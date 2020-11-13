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
    <div class="contas">
        <table>
            <tr id="titulo">
                <td>Código</td>
                <td>Descrição</td>
                <td>Valor da Conta</td>
                <td>Data de Vencimento</td>
            </tr>
            <?php
                $dados = $p->buscarDados();
                if(count($dados) > 0){
                    for($i = 0; $i < count($dados); $i++){
                        echo "<tr>";
                        foreach($dados[$i] as $key => $value){
                                echo "<td>$value</td>";
                        }
                        echo "</td>";
                    }
                }else{
                    echo "<h2>Não existe nenhuma conta cadastrada</h2>";
                }
            ?>
        </table>
    </div>
</body>
</html>