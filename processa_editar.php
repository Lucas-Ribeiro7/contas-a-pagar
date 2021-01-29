    <?php include "cabecalho.php"; ?>

    <div class="home">
        <div class="base-corpo">
            <?php
                $codigo = $_POST['codigo'];
                $descricao = $_POST['descricao'];
                $valor = $_POST['valor'];
                $dt_vencimento = $_POST['vencimento'];
                $situacao = $_POST['situacao'];
                if($situacao == "aberto"){
                    $situacao = 1;
                }else if($situacao == "pago"){
                    $situacao = 0;
                }
                $p->editarConta($codigo, $descricao, $valor, $dt_vencimento, $situacao);
            ?>
        </div>
    </div>
    
</body>
</html>