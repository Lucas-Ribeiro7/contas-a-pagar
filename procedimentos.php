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
            <div>
                <?php 
                    $soma_abertos = $p->somaAbertos();
                    $soma_pago = $p->somaPago(); 
                    $soma_total = $p->somaTotal();
                ?>
            </div>
            <div class="soma-abertos">
                <p>Soma de todos as contas em Aberto: <strong><?php echo number_format($soma_abertos, 2, ",", "."); ?> Reais</strong></p>
            </div>
            <div class="soma-pagas">
                <p>Soma de todos as contas pagas: <strong><?php echo number_format($soma_pago, 2, ",", "."); ?> Reais</strong></p>
            </div>
            <div class="soma-total">
            <p>Soma de todas as contas: <strong><?php echo number_format($soma_total, 2, ",", "."); ?> Reais</strong></p>
            </div>
            <div class="excluir">
                <form action="" method="GET">
                    <p>Excluir a conta com o Código: <input type="number" name="excluir" required>  <input type="submit" value="Excluir"></p>
                </form>
                    <?php
                        if(isset($_GET['excluir'])){
                            $codigo = $_GET['excluir'];
                            $p->excluirConta($codigo);
                        }
                    ?>
            </div>
            <div class="editar">
                <form action="editar.php" method="POST">
                    <p>Editar a conta com o Código: <input type="number" name="editar" required> <input type="submit" value="Editar"></p>
                </form>
            </div>
            <div class="delete">
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
                <br>
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
            </div>
        </div>
    </div>
    
</body>
</html>