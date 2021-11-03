<?php include "cabecalho.php" ?>

    <div class="home">
        <br>
        <h1>Contas em Aberto</h1>

        <table>
            <tr>
                <td>
                    <b>CÓDIGO</b>
                </td>
                <td>
                    <b>DESCRIÇÃO</b>
                </td>
                <td>
                    <b>VALOR</b>
                </td>
                <td>
                    <b>DATA DE VENCIMENTO</b>
                </td>
                <td colspan="3">
                    <b>ALTERAR</b>
                </td>
            </tr>
            <div class="deletar-apagar">
                <form action="" method="GET">
                    <input type="submit" value="Apagar todas as contas apagar" name="deletar-apagar">
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
        </table>
    </div>

<?php include "rodape.php" ?>