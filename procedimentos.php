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
                <h4>Contas em Aberto: <strong><?php echo number_format($soma_abertos, 2, ",", "."); ?> Reais</strong></h4>
            </div>
            <p>-------------------------------------------------------------</p>
            <div class="soma-pagas">
                <h4>Contas Pagas: <strong><?php echo number_format($soma_pago, 2, ",", "."); ?> Reais</strong></h4>
            </div>
            <p>-------------------------------------------------------------</p>
            <div class="soma-total">
                <h4>Todas as Contas: <strong><?php echo number_format($soma_total, 2, ",", "."); ?> Reais</strong></h4>
            </div>
            <p>-------------------------------------------------------------</p>
            <div class="soma-faculdade">
                <p>Soma de todas as contas da Faculdade: <strong><?php echo number_format($soma_faculdade, 2, ",", ".");?> Reais</strong></p>
            </div>
        </div>
    </div>
    
</body>
</html>