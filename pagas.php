    <?php include "cabecalho.php"; ?>

    <div class="home">
        <div class="base-corpo">
            <br>
            <h1>Contas Pagas:</h1>
            <table>

                <tr>
                    <td> <b>CÓDIGO</b> </td>
                    <td> <b>DESCRIÇÃO</b> </td>
                    <td> <b>VALOR</b> </td>
                    <td> <b>DATA DE VENCIMENTO</b> </td>
                    <td colspan="2"> <b>ALTERAR</b> </td>
                </tr>
                <div class="delete-pagas">
                    <form action="" method="GET">
                        <input type="submit" value="Apagar todos das contas PAGAS" name="delete-pagas">   
                    </form>
                    <?php
                        if(isset($_GET['delete-pagas'])){
                            echo "<form action='' method='GET'>";
                            echo "<p>Tem certeza que deseja apagar tudo?</p>";
                            echo "<input type='radio' name='sim-pagas' value= 'sim-pagas'>";
                            echo "<label for='sim-pagas'>Sim, tenho certeza que eu quero apagar TODAS as contas PAGAS!</label><br>";
                            echo "<br><input type='submit' name='resposta' value= 'Responder'>";
                            echo "</form>";  
                        }
                        if(isset($_GET['sim-pagas'])){
                            $p->deletePagas();
                        }
                    ?>
                </div>
                <div class="delete-tudo">
                    <form action="" method="GET">
                        <input type="submit" value="Apagar TODAS as CONTAS!" name="delete-tudo">
                    </form>
                    <?php
                    if(isset($_GET['delete-tudo'])){
                            echo "<form action='' method='GET'>";
                            echo "<p>Tem certeza que deseja apagar tudo?</p>";
                            echo "<input type='radio' name='sim-tudo' value= 'sim-tudo'>";
                            echo "<label for='sim-tudo'>Sim, tenho certeza que eu quero apagar TUDO!</label><br>";
                            echo "<br><input type='submit' name='resposta' value= 'Responder'>";
                            echo "</form>";  
                        }
                        if(isset($_GET['sim-tudo'])){
                            $p->deleteTotal();
                        } 
                    ?>
                </div>
                <br>
                <?php
                    $dados = $p->buscarDadosPagos();
                    if(count($dados) > 0){
                        for($i = 0; $i < count($dados); $i++){
                            echo "<tr>";
                            foreach($dados[$i] as $key => $value){
                                    echo "<td>$value</td>";        
                            }
                            ?>
                            <td> <a href="editar.php?codigo=<?php echo $dados[$i]["codigo"]; ?>" class="editar"> EDITAR </a> </td>
                            <td> <a href="dados.php?codigo=<?php echo $dados[$i]["codigo"]; ?>" class="excluir"> EXCLUIR </a> </td>
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