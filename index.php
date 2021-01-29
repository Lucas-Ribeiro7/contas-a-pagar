    <?php include "cabecalho.php"; ?>
    
    <div class="home">
        <div class="base-corpo">
            <h1>Controle Financeiro</h1>
            <h4>Sofware com o objetivo de lhe ajudar no seu controle financeiro</h4>
            <p>Para cadastrar uma <a href="cadastro.php"><u>nova conta</u></a>, para ver suas contas que já foram <a href="pagas.php"><u>pagas</u></a>, se deseja ver as contas que estão <a href="dados.php"><u>pendentes</u></a>.</p>
            <p></a></p>
            <p>Total de contas cadastradas: 
                <b>
                    <?php  
                        $res = $p->buscarQtd();
                        $qtd = $res["COUNT(id)"];
                        echo $qtd;
                    ?>
                </b>
            </p>
        </div>   
    </div> 
</body>
</html>