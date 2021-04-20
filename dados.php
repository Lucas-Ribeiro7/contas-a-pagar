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
                <div class="delete-apagar">
                    <form action="" method="GET">
                        <input type="submit" value="Apagar todos das contas A PAGAR" name="delete-apagar">
                    </form>
                    <?php
                        if(isset($_GET['delete-apagar'])){
                            echo "<form action='' method='GET'>";
                            echo "<p>Tem certeza que deseja apagar tudo?</p>";
                            echo "<input type='radio' name='sim-apagar' value= 'sim-apagar'>";
                            echo "<label for='sim-apagar'>Sim, tenho certeza que eu quero apagar TODAS as contas EM ABERTO!</label><br>";
                            echo "<br><input type='submit' name='resposta' value= 'Responder'>";
                            echo "</form>";  
                        }
                        if(isset($_GET['sim-apagar'])){
                            $p->deleteApagar();
                        }
                    ?>
                </div>
                <br>
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
                            <td> <a href="dados.php?descricao=<?= $dados[$i]["descricao"]; ?>" class="paguei"> PAGUEI </a> </td>
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
                    if(isset($_GET['descricao'])){
                        $descricao = $descricao = $_GET['descricao'];
                        $p->paguei($descricao);
                        header('location: pagas.php');
                    }   
                                         
                ?>
               
            </table>
                
        </div>
    </div>
</body>
</html>