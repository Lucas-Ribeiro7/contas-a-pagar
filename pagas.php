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