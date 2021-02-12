    <?php include "cabecalho.php"; ?>

    <div class="home">
        <div class="base-corpo">
            <div class="pesquisa">
                <form action="pesquisa.php" method="POST">
                    <input type="radio" name="escolha" value="codigo" required>
                    <label for="codigo">Codigo</label>
                    <input type="radio" name="escolha" value="descricao" required>
                    <label for="descricao">Descrição</label>
                    <input type="text" name="pesquisa" size="25px" required>   
                    <input type="submit" value="Buscar">
                </form>
            </div>
            <br>
            <table>

                <tr>
                    <td> <b>CÓDIGO</b> </td>
                    <td> <b>DESCRIÇÃO</b> </td>
                    <td> <b>VALOR</b> </td>
                    <td> <b>DATA DE VENCIMENTO</b> </td>
                    <td colspan="2"> <b>ALTERAR</b> </td>
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
                            <td> <a href="editar.php?codigo=<?php echo $dados[$i]["codigo"]; ?>">EDITAR</a> </td>
                            <td> <a href="dados.php?codigo=<?php echo $dados[$i]["codigo"]; ?>">EXCLUIR</a> </td>
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