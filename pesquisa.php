        <?php include "cabecalho.php"; ?>

        <div class="home">
            <div class="base-corpo">
                <?php
                    $escolha = $_POST['escolha'];
                    $pesquisa = $_POST['pesquisa'];
                    
                    switch($escolha){
                        case 'codigo' : 
                            $cliente = $p->pesquisarCodigo($pesquisa);            
                            break;
                        case 'descricao' :
                            $cliente = $p->pesquisarDescricao($pesquisa);
                            break;
                    }
                ?>
                <h2>Sua Pesquisa:</h2>
                <table>
                <tr>
                    <td><b>CODIGO</b></td>
                    <td><b>DESCRIÇÃO</b></td>
                    <td><b>VALOR</b></td>
                    <td><b>DATA DE VENCIMENTO</b></td>
                    <td><b>SITUAÇÃO</b></td>
                </tr>
                    <?php
                    
                    if($cliente == 0){
                        echo "<h2>Não encontramos nenhuma conta</h2>";
                    }else{
                        if($cliente["0"]["situacao"] == 1){
                            $cliente["0"]["situacao"] = "EM ABERTO";
                        }else{
                            $cliente["0"]["situacao"] = "PAGO";
                        }
                    
                        for($i = 0; $i < count($cliente); $i++){
                            echo "<tr>";
                            foreach($cliente[$i] as $key => $value){
                                    echo "<td>$value</td>";
                            }
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>