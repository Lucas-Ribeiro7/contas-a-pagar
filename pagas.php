    <?php include "cabecalho.php"; ?>
    
    <div class="home">
        <div class="base-corpo">
            <table>
                <tr id="titulo">
                    <td> <b>CÓDIGO</b> </td>
                    <td> <b>DESCRIÇÃO</b> </td>
                    <td> <b>VALOR DA CONTA</b> </td>
                    <td> <b>DATA DE VENCIMENTO</b> </td>
                </tr>
                <?php
                    $dados = $p->buscarDadosPagos();
                    if(count($dados) > 0){
                        for($i = 0; $i < count($dados); $i++){
                            echo "<tr>";
                            foreach($dados[$i] as $key => $value){
                                    echo "<td>$value</td>";
                            }
                            echo "</td>";
                        }
                    }else{
                        echo "<h2>Não existe nenhuma conta paga cadastrada</h2>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>