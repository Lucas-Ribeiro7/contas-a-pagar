    <?php include "cabecalho.php"; ?>
    
    <div class="home">
        <div class="base-corpo">
            <div>
                <?php 
                    $soma_abertos = $p->somaAbertos();
                    $soma_pago = $p->somaPago(); 
                    $soma_total = $p->somaTotal();
                    $soma_faculdade;
                ?>
            </div>
            <div class="soma-abertos">
                <h4>Contas em Aberto: <?php echo number_format($soma_abertos, 2, ",", "."); ?> Reais</h4>
            </div>
            <div class="soma-pagas">
                <h4>Contas Pagas: <?php echo number_format($soma_pago, 2, ",", "."); ?> Reais</h4>
            </div>
            <div class="soma-total">
                <h4>Todas as Contas: <?php echo number_format($soma_total, 2, ",", "."); ?> Reais</h4>
            </div>
            <div class="delete-tudo">
                    <!--<form action="" method="GET">
                        <input type="submit" value="Apagar TODAS as CONTAS!" name="delete-tudo">
                    </form>-->
                    <a href="<?php echo URL_BASE . 'procedimentos.php?delete-tudo'?>" class="deletar-tudo">Deletar TUDO!</a>
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
    
</body>
</html>