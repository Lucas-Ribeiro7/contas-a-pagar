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
                        case 'valor' :
                            $cliente = $p->pesquisarValor($pesquisa);
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
                        var_dump($cliente["0"]["situacao"]);
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
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>