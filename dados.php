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
        <a href="dados.php">CONTAS A PAGAR</a> |
        <a href="cadastro.php">CADASTRAMENTO DE CONTAS</a> |
        <a href="pagas.php">CONTAS PAGAS</a> |
        <a href="procedimentos.php">PROCEDIMENTOS</a>
    </div>
    <br>
    <div class="contas">
        <table>
            <tr id="titulo">
                <td> <b>CÓDIGO</b> </td>
                <td> <b>DESCRIÇÃO</b> </td>
                <td> <b>VALOR DA CONTA</b> </td>
                <td> <b>DATA DE VENCIMENTO</b> </td>
            </tr>
            <?php
                $dados = $p->buscarDadosAbertos();
                if(count($dados) > 0){
                    for($i = 0; $i < count($dados); $i++){
                        echo "<tr>";
                        foreach($dados[$i] as $key => $value){
                                echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                }else{
                    echo "<h2>Não existe nenhuma conta em aberto cadastrado</h2>";
                }
            ?>
        </table>
    </div>
</body>
</html>