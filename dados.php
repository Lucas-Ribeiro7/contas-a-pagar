    <?php include "cabecalho.php"; ?>

    <div class="home">
        <div class="base-corpo">
            <br>
            <h1>Contas em Aberto:</h1>
            <table>

                <tr>
                    <td> <b>CÓDIGO</b> </td>
                    <td> <b>DESCRIÇÃO</b> </td>
                    <td> <b>VALOR</b> </td>
                    <td> <b>DATA DE VENCIMENTO</b> </td>
                    <td colspan="3"> <b>ALTERAR</b> </td>
                </tr>
                <?php
                    $dados = $p->buscarDadosAbertos();
                    if(count($dados) > 0){
                        for($i = 0; $i < count($dados); $i++){
                            echo "<tr>";
                            foreach($dados[$i] as $key => $value){
                                    echo "<td>$value</td>";        
                            }
                            ?>
                            <td> <a href="editar.php?codigo=<?= $dados[$i]["codigo"]; ?>" class="editar"> EDITAR </a> </td>
                            <td> <a href="dados.php?codigo=<?= $dados[$i]["codigo"]; ?>" class="excluir"> EXCLUIR </a> </td>
                            <td> <a href="processa.php?descricao=<?= $dados[$i]["descricao"]; ?>" class="paguei"> PAGUEI </a> </td>
                            <?php
                            echo "</tr>";                
                        }
                    }else{
                        echo "<h2>Não existe nenhuma conta em aberto cadastrado</h2>";
                    }
                    if(isset($_GET["codigo"])){
                        $codigo = $_GET["codigo"];
                        $p->excluirConta($codigo);
                    }      
                                         
                ?>
               
            </table>
                
        </div>
    </div>
</body>
</html>